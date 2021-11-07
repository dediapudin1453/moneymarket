<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Deposit extends Admin_controller
{

    public $mod = 'deposit';
    public $pk;

    public function __construct()
    {
        parent::__construct();

        $this->lang->load('mod/' . $this->mod, $this->_language);
        $this->meta_title(lang_line('mod_title'));
        $this->load->model('mod/deposit_model', 'mod_model');
        $this->load->model('mod/wallet_model');
        $this->load->model('mod/bank_model');
        $this->load->library('email');
    }


    public function index()
    {
        if ($this->read_access) {
            if ($this->input->is_ajax_request()) {

                $data_list = $this->mod_model->get_datatables();
                $data_output = array();
                $no = 1;
                foreach ($data_list as $val) {
                    $row = [];
                    $row[] = '<div class="text-center">' . $no++;
                    '</div>';

                    // $row[] = '<div class="text-center"><input type="checkbox" class="row_data" value="'. encrypt($val['id']) .'"></div>';

                    $row[] = $val['username'];

                    $row[] = 'IDR ' . number_format($val['amount'], 0, ',', '.') . ' | ' . 'USD ' . number_format($val['amount_usd'], 2, '.', ',');

                    //$row[] = $val['status'];

                    if ($val['status'] == 'Approved') {
                        $status = '<span class="badge badge-pill badge-success">Approved</span>';
                    }
                    else if ($val['status'] == 'Pending') {
                        $status = '<span class="badge badge-pill badge-warning">Pending</span>';
                    }
                    else {
                        $status = '<span class="badge badge-pill badge-danger">Rejected</span>';
                    }

                    $row[] = $status;

                    $row[] = date('d-m-Y', strtotime($val['date']));

                    $row[] = '<div class="text-center"><div class="btn-group">
							<a href="' . admin_url($this->mod . '/edit/' . $val['id']) . '" class="button btn-xs btn-default" data-toggle="tooltip" data-placement="top" data-title="' . lang_line('button_edit') . '"><i class="icon-pencil3"></i> Verification</a>
							</div></div>';

                    $data_output[] = $row;
                }

                $output = array(
                    "draw" => $this->input->post('draw'),
                    "recordsTotal" => $this->mod_model->count_all(),
                    "recordsFiltered" => $this->mod_model->count_filtered(),
                    "data" => $data_output,
                );

                $this->json_output($output);
            }
            else {
                $this->render_view('view_index', $this->vars);
            }
        }
        else {
            $this->render_403();
        }
    }

    public function edit($id_page = '')
    {
        $id_page = xss_filter($id_page, 'sql');

        if ($this->modify_access) {
            if (!empty($id_page) && $this->mod_model->cek_id($id_page) == 1) {
                if ($this->input->is_ajax_request()) {
                    $pk = encrypt($id_page);
                    $this->_submit_upate($pk);
                }
                else {
                    $this->vars['res_pages'] = $this->mod_model->get_deposit($id_page);
                    $this->vars['bank'] = $this->bank_model->get_bank_user($this->vars['res_pages']['bank_id']);
                    $this->render_view('view_edit', $this->vars);
                }
            }
            else {
                $this->render_404();
            }
        }
        else {
            $this->render_403();
        }
    }


    private function _submit_upate($param = NULL)
    {
        if ($this->input->is_ajax_request() && !empty($param)) {
            $pk = xss_filter(decrypt($param), 'sql');

            if ($this->modify_access && $this->mod_model->cek_id($pk) == 1) {
                $rules = array(
                        array(
                        'field' => 'status',
                        'label' => lang_line('form_label_title'),
                        'rules' => 'required|trim'
                    )
                );

                $this->form_validation->set_rules($rules);

                if ($this->form_validation->run()) {
                    $status = xss_filter($this->input->post('status', true), 'xss');
                    $depositlalu = $this->mod_model->get_deposit($pk);
                    //periksa status sebelumnya
                    //jika status sebelumnya adalah PENDING
                    if ($depositlalu['status'] == 'Pending') {
                        //jika status yang dipilih admin PENDING
                        if ($status == 'Pending') {
                            $response['success'] = true;
                            $response['alert']['type'] = 'success';
                            $response['alert']['content'] = 'Not making change';
                        }
                        //jika status yang dipilih admin bukan PENDING
                        else {
                            //mengupdate status deposit
                            $data = array(
                                'status' => $status
                            );
                            $this->mod_model->update($pk, $data);

                            //jika status yang dipilih admin adalah APPROVED
                            if ($status == 'Approved') {
                                //mendapatkan data wallet user
                                $wallet = $this->wallet_model->get_wallet_user($depositlalu['user_id']);

                                $wallet_sebelumnya = $wallet['amount'];
                                $jml_deposit = $depositlalu['amount_usd'];

                                //menjumlahkan wallet dengan jumlah deposit
                                $jumlah_wallet = $wallet_sebelumnya + $jml_deposit;

                                //update jumlah wallet
                                $data_wallet = array(
                                    'amount' => $jumlah_wallet
                                );
                                $this->wallet_model->update($wallet['id'], $data_wallet);

                                //insert ke history wallet
                                $data_wallet_history = array(
                                    'wallet_id' => $wallet['id'],
                                    'amount_before' => $wallet_sebelumnya,
                                    'amount' => $jml_deposit,
                                    'amount_after' => $jumlah_wallet,
                                    'source' => 'Deposit',
                                    'deposit_id' => $pk
                                );
                                $this->wallet_model->insert_history($data_wallet_history);
                            }

                            $activity = array('user_id' => $depositlalu['user_id'],
                                'type' => 'Deposit',
                                'activity' => 'Request Deposit ' . $status);
                            $this->db->insert('t_activity', $activity);

                            $this->sendemailMember($depositlalu['user_id'], $status);

                            $response['success'] = true;
                            $response['alert']['type'] = 'success';
                            $response['alert']['content'] = lang_line('form_message_update_success');
                        }
                    }
                    //jika status sebelumnya adalah Rejected/Approved
                    else {
                        $response['success'] = false;
                        $response['alert']['type'] = 'error';
                        $response['alert']['content'] = 'cant make changes anymore';
                    }
                }
                else {
                    $response['success'] = false;
                    $response['alert']['type'] = 'error';
                    $response['alert']['content'] = validation_errors();
                }

                $this->json_output($response);
            }
            else {
                $this->render_403();
            }
        }
        else {
            show_404();
        }
    }


    public function _cek_add_seotitle($seotitle = '')
    {
        $seotitle = seotitle($seotitle);
        $cek = $this->mod_model->cek_seotitle($seotitle);

        if ($cek >= 1) {
            $this->form_validation->set_message('_cek_add_seotitle', lang_line('form_message_already_exists'));
            return FALSE;
        }
        else
            return TRUE;
    }



    public function _cek_edit_seotitle($seotitle = '')
    {
        $seotitle = seotitle($seotitle);
        $idEdit = $this->uri->segment(4);
        $cek = $this->mod_model->cek_seotitle2($idEdit, $seotitle);

        if ($cek == FALSE) {
            $this->form_validation->set_message('_cek_edit_seotitle', lang_line('form_message_already_exists'));
            return FALSE;
        }
        else
            return TRUE;
    }

    public function sendemailMember($id, $status)
    {
        $member = $this->db->get_where('t_user', array('id' => $id))->row_array();

        $member_nama = $member['name'];
        $member_email = $member['email'];
        $member_phone = $member['tlpn'];
        $member_username = $member['username'];

        $website_name = $this->settings->website('web_name');
        $website_email = $this->settings->website('username');
        $mailpas = decrypt($this->settings->website('password'));
        $mailhost = $this->settings->website('hostname');
        $mailproto = $this->settings->website('protocol');
        $mailport = $this->settings->website('port');
        $alert_address = $this->settings->website('email_alert');
        // Konfigurasi email
        $config = [
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'protocol' => $mailproto,
            'smtp_host' => $mailhost,
            'smtp_user' => $website_email,
            'smtp_pass' => $mailpas,
            'smtp_port' => $mailport,
            'crlf' => "\r\n",
            'newline' => "\r\n"
        ];

        // Load library email dan konfigurasinya
        $this->email->initialize($config);
        $this->load->library('email', $config);

        // Email dan nama pengirim
        $this->email->from($website_email, $website_name);

        // Email penerima
        $this->email->to($member_email); // Ganti dengan email tujuan kamu

        if ($status === 'Approved') {
            $subject = 'Deposit Approved';
            $msg = '<!DOCTYPE html>
        	<html>
        	<head>
        		<meta charset="utf-8">
        		<title>Deposit Approved</title>
        	</head>
        	<body>
        		Dear <b> ' . $member_nama . ' </b>,<br /><br />
				Selamat pengajuan deposit anda telah kami <b>approve</b>, wallet anda kini telah bertambah. Terimakasih telah telah bertransaksi di ' . $website_name . '.
				<p><p><p>
				Salam,
				<br>
				' . $website_name . ' Team
        	</body>
        	</html>';
        }
        else {
            $subject = 'Deposit Rejected';
            $msg = '<!DOCTYPE html>
        	<html>
        	<head>
        		<meta charset="utf-8">
        		<title>Deposit Approved</title>
        	</head>
        	<body>
        		Dear <b> ' . $member_nama . ' </b>,<br /><br />
        		Mohon maaf, pengajuan deposit anda telah kami <b>tolak</b>. Silakan mengajukan deposit kembali, kami akan melakukan proses approval dalam waktu 1x24 jam.
				<p><p><p>
				Salam,
				<br>
				' . $website_name . ' Team
        	</body>
        	</html>';
        }

        // Subject email
        $this->email->subject($subject);

        // Isi email
        $this->email->message($msg);
        $this->email->send();
    }
} // End Class.