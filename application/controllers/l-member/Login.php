<?php defined('BASEPATH') or exit('No direct script access allowed');

class Login extends MY_Controller
{

    public $vars;
    public $mod = 'login';

    public function __construct()
    {
        parent::__construct();
        $this->CI = &get_instance();

        if ($this->settings->website('member_registration') == 'Y') {
            $this->_key = login_key('member');
            $this->_language = strtolower($this->set_language());
            $this->lang->load('main', $this->_language);
            $this->lang->load('member', $this->_language);
            $this->load->model('member_login_model', 'login_model');
            $this->load->model('member/account_model', 'account_model');
            $this->form_validation->set_error_delimiters('<div>*) ', '.</div>');
            $this->vars['input_email'] = encrypt('email');
            $this->vars['input_pwd'] = encrypt('password');
            $this->load->library('email');
        } else {
            return show_404();
        }
    }


    public function meta_title($param = '')
    {
        $title = !empty($param) ? lang_line('ci_member') . ' - ' . $param : lang_line('ci_member');
        $this->meta_title = $title;
        return $this;
    }


    public function index()
    {
        $this->meta_title(lang_line('login1'));

        if (login_status('member') == TRUE) {
            redirect(member_url('home'), 'refresh');
        } else {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                return $this->cek_login();
            } else {
                $cookie = $this->input->cookie('remember_me', true);

                if (!empty($cookie)) {
                    $cek = $this->login_model->get_by_cookie($cookie);

                    if (!empty($cek)) {
                        $this->vars['email'] = $cek['email'];
                        $this->vars['password'] = decrypt($cek['password']);
                    } else {
                        $this->vars['email'] = set_value('email');
                        $this->vars['password'] = set_value('password');
                    }
                } else {
                    $this->vars['email'] = set_value('email');
                    $this->vars['password'] = set_value('password');
                }

                $this->load->view('member/log_header', $this->vars);
                $this->load->view('member/log_signin', $this->vars);
                $this->load->view('member/log_footer', $this->vars);
            }
        }
    }

    private function cek_login()
    {
        // die('s');
        $this->form_validation->set_rules(array(
            array(
                'field' => 'useremail',
                'label' => 'Email',
                'rules' => 'required|trim|min_length[4]|max_length[50]',
            ),
            array(
                'field' => 'userpass',
                'label' => 'Password',
                'rules' => 'required|min_length[4]|max_length[18]',
            )
        ));

        if ($this->form_validation->run()) {
            $data_input = array(
                'email' => $this->input->post('useremail'),
                'password' => encrypt($this->input->post('userpass'))
            );

            $rememberme = $this->input->post('remember');
            if ($this->login_model->cek_login($data_input) == TRUE) {
                $get_user_byemail = $this->login_model->get_user_email($data_input);
                $get_user_byusername = $this->login_model->get_user_username($data_input);
                if (empty($get_user_byemail) && empty($get_user_byusername)) {
                    $this->alert->set('login', 'danger', 'Log In error.');
                    $this->session->set_flashdata(
                        'login',
                        '<div class="alert alert-warning" role="alert">
                            <i class="dripicons-warning me-2"></i> Your <strong>email</strong> not yet verification - check your email to verification!
                        </div>'
                    );
                    redirect(uri_string());
                } else {
                    $get_user = $this->login_model->get_user($data_input);
                    $this->session->set_userdata('log_member', array(
                        'key' => $get_user['id'],
                        'access' => encrypt(random_string(16)),
                        'level' => $get_user['level'],
                        'status_data' => $get_user['status_data']
                    ));

                    if ($rememberme) {
                        $key = random_string('alnum', 64);
                        $this->input->set_cookie('remember_me', $key, 3600 * 24 * 30); // set expired 30 hari kedepan
                        // simpan key di database
                        $update_key = array(
                            'remember_key' => $key
                        );
                        $this->login_model->update_cookie($update_key, $get_user['id']);
                    }

                    $activity = array(
                        'user_id' => $get_user['id'],
                        'type' => 'Login',
                        'activity' => 'Login, Welcome ' . $get_user['username']
                    );
                    $this->account_model->insert_activity($activity);

                    redirect(member_url('home'), 'refresh');
                }
                if (!empty($get_user)) {
                    $this->session->set_userdata('log_member', array(
                        'key' => $get_user['id'],
                        'access' => encrypt(random_string(16)),
                        'level' => $get_user['level'],
                        'status_data' => $get_user['status_data']
                    ));

                    if ($rememberme) {
                        $key = random_string('alnum', 64);
                        $this->input->set_cookie('remember_me', $key, 3600 * 24 * 30); // set expired 30 hari kedepan
                        // simpan key di database
                        $update_key = array(
                            'remember_key' => $key
                        );
                        $this->login_model->update_cookie($update_key, $get_user['id']);
                    }

                    $activity = array(
                        'user_id' => $get_user['id'],
                        'type' => 'Login',
                        'activity' => 'Login, Welcome ' . $get_user['username']
                    );
                    $this->account_model->insert_activity($activity);

                    redirect(member_url('home'), 'refresh');
                } else {
                    $this->alert->set('login', 'danger', 'Log In error.');
                    $this->session->set_flashdata('login', '<div uk-alert="" class="uk-alert-danger">
                        <a class="uk-alert-close" uk-close></a>
                        Akun anda belum terverifikasi, silakan cek email anda untuk verifikasi!
                    </div>
                    ');


                    redirect(uri_string());
                }
            } else {
                $this->alert->set('login', 'danger', 'Log In error.');
                $this->session->set_flashdata('login', '<div uk-alert="" class="uk-alert-danger">
				    <a class="uk-alert-close" uk-close></a>
				    Wrong Email/Password
				</div>
				');


                redirect(uri_string());
            }
        } else {
            $this->alert->set('login', 'danger', validation_errors());

            $this->session->set_flashdata('login', '<div uk-alert="" class="uk-alert-danger">
			    <a class="uk-alert-close" uk-close></a>
			    ' . validation_errors() . '
			</div>
			');


            redirect(uri_string());
        }
    }

    public function register()
    {
        $this->meta_title(lang_line('login2'));

        if (login_status('member') == FALSE) {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if ($this->CI->captcha() == TRUE && googleCaptcha()->success == FALSE) {
                    $this->alert->set('register', 'danger', 'Please complete the captcha');
                    redirect(uri_string());
                } else {
                    $this->form_validation->set_rules(array(
                        array(
                            'field' => 'name',
                            'label' => lang_line("login_name"),
                            'rules' => 'required|trim|min_length[3]|max_length[100]|alpha_numeric_spaces'
                        ),
                        array(
                            'field' => 'username',
                            'label' => 'Username',
                            'rules' => 'required|trim|min_length[3]|max_length[150]|callback__cek_username_register',
                        ),
                        array(
                            'field' => 'phone',
                            'label' => 'Phone',
                            'rules' => 'required|trim|min_length[11]|max_length[15]|numeric|callback__cek_phone_register',
                        ),
                        array(
                            'field' => 'email',
                            'label' => lang_line("login_email"),
                            'rules' => 'required|trim|min_length[3]|max_length[80]|valid_email|callback__cek_reg_email'
                        ),
                        array(
                            'field' => 'password',
                            'label' => lang_line("login_pass"),
                            'rules' => 'required|trim|min_length[3]|max_length[20]'
                        ),
                        array(
                            'field' => 'password2',
                            'label' => lang_line("login_pass2"),
                            'rules' => 'required|trim|min_length[3]|max_length[20]|matches[password]',
                            'errors' => array(
                                // 'matches' => '%s '
                                'matches' => lang_line('err_match')
                            )
                        )
                    ));

                    if ($this->form_validation->run()) {
                        $photo = 'user-' . md5(strtotime(date('YmdHis'))) . '.jpg';
                        $email = $this->input->post('email', TRUE);
                        $username = seotitle($this->input->post('username'));
                        $full_name = $this->input->post('name', TRUE);
                        $tlpn = $this->input->post('phone', TRUE);
                        $pass = $this->input->post('password');
                        $password = encrypt($pass);
                        $activation_key = md5('reg' . strtotime(date('YmdHis')) . random_string('alnum', 4));
                        $website_name = $this->settings->website('web_name');
                        $website_email = $this->settings->website('web_email');

                        if (!empty($this->input->post('referral', true))) {
                            $referral_id = $this->input->post('referral', true);

                            $cek_cookie = $this->db->get_where('t_user', array('username' => $referral_id))->row_array();


                            if (empty($cek_cookie)) {
                                $referral_id = "0";
                            } else {
                                //cek apakah upline punya founder
                                $referral_id = $cek_cookie['id'];
                            }
                        } else {
                            $referral_id = "0";
                            $founder = "0";
                        }

                        // insert member to database.
                        $usernya = $this->login_model->insert_member(array(
                            'name' => $full_name,
                            'username' => $username,
                            'email' => $email,
                            'password' => $password,
                            'tlpn' => $tlpn,
                            'photo' => $photo,
                            'level' => '4',
                            'active' => 'N',
                            'activation_key' => $activation_key,
                            'referral_id' => $referral_id,
                            'join_date' => date('Y-m-d')
                        ));

                        $this->login_model->create_wallet(array(
                            'user_id' => $usernya,
                            'amount' => '0'
                        ));

                        $type = 'member';
                        $this->sendemailAdmin($type);
                        $this->sendemailMember($activation_key);

                        $this->session->set_flashdata('reg_success', '1');
                        redirect(member_url());
                    } else {
                        $error_content = validation_errors();
                        $this->alert->set('register', 'danger', $error_content);
                        $this->session->set_flashdata('register', '
                        <div class="alert alert-danger" role="alert">
                        ' . $error_content . '
                    </div>
						');
                        redirect(uri_string());
                    }
                }
            } elseif (!empty($this->session->flashdata('reg_success'))) {
                $this->load->view('member/log_header', $this->vars);
                $this->load->view('member/log_register_success', $this->vars);
                $this->load->view('member/log_footer', $this->vars);
            } else {
                if ($this->input->get('ref') != null) {
                    $ref_link = $this->input->get('ref');
                    $cek = $this->db->get_where('t_user', array('username' => $ref_link))->row_array();

                    if (!empty($cek)) {
                        $this->session->set_userdata(array('nama_referral' => $cek['username']));
                    } else {

                        $this->session->set_userdata(array('nama_referral' => ""));
                        echo "<script>alert('referral link tidak ditemukan, mohon periksa kembali!'); window.location.href='" . member_url() . "';</script>";
                    }
                } else {

                    $this->session->set_userdata(array('nama_referral' => ""));
                }

                $this->load->view('member/log_header', $this->vars);
                $this->load->view('member/log_register', $this->vars);
                $this->load->view('member/log_footer', $this->vars);
            }
        } else {
            redirect(site_url('l-member/home'));
        }
    }

    public function _cek_reg_email($email = '')
    {
        if (empty($email)) {
            $this->form_validation->set_message('_cek_reg_email', '%s ' . lang_line('err_required'));
            return FALSE;
        } else {
            $input_email = encrypt(xss_filter($email, 'xss'));
            $cekmail = $this->login_model->cek_reg_email($input_email);

            if ($cekmail == FALSE) {
                $this->form_validation->set_message('_cek_reg_email', lang_line('err_mailexists'));
                return FALSE;
            } else {
                return TRUE;
            }
        }
    }

    public function sendemailAdmin($type)
    {

        $member_nama = $this->input->post('name', TRUE);
        $member_uname = seotitle($this->input->post('username'));
        $member_email = $this->input->post('email', TRUE);

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
        $this->email->to($alert_address); // Ganti dengan email tujuan kamu
        // Lampiran email, isi dengan url/path file
        // $this->email->attach('https://masrud.com/content/images/20181215150137-codeigniter-smtp-gmail.png');

        if ($type === 'ib') {
            // Subject email
            $this->email->subject('IB Registered');

            // Isi email
            // $this->email->message('Klik unttuk verifikasi email anda : <a href="' . base_url() . 'login/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Activate</a>');
            // $this->email->message('test');
            // $this->email->message('test');
            $this->email->message('<html><body>
								Yth. Bpk/Ibu <b> Admin </b>,<br /><br />
								IB baru telah terdaftar dengan data sebagai berikut :<br>
								Nama : ' . $member_nama . '<br>
								Username : IB-' . $member_uname . '<br>
								Email : ' . $member_email . ' <br>
								<br>silakan cek dilink berikut : <a href="' . admin_url("member") . '"> cek user</a>
								</html></body>');
        } else {
            // Subject email
            $this->email->subject('New Member Registered');

            // Isi email
            // $this->email->message('Klik unttuk verifikasi email anda : <a href="' . base_url() . 'login/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Activate</a>');
            // $this->email->message('test');
            // $this->email->message('test');
            $this->email->message('<html><body>
								Yth. Bpk/Ibu <b> Admin </b>,<br /><br />
								Member baru telah terdaftar dengan data sebagai berikut :<br>
								Nama : ' . $member_nama . '<br>
								Username : ' . $member_uname . '<br>
								Email : ' . $member_email . ' <br>
								<br>silakan cek dilink berikut : <a href="' . admin_url("member") . '"> cek user</a>
								</html></body>');
        }


        $this->email->send();
    }

    public function sendemailMember($token)
    {

        $member_nama = $this->input->post('name', TRUE);
        $member_uname = seotitle($this->input->post('username'));
        $member_email = $this->input->post('email', TRUE);

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
        // Lampiran email, isi dengan url/path file
        // $this->email->attach('https://masrud.com/content/images/20181215150137-codeigniter-smtp-gmail.png');

        // Subject email
        $this->email->subject('Registered');

        // Isi email
        // $this->email->message('Klik unttuk verifikasi email anda : <a href="' . base_url() . 'login/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Activate</a>');
        // $this->email->message('test');
        // $this->email->message('test');
        $this->email->message($this->getEmailBody($member_nama, $website_name, $token, $member_email));


        $this->email->send();
    }

    public function getEmailBody($member_nama, $website_name, $token, $member_email)
    {
        $data['data'] = array('name' => $member_nama, 'website' => $website_name, 'token' => encrypt($token), 'email' => $member_email);
        $msg = $this->load->view('member/template-email/registrasi', $data, true);
        return $msg;
    }

    public function activation()
    {
        if (login_status('member') == FALSE) {
            $key = decrypt($this->input->get('token', TRUE));
            $email = $this->input->get('email', TRUE);

            if (!empty($key)) {
                $query_key = $this->db->where("BINARY activation_key='$key' AND BINARY email='$email'", NULL, FALSE)->get('t_user');
                if ($query_key->num_rows() == 1) {
                    $data = $query_key->row_array();

                    $this->db->where('id', $data['id'])->update('t_user', ['active' => 'Y', 'activation_key' => '0']); // update activation row
                    $this->session->set_flashdata('login', '<div uk-alert="" class="uk-alert-success">
                    <a class="uk-alert-close" uk-close></a>
                    Akun anda telah terverifikasi. Silakan Login
                </div>');
                    redirect(site_url('l-member'));
                } else {

                    $this->session->set_flashdata('login', '<div uk-alert="" class="uk-alert-danger">
                    <a class="uk-alert-close" uk-close></a>
                    Gagal verifikasi, silakan coba lagi
                </div>');
                    redirect(site_url('l-member'));
                    // $this->vars['data'] = lang_line('err_ativation');
                    // $this->load->view('member/log_header', $this->vars);
                    // $this->load->view('member/log_activation', $this->vars);
                    // $this->load->view('member/log_footer', $this->vars);
                }
            } else {
                show_404();
            }
        } else {
            redirect(site_url('l-member'));
        }
    }


    public function forgot()
    {
        $this->meta_title(lang_line('login3'));

        if (login_status('member') == FALSE) {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if ($this->CI->captcha() == TRUE && googleCaptcha()->success == FALSE) {
                    $this->alert->set('forgot', 'danger', 'Please complete the captcha');
                    redirect(uri_string());
                } else {
                    $this->form_validation->set_rules(array(
                        array(
                            'field' => 'email',
                            'label' => lang_line('login_email'),
                            'rules' => 'required|trim|min_length[4]|max_length[80]|valid_email'
                        )
                    ));

                    if ($this->form_validation->run()) {
                        $email = $this->input->post('email', TRUE);
                        $data_user = $this->db
                            ->select('name,email,password')
                            ->where("BINARY email='$email'", NULL, FALSE)
                            ->where('level', '4')
                            ->where('active', 'Y')
                            ->get('t_user');

                        if ($data_user->num_rows() == 1) {
                            $data = $data_user->row_array();
                            $email = $data['email'];
                            $full_name = $data['name'];
                            $password = decrypt($data['password']);
                            $website_name = $this->settings->website('web_name');
                            $website_email = $this->settings->website('web_email');

                            // Send email.
                            $this->load->library('email');
                            $this->email->initialize($this->settings->email_config());
                            // $this->email->set_newline("\r\n");
                            $this->email->from($website_email, $website_name);
                            $this->email->to($email);
                            $this->email->subject('Forgot Password For ' . $website_name);

                            $this->email->message('<html><body>
								Hi <b>' . $full_name . '</b>,<br /><br />
								If you have never requested message information about forgotten password in <a href="' . site_url() . '" target="_blank" title="' . $website_name . '">' . $website_name . '</a>, please to ignore this email.<br /><br />
								But if you really are asking for messages of this information, please to log in with the password and then change the default password to a more secure password.<br /><br />
								-------------------------------------------------------<br />
								Your password : ' . $password . '<br />
								-------------------------------------------------------<br /><br />
								Warm regards,<br />
								<a href="' . site_url() . '" target="_blank" title="' . $website_name . '">' . $website_name . '</a>
							</body></html>');

                            $this->email->send();

                            $this->alert->set('forgot', 'success', lang_line('forgot_send'));
                            redirect(uri_string());
                        } else {
                            $this->alert->set('forgot', 'warning', lang_line('err_mailnotexists'));
                            redirect(uri_string());
                        }
                    } else {
                        $error_content = validation_errors();
                        $this->alert->set('forgot', 'danger', $error_content);
                        redirect(uri_string());
                    }
                }
            } else {
                $this->load->view('member/log_header', $this->vars);
                $this->load->view('member/log_forgot', $this->vars);
                $this->load->view('member/log_footer', $this->vars);
            }
        } else {
            redirect(site_url('l-member/home'));
        }
    }


    public function cek()
    {
        if ($this->input->is_ajax_request()) {
            $this->form_validation->set_rules(array(
                array(
                    'field' => 'data',
                    'label' => 'data',
                    'rules' => 'required|trim|min_length[4]|max_length[80]|valid_email'
                )
            ));

            if ($this->form_validation->run()) {
                $data = xss_filter($this->input->post('data'), 'xss');
                $logemail = encrypt($data);
                $response['status'] = $this->login_model->cek_email($logemail);

                if ($response['status'] == 1) {
                    $response['html'] = '<div class="form-group mt-3">
						<label for="password">' . lang_line('login_pass') . '</label>
						<a href="' . member_url('forgot') . '" class="pull-right"><small>' . lang_line('login_forgot') . '</small></a>
						<input type="password" name="' . $this->vars['input_pwd'] . '" id="password" class="form-control" required autofocus>
					</div>
					<div class="form-group mb-0">
						<button type="submit" class="btn btn-primary btn-block mt-3">' . lang_line('login_button_signin') . '</button>
					</div>';
                } else {
                    $response['html'] = '';
                }
            } else {
                $response['status'] = '0';
                $response['html'] = '';
            }

            $this->json_output($response);
        }
    }


    private function _cek_username($username = '')
    {
        $cek_username = $this->login_model->cek_username($username);

        if ($cek_username == '0') {
            $this->form_validation->set_message('_cek_username', '{field} error.');
            return FALSE;
        }

        if ($cek_username == '1') {
            return TRUE;
        }
    }

    public function _cek_username_register($username = '')
    {
        if (empty($username)) {
            $this->form_validation->set_message('_cek_username_register', '%s ' . lang_line('err_required'));
            return FALSE;
        } else {
            $input_username = encrypt(xss_filter($username, 'xss'));
            $cekmail = $this->login_model->cek_reg_username($input_username);

            if ($cekmail == FALSE) {
                $this->form_validation->set_message('_cek_username_register', 'Username Exist');
                return FALSE;
            } else {
                return TRUE;
            }
        }
    }

    public function _cek_phone_register($phone = '')
    {
        if (empty($phone)) {
            $this->form_validation->set_message('_cek_phone_register', '%s ' . lang_line('err_required'));
            return FALSE;
        } else {
            $input_phone = encrypt(xss_filter($phone, 'xss'));
            $cekmail = $this->login_model->cek_reg_phone($input_phone);

            if ($cekmail == FALSE) {
                $this->form_validation->set_message('_cek_phone_register', 'Phone Number Exist');
                return FALSE;
            } else {
                return TRUE;
            }
        }
    }


    public function logout()
    {
        if (!empty(login_key('member'))) {
            $activity = array(
                'user_id' => login_key('member'),
                'type' => 'Logout',
                'activity' => 'Logout'
            );
            $this->account_model->insert_activity($activity);
        }
        $this->session->unset_userdata('log_member');
        redirect(member_url());
    }
} // End Class.