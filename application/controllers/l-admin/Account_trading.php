<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Account_trading extends Admin_controller
{

    public $mod = 'account_trading';
    public $pk;

    public function __construct()
    {
        parent::__construct();

        $this->lang->load('mod/' . $this->mod, $this->_language);
        $this->meta_title(lang_line('mod_title'));
        $this->load->model('mod/account_trading_model', 'mod_model');
        $this->load->model('mod/wallet_model');
        $this->load->model('mod/member_model');
        $this->load->library('email');
    }


    public function index()
    {
        if ($this->read_access) {
            if ($this->input->is_ajax_request()) {

                $data_list = $this->mod_model->get_datatables();
                $data_output = array();
                foreach ($data_list as $val) {
                    $row = [];
                    $row[] = '<div class="text-center"><input type="checkbox" class="row_data" value="' . encrypt($val['id']) . '"></div>';

                    $row[] = $val['username'];

                    $row[] = $val['account'];

                    $row[] = $val['type_account'];

                    $row[] = $val['leverage'];

                    $row[] = $val['status_request'];

                    $row[] = date('d-m-Y', strtotime($val['date']));

                    $row[] = '<div class="text-center"><div class="btn-group">
							<a href="' . admin_url($this->mod . '/edit/' . $val['id']) . '" class="button btn-xs btn-default" data-toggle="tooltip" data-placement="top" data-title="' . lang_line('button_edit') . '"><i class="icon-pencil3"></i></a>
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
                    $this->vars['res_pages'] = $this->mod_model->get_acc($id_page);
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
                $accreq = $this->mod_model->get_acc($pk);

                if ($accreq['status_request'] == 'Pending') {
                    $rules = array(
                            array(
                            'field' => 'status',
                            'label' => lang_line('form_label_title'),
                            'rules' => 'required|trim'
                        )
                    );
                }
                elseif ($accreq['status_request'] == 'Approved') {
                    $rules = array(
                            array(
                            'field' => 'account',
                            'label' => lang_line('form_label_acc'),
                            'rules' => 'required|trim'
                        ),
                            array(
                            'field' => 'password',
                            'label' => 'Password',
                            'rules' => 'required|trim'
                        ),
                            array(
                            'field' => 'password_investor',
                            'label' => 'Password Investor',
                            'rules' => 'required|trim'
                        ),
                            array(
                            'field' => 'amount',
                            'label' => lang_line('form_label_amount'),
                            'rules' => 'required|trim'
                        )
                    );
                }


                $this->form_validation->set_rules($rules);

                if ($this->form_validation->run()) {
                    $status = xss_filter($this->input->post('status', true), 'xss');
                    $accreq = $this->mod_model->get_acc($pk);
                    $user = $this->member_model->get_user($accreq['user_id']);

                    //periksa status sebelumnya
                    //jika status sebelumnya adalah PENDING
                    if ($accreq['status_request'] == 'Pending') {
                        //jika status yang dipilih admin PENDING
                        if ($status == 'Pending') {
                            $response['success'] = true;
                            $response['alert']['type'] = 'success';
                            $response['alert']['content'] = 'Not making change';
                        }
                        //jika status yang dipilih admin bukan PENDING
                        else {
                            //mengupdate status req
                            $data = array(
                                'status_request' => $status
                            );

                            if ($status == 'Rejected') {
                                $sbjc = "Trading akun anda telah ditolak";
                                $message = '<html><body>
								Dear <b> ' . $user["user_name"] . ' </b>,<p /><p />
                                Mohon maaf, permintaan pembuatan akun trading anda telah kami <strong>tolak</strong>. Mohon untuk mengajukan pembuatan akun trading kembali.<br><p><p>
								Best regards, <p><p><p>

								' . $this->settings->website('web_name') . ' Team
								</body></html>';
                                $this->sendEmail($user["user_email"], $message, $sbjc);
                            }
                            $this->mod_model->update($pk, $data);

                            $response['success'] = true;
                            $response['alert']['type'] = 'success';
                            $response['alert']['content'] = lang_line('form_message_update_success');
                        }
                    }
                    //jika status sebelumnya adalah Approved
                    elseif ($accreq['status_request'] == 'Approved') {
                        //mengupdate status req
                        $data = array(
                            'account' => xss_filter($this->input->post('account', true), 'xss'),
                            'password' => xss_filter($this->input->post('password', true), 'xss'),
                            'password_investor' => xss_filter($this->input->post('password_investor', true), 'xss'),
                            'server' => xss_filter($this->input->post('server', true), 'xss'),
                            'amount' => xss_filter($this->input->post('amount', true), 'xss')
                        );
                        $this->mod_model->update($pk, $data);

                        if (empty($accreq['account'])) {
                            $sbjc = "Akun trading anda telah dibuka";
                            $message = '<html><body>
							Dear <b> ' . $user["user_name"] . ' </b>,<p /><p />
                            Selamat, MT4 Live account anda kini telah dibuka.<br>
                            Dengan detail akun sebagai berikut :<br>
							MT4 Login : ' . $data['account'] . '<br>
							MT4 Password : ' . $data['password'] . '<br>
							MT4 Investor Password : ' . $data['password_investor'] . '<br>
							(used to get view-only access to your account in MT4)<br>
							MT4 Server: ' . $data['server'] . '<br>
                            Silakan unduh dan pasang aplikasi MT4, lalu gunakan detail diatas untuk login.<p><p>
							Best regards, <p><p><p><br><br>

							' . $this->settings->website('web_name') . ' Team
							</body></html>';
                            $this->sendEmail($user["user_email"], $message, $sbjc);
                        }

                        $response['success'] = true;
                        $response['alert']['type'] = 'success';
                        $response['alert']['content'] = lang_line('form_message_update_success');
                    }
                    //jika status sebelumnya adalah Rejected
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

    public function sendEmail($email, $msg, $sbjc)
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
        $this->email->to($email); // Ganti dengan email tujuan kamu
        // Lampiran email, isi dengan url/path file
        // $this->email->attach('https://masrud.com/content/images/20181215150137-codeigniter-smtp-gmail.png');

        // Subject email
        $this->email->subject($sbjc);

        // Isi email
        // $this->email->message('Klik unttuk verifikasi email anda : <a href="' . base_url() . 'login/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Activate</a>');
        // $this->email->message('test');
        // $this->email->message('test');
        $this->email->message($msg);
        $this->email->send();
    }
} // End Class.