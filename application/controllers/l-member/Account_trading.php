<?php defined('BASEPATH') or exit('No direct script access allowed');

class Account_trading extends Member_controller
{

    public $mod = 'account_trading';
    public $mod_add = 'add-new';
    public $mod_edit = 'edit';

    public function __construct()
    {
        parent::__construct();

        $this->meta_title(lang_line('referral_title'));
        $this->load->model('member/account_model');
        $this->load->library('email');
    }


    /**
     * Fungsi untuk menampilkan halaman index account trading.
     * @access 	public
     * @return 	void | string | json
     */
    public function index()
    {
        $this->vars['acc'] = $this->account_model->get_account_trading();
        $this->vars['product'] = $this->db->get('t_product')->result_array();
        $this->render_view('account_trading', $this->vars);
    }

    public function account_request()
    {
        $this->meta_title = 'Member - Request Account Trading';
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->form_validation->set_rules(array(
                array(
                    'field' => 'account_type',
                    'label' => lang_line('acc_label_acc'),
                    'rules' => 'required|trim'
                )
            ));

            if ($this->form_validation->run()) {
                $data = array(
                    'user_id' => login_key('member'),
                    'product_id' => xss_filter($this->input->post('account_type'), 'xss'),
                    'type_account' => xss_filter($this->input->post('acct'), 'xss'),
                    'leverage' => xss_filter($this->input->post('leverage'), 'xss'),
                    'status_request' => 'Pending'
                );

                $this->account_model->insert_acc_req($data);

                $activity = array(
                    'user_id' => login_key('member'),
                    'type' => 'Account Trading',
                    'activity' => 'Request Account Trading'
                );
                $this->account_model->insert_activity($activity);

                $this->sendemailAdmin();

                $this->session->set_flashdata('pesan', '<div class="alert alert-success">
				  <strong>Request account success! ' . lang_line('acc_label_reqsukses') . '</strong>
				</div>');
                redirect(member_url('account_trading'));
            } else {
                $error_content = validation_errors();
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger">
				  <strong>Warning!</strong> ' . $error_content . '.
				</div>');
                redirect(member_url('account_trading'));
            }
        } else {

            $status_data = $this->account_model->get_account()['status_data'];

            if ($status_data === 'Incomplete') {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger">
    			  <strong>Danger!</strong> ' . lang_line('account_incomplete') . ' ' . lang_line('or') . ' ' . lang_line('verify') . ' 
    			</div>');
                redirect(member_url('deposit'));
            }
            //cek wallet
            if (empty($this->account_model->get_wallet_history())) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger">
				  <strong>woops!! your wallet has not been deposited, please fill it in so you can request a trading account, <a href="https://https://moneymarketint.com/l-member/deposit">click here</a> to deposit</strong>
				</div>');
                redirect(member_url('account_trading'));
            } else {
                $this->vars['product'] = $this->db->get('t_product')->result_array();
                $this->render_view('account_trading_request', $this->vars);
            }
        }
    }

    public function sendemailAdmin()
    {
        $u_id = login_key('member');
        $member = $this->db->get_where('t_user', array('id' => $u_id))->row_array();

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
        $this->email->to($alert_address); // Ganti dengan email tujuan kamu
        // Lampiran email, isi dengan url/path file
        // $this->email->attach('https://masrud.com/content/images/20181215150137-codeigniter-smtp-gmail.png');

        // Subject email
        $this->email->subject('Request Account Trading');

        // Isi email
        // $this->email->message('Klik unttuk verifikasi email anda : <a href="' . base_url() . 'login/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Activate</a>');
        // $this->email->message('test');
        // $this->email->message('test');
        $this->email->message('<html><body>
							Yth. Bpk/Ibu <b> Admin </b>,<br /><br />
							Member dengan username ' . $member_username . ' telah mengajukan pembuatan akun trading dengan tipe akun ' . $this->input->post('acct') . ', silakan cek dilink berikut : <a href="' . admin_url("account_trading") . '"> cek akun trading</a>
							</html></body>');
        $this->email->send();
    }
} // End class.