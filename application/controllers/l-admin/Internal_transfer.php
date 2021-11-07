<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Internal_transfer extends Admin_controller
{

    public $mod = 'internal_transfer';
    public $pk;

    public function __construct()
    {
        parent::__construct();

        $this->lang->load('mod/' . $this->mod, $this->_language);
        $this->meta_title(lang_line('mod_title'));
        $this->load->model('mod/internal_transfer_model', 'mod_model');
        $this->load->model('mod/wallet_model');
        $this->load->model('mod/account_trading_model');
        $this->load->model('mod/account_receiver_model');
        $this->load->model('mod/broker_model');
        $this->load->model('mod/member_model');
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
                    $row[] = $val['from_tf'];
                    $row[] = $val['to_tf'];

                    $row[] = 'USD ' . number_format($val['amount'], 2, ',', '.');

                    $row[] = $val['status'];

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
                    $this->vars['res_pages'] = $this->mod_model->get_data($id_page);
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
                    $itflalu = $this->mod_model->get_data($pk);
                    $user = $this->member_model->get_user($itflalu['user_id']);
                    $from_tf = $itflalu['from_tf'];
                    $to_tf = $itflalu['to_tf'];
                    $amount = $itflalu['amount'];
                    //periksa status sebelumnya
                    //jika status sebelumnya adalah PENDING
                    if ($itflalu['status'] == 'Pending') {
                        //jika status yang dipilih admin PENDING
                        if ($status == 'Pending') {
                            $response['success'] = true;
                            $response['alert']['type'] = 'success';
                            $response['alert']['content'] = 'Not making any change';
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
                                if ($from_tf === $to_tf) {
                                    $response['success'] = false;
                                    $response['alert']['type'] = 'error';
                                    $response['alert']['content'] = 'Error From and To is Same';
                                }
                                else {
                                    if ($from_tf === 'Wallet' || $from_tf === 'Wallet MC') {
                                        //periksa to
                                        $account = $this->account_trading_model->get_account($to_tf);

                                        if ($account !== null) {
                                            //menambahkan jumlah amount
                                            $jml_intrnaltf = $itflalu['amount'];
                                            $jml_acc = $account['amount'];
                                            $jml_acc_now = $jml_acc + $jml_intrnaltf;

                                            //update jumlah amount account
                                            $data_Account = array(
                                                'amount' => $jml_acc_now,
                                            );
                                            $this->account_trading_model->update($account['id'], $data_Account);

                                            //input  history ammout account 
                                            $data_acc_history = array(
                                                'account_trading_id' => $account['id'],
                                                'amount_before' => $jml_acc,
                                                'amount' => $jml_intrnaltf,
                                                'amount_after' => $jml_acc_now,
                                                'keterangan' => 'Internal Transfer Approved',
                                                'internal_transfer_id' => $pk
                                            );
                                            $this->db->insert('t_account_trading_amount_history', $data_acc_history);

                                            $response['success'] = true;
                                            $response['alert']['type'] = 'success';
                                            $response['alert']['content'] = lang_line('form_message_update_success');
                                        }
                                        else {
                                            $cekusername = $this->db->get_where('t_user', array('username' => $to_tf))->row_array();

                                            if ($cekusername !== null) {
                                                //mendapatkan data wallet tujuan
                                                $wallet_tujuan = $this->wallet_model->get_wallet_user($cekusername['id']);

                                                //menambahkan jumlah wallet user tujuan
                                                $jml_intrnaltf = $itflalu['amount'];
                                                $jml_wallet_tujuan = $wallet_tujuan['amount'];
                                                $jml_wallet_tujuan_now = $jml_wallet_tujuan + $jml_intrnaltf;

                                                //update wallet user tujuan
                                                $data_wallet_tujuan = array(
                                                    'amount' => $jml_wallet_tujuan_now
                                                );
                                                $this->wallet_model->update($wallet_tujuan['id'], $data_wallet_tujuan);

                                                //history wallet user tujuan
                                                $data_wallet_tujuan_history = array(
                                                    'wallet_id' => $wallet_tujuan['id'],
                                                    'amount_before' => $jml_wallet_tujuan,
                                                    'amount' => $jml_intrnaltf,
                                                    'amount_after' => $jml_wallet_tujuan_now,
                                                    'source' => 'Internal Transfer',
                                                    'internal_transfer_id' => $pk
                                                );

                                                $this->wallet_model->insert_history($data_wallet_tujuan_history);

                                                $response['success'] = true;
                                                $response['alert']['type'] = 'success';
                                                $response['alert']['content'] = lang_line('form_message_update_success');
                                            }
                                            else {
                                                $response['success'] = false;
                                                $response['alert']['type'] = 'error';
                                                $response['alert']['content'] = 'Error';
                                            }
                                        }
                                    }
                                    else {
                                        //periksa from
                                        $account = $this->account_trading_model->get_account($from_tf);

                                        if (!empty($account)) {
                                            //mengecek tujuan
                                            //jika tujuan transfer bukan wallet
                                            if ($to_tf !== 'Wallet') {
                                                $response['success'] = false;
                                                $response['alert']['type'] = 'error';
                                                $response['alert']['content'] = 'Tidak bisa memproses, Tujuan Harus Wallet';
                                            }
                                            else {
                                                $wallet = $this->wallet_model->get_wallet_user($itflalu['user_id']);

                                                //menambahkan wallet
                                                $jml_wallet = $wallet['amount'];
                                                $jml_intrnal = $itflalu['amount'];
                                                $jml_wallet_now = $jml_wallet + $jml_intrnal;

                                                //update jumlah wallet
                                                $data_wallet = array(
                                                    'amount' => $jml_wallet_now
                                                );
                                                $this->wallet_model->update($wallet['id'], $data_wallet);

                                                //insert ke history wallet
                                                $data_wallet_history = array(
                                                    'wallet_id' => $wallet['id'],
                                                    'amount_before' => $jml_wallet,
                                                    'amount' => $jml_intrnal,
                                                    'amount_after' => $jml_wallet_now,
                                                    'source' => 'Internal Transfer',
                                                    'internal_transfer_id' => $pk
                                                );


                                                $this->wallet_model->insert_history($data_wallet_history);

                                                $response['success'] = true;
                                                $response['alert']['type'] = 'success';
                                                $response['alert']['content'] = lang_line('form_message_update_success');
                                            }
                                        }
                                        else {
                                            $response['success'] = false;
                                            $response['alert']['type'] = 'error';
                                            $response['alert']['content'] = 'Error';
                                        }
                                    }
                                    $message = '<html><body>
									Dear <b> ' . $user["user_name"] . ' </b>,<p /><p />
                                    Selamat, pengajuan internal transfer anda telah kami <strong>terima</strong><br><p><p>
									Best regards, <p><p><p><br>

									' . $this->settings->website('web_name') . ' Team
									</html></body>';
                                    $this->sendEmail($user, $message);
                                }
                            }
                            elseif ($status == 'Rejected') {
                                if ($from_tf === 'Wallet' || $from_tf === 'Wallet MC') {
                                    //mnegembalikan jumlah wallet
                                    //get wallet 
                                    $wallet = $this->wallet_model->get_wallet_user($itflalu['user_id']);

                                    //hitung
                                    $jml_wallet = $wallet['amount'];
                                    $jml_intrnal = $itflalu['amount'];
                                    $jml_wallet_now = $jml_wallet + $jml_intrnal;

                                    //update wallet
                                    $data_wallet = array(
                                        'amount' => $jml_wallet_now
                                    );
                                    $this->wallet_model->update($wallet['id'], $data_wallet);

                                    //insert ke history wallet
                                    $data_wallet_history = array(
                                        'wallet_id' => $wallet['id'],
                                        'amount_before' => $jml_wallet,
                                        'amount' => $jml_intrnal,
                                        'amount_after' => $jml_wallet_now,
                                        'source' => 'Internal Transfer Rejected',
                                        'internal_transfer_id' => $pk
                                    );

                                    $this->wallet_model->insert_history($data_wallet_history);

                                    $response['success'] = true;
                                    $response['alert']['type'] = 'success';
                                    $response['alert']['content'] = lang_line('form_message_update_success');
                                }
                                else {
                                    $account = $this->db->get_where('t_account_trading', array('account' => $from_tf))->row_array();

                                    if (!empty($account)) {
                                        //mnegembalikan jumlah ammount accout trading
                                        $jml_intrnaltf = $itflalu['amount'];
                                        $jml_acc = $account['amount'];
                                        $jml_acc_now = $jml_acc + $jml_intrnaltf;

                                        //update jumlah amount account
                                        $data_Account = array(
                                            'amount' => $jml_acc_now,
                                        );
                                        $this->db->where('id', $account['id']);
                                        $this->db->update('t_account_trading', $data_Account);

                                        //input  history ammout account 
                                        $data_acc_history = array(
                                            'account_trading_id' => $account['id'],
                                            'amount_before' => $jml_acc,
                                            'amount' => $jml_intrnaltf,
                                            'amount_after' => $jml_acc_now,
                                            'keterangan' => 'Internal Transfer Rejected',
                                            'internal_transfer_id' => $pk
                                        );
                                        $this->db->insert('t_account_trading_amount_history', $data_acc_history);

                                        $response['success'] = true;
                                        $response['alert']['type'] = 'success';
                                        $response['alert']['content'] = lang_line('form_message_update_success');
                                    }
                                    else {
                                        $response['success'] = false;
                                        $response['alert']['type'] = 'error';
                                        $response['alert']['content'] = 'Error';
                                    }
                                }
                                $message = '<html><body>
								Dear <b> ' . $user["user_name"] . ' </b>,<p /><p />
                                Mohon maaf, permintaan internal transfer anda kami <strong>tolak</strong>. Silakan ajukan internal transfer kembali.<br><p><p>
								Best regards, <p><p><p><br>

								' . $this->settings->website('web_name') . ' Team
								</html></body>';

                                $this->sendEmail($user, $message);
                            }
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

    public function sendEmail($user, $msg)
    {
        $website_name = $this->settings->website('web_name');
        $website_email = $this->settings->website('username');
        $mailpas = decrypt($this->settings->website('password'));
        $mailhost = $this->settings->website('hostname');
        $mailproto = $this->settings->website('protocol');
        $mailport = $this->settings->website('port');

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
        $this->email->to($user['user_email']); // Ganti dengan email tujuan kamu
        // Lampiran email, isi dengan url/path file
        // $this->email->attach('https://masrud.com/content/images/20181215150137-codeigniter-smtp-gmail.png');

        // Subject email
        $this->email->subject('Your Internal Transfer Status ');

        // Isi email
        // $this->email->message('Klik unttuk verifikasi email anda : <a href="' . base_url() . 'login/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Activate</a>');
        // $this->email->message('test');
        // $this->email->message('test');
        $this->email->message($msg);
        $this->email->send();
    }
} // End Class.