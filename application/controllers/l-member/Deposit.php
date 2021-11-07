<?php defined('BASEPATH') or exit('No direct script access allowed');

class Deposit extends Member_controller
{

    public $mod = 'deposit';
    public $mod_add = 'add-new';
    public $mod_edit = 'edit';

    public function __construct()
    {
        parent::__construct();

        $this->meta_title(lang_line('referral_title'));
        $this->load->model('member/deposit_model');
        $this->load->model('member/account_model');
        $this->load->model('mod/rate_model');
        $this->load->library('email');
    }


    /**
     * Fungsi untuk menampilkan halaman index referral.
     * @access 	public
     * @return 	void | string | json
     */
    public function index()
    {
        $this->vars['bank_type'] = $this->input->get('bank');

        if (empty($this->vars['bank_type'])) {
            $this->vars['deposit'] = $this->deposit_model->get_deposit();
            $this->render_view('deposit_history', $this->vars);
        }
        $this->vars['bank'] = $this->account_model->get_all_bank();
        $this->vars['rate'] = $this->rate_model->get_rate('2');
        $this->render_view('deposit', $this->vars);
    }


    public function submit_deposit()
    {
        $this->form_validation->set_rules(array(
                array(
                'field' => 'bank_name',
                'label' => lang_line('deposit_label_bank'),
                'rules' => 'required|trim'
            ),
                array(
                'field' => 'destination',
                'label' => lang_line('deposit_label_tujuan'),
                'rules' => 'required|trim'
            ),
                array(
                'field' => 'amount',
                'label' => lang_line('deposit_label_jumlah'),
                'rules' => 'required|trim'
            ),
                array(
                'field' => 'foto',
                'label' => lang_line('deposit_label_upload'),
                'rules' => 'trim|callback_validate_fotoid'
            )
        ));

        if ($this->form_validation->run()) {
            $bank = decrypt($this->input->post('bank_name'));
            $cek_bank = $this->account_model->get_one_bank_member($bank);
            if (!empty($cek_bank)) {
                $user = $this->account_model->get_account()['username'];
                $amount = str_replace(".", "", xss_filter($this->input->post('amount', true), 'xss'));
                $rate = xss_filter($this->input->post('rate'), 'xss');
                $usd = $amount / $rate;
                $data = array(
                    'user_id' => login_key('member'),
                    'bank_id' => $bank,
                    'username' => $user,
                    'destination' => xss_filter($this->input->post('destination'), 'xss'),
                    'rate_amount' => xss_filter($this->input->post('rate'), 'xss'),
                    'amount' => $amount,
                    'rate_amount' => $rate,
                    'amount_usd' => $usd,
                    'photo' => $_POST['foto'],
                    'status' => 'Pending'
                );

                $this->deposit_model->insert_deposit($data);
                $this->sendemailAdmin();
                $this->sendemailMember();

                $activity = array('user_id' => login_key('member'),
                    'type' => 'Deposit',
                    'activity' => 'Deposit');
                $this->account_model->insert_activity($activity);

                $this->session->set_flashdata('pesan', '<div class="alert alert-success">
				  ' . lang_line('deposit_label_sukses') . '
				</div>');
                redirect(member_url('deposit'));
            }
            else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger">
				  ' . lang_line('deposit_label_emptybank') . '.
				</div>');
                redirect(member_url('deposit'));
            }

        }
        else {
            $error_content = validation_errors();
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger">
			  <strong>Warning!</strong> ' . $error_content . '.
			</div>');
            redirect(member_url('deposit'));
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
        $this->email->subject('Deposit');

        // Isi email
        // $this->email->message('Klik unttuk verifikasi email anda : <a href="' . base_url() . 'login/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Activate</a>');
        // $this->email->message('test');
        // $this->email->message('test');
        $this->email->message('<html><body>
							Yth. Bpk/Ibu <b> Admin </b>,<br /><br />
							Member dengan username ' . $member_username . ' telah melakukan deposit, silakan cek dilink berikut : <a href="' . admin_url("deposit") . '"> cek deposit</a>
							</html></body>');
        $this->email->send();
    }

    public function sendemailMember()
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
        $this->email->to($member_email); // Ganti dengan email tujuan kamu
        // Lampiran email, isi dengan url/path file
        // $this->email->attach('https://masrud.com/content/images/20181215150137-codeigniter-smtp-gmail.png');

        // Subject email
        $this->email->subject('Deposit');

        // Isi email
        // $this->email->message('Klik unttuk verifikasi email anda : <a href="' . base_url() . 'login/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Activate</a>');
        // $this->email->message('test');
        // $this->email->message('test');
        $this->email->message('<html><body>
                            Dear <b> ' . $member_nama . ' </b>,<br /><br />
                            Anda telah berhasil melakukan Deposit, admin kami akan melakukan approval dalam waktu 1x24 jam.
                            <p><p><p>
                            Terimakasih,
                            <br>
                            ' . $website_name . ' Team
                            </html></body>');
        $this->email->send();
    }

    public function validate_fotoid()
    {

        $this->load->library('upload');
        $user = $this->account_model->get_account();

        $configured['upload_path'] = CONTENTPATH . 'uploads/user/';
        $configured['allowed_types'] = 'gif|png|jpg|jpeg';
        $configured['encrypt_name'] = true;
        // $configured['max_size'] = 20480; // 1MB

        $this->upload->initialize($configured);


        if (isset($_FILES['foto']) && !empty($_FILES['foto']['name'])) {
            if ($this->upload->do_upload('foto')) {
                $_POST['foto'] = $this->upload->data("file_name");
                return $_POST['foto'];
            }
            else {
                $error = $this->upload->display_errors();
                $this->form_validation->set_message('validate_fotoid', lang_line('deposit_label_uploaderror'));
                return false;
            }
        }
        else {
            $this->form_validation->set_message('validate_fotoid', lang_line('deposit_label_uploaderror'));
            return false;
        }
    }
} // End class.