<?php defined('BASEPATH') or exit('No direct script access allowed');

class Internal_transfer extends Member_controller
{

    public $mod = 'internal_transfer';
    public $mod_add = 'add-new';
    public $mod_edit = 'edit';

    public function __construct()
    {
        parent::__construct();

        $this->meta_title(lang_line('referral_title'));
        $this->load->model('member/internal_transfer_model');
        $this->load->model('member/account_model');
        $this->load->library('email');
    }


    /**
     * Fungsi untuk menampilkan halaman index referral.
     * @access 	public
     * @return 	void | string | json
     */
    public function index()
    {


        if ($this->input->get('t') === 'request') {
            $status_data = $this->account_model->get_account()['status_data'];

            if ($status_data === 'Incomplete') {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger">
    			  <strong>Warning!</strong> ' . lang_line('account_incomplete') . ' ' . lang_line('or') . ' ' . lang_line('verify') . ' 
    			</div>');
                redirect(member_url('deposit'));
            }
            $this->vars['wallet'] = $this->account_model->get_wallet();
            $this->vars['account'] = $this->account_model->get_account_trading_active();
            $this->vars['receiver'] = $this->account_model->get_account_receiver();
            $this->render_view('internal_transfer', $this->vars);
        } else {
            $this->vars['internal'] = $this->internal_transfer_model->get_internaltf();
            $this->render_view('internal_transfer_history', $this->vars);
        }
    }

    public function submit_internal_transfer()
    {
        $this->form_validation->set_rules(array(
            array(
                'field' => 'from_internaltrf',
                'label' => lang_line('itf_label_from'),
                'rules' => 'required|trim'
            ),
            array(
                'field' => 'to_internaltrf',
                'label' => lang_line('itf_label_to'),
                'rules' => 'required|trim'
            ),
            array(
                'field' => 'amount_internaltrf',
                'label' => lang_line('itf_label_amount'),
                'rules' => 'required|trim'
            )
        ));

        if ($this->form_validation->run()) {
            $from_tf = xss_filter($this->input->post('from_internaltrf', true), 'xss');
            $to_tf = xss_filter($this->input->post('to_internaltrf', true), 'xss');
            $amount = xss_filter($this->input->post('amount_internaltrf', true), 'xss');

            //mengecek apakah asal dan tujuan sama
            //jika sama-sama 
            if ($from_tf === $to_tf) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger">
			  		<strong>Attention! </strong> ' . lang_line('itf_label_sama') . '.
				</div>');
                redirect(member_url('internal_transfer'));
            }
            //jika beda
            else {
                //jika from adalah wallet
                if ($from_tf === 'Wallet') {
                    //mendapatkan data wallet
                    $wallet = $this->account_model->get_wallet();

                    //jika jumlah internal transfer lebih besar dari jumlah wallet
                    if ($amount > $wallet['amount']) {
                        $this->session->set_flashdata('pesan', '<div class="alert alert-danger">
					  		<strong>Warning!</strong> ' . lang_line('itf_label_walleterror') . '.
						</div>');
                        redirect(member_url('internal_transfer'));
                    }
                    //jika jumlah wd kurang dari &/ sama dengan 0
                    elseif ($amount <= 0) {
                        $this->session->set_flashdata('pesan', '<div class="alert alert-danger">
					  		<strong>Warning!</strong> ' . lang_line('itf_label_amounterror') . '.
						</div>');
                        redirect(member_url('internal_transfer'));
                    }
                    //jika jumlah wd kurang dari &/ sama dengan wallet
                    elseif ($amount <= $wallet['amount']) {
                        //periksa to
                        $account = $this->account_model->get_one_account_trading($to_tf);
                        if (!empty($account)) {
                            $data = array(
                                'user_id' => login_key('member'),
                                'from_tf' => $from_tf,
                                'to_tf' => $to_tf,
                                'amount' => $amount,
                                'status' => 'Pending',
                                'keterangan' => 'internal transfer wallet to personal account' . $to_tf
                            );

                            $internaltf_id = $this->internal_transfer_model->insert_internaltf($data);


                            //mengubah jumlah wallet
                            $jml_wallet = $wallet['amount'] - $amount;

                            $data_wallet = array('amount' => $jml_wallet);

                            $this->account_model->update_wallet($wallet['id'], $data_wallet);

                            //mencatat history
                            $data_wallet_history = array(
                                'wallet_id' => $wallet['id'],
                                'amount_before' => $wallet['amount'],
                                'amount' => $amount,
                                'amount_after' => $jml_wallet,
                                'source' => 'Internal Transfer',
                                'internal_transfer_id' => $internaltf_id
                            );
                            $this->account_model->insert_wallet_history($data_wallet_history);
                            $activity = array(
                                'user_id' => login_key('member'),
                                'type' => 'Internal Transfer',
                                'activity' => 'Request Internal Transfer'
                            );
                            $this->account_model->insert_activity($activity);

                            $this->sendemailAdmin();
                            $this->session->set_flashdata('pesan', '<div class="alert alert-success">
							  <strong>Success!' . lang_line('itf_label_sukses') . '</strong>
							</div>');
                            redirect(member_url('internal_transfer'));
                        } else {
                            $receiver = $this->account_model->get_account_receiver($to_tf);

                            if (!empty($receiver)) {
                                $data = array(
                                    'user_id' => login_key('member'),
                                    'from_tf' => $from_tf,
                                    'to_tf' => $to_tf,
                                    'amount' => $amount,
                                    'status' => 'Pending',
                                    'keterangan' => 'internal transfer wallet to account receiver ' . $to_tf
                                );

                                $this->internal_transfer_model->insert_internaltf($data);
                                $activity = array(
                                    'user_id' => login_key('member'),
                                    'type' => 'Internal Transfer',
                                    'activity' => 'Request Internal Transfer'
                                );
                                $this->account_model->insert_activity($activity);
                                $this->sendemailAdmin();

                                $this->session->set_flashdata('pesan', '<div class="alert alert-success">
								  <strong>Success!' . lang_line('itf_label_sukses') . '</strong>
								</div>');
                                redirect(member_url('internal_transfer'));
                            } else {
                                if ($to_tf === 'Broker') {
                                    $data = array(
                                        'user_id' => login_key('member'),
                                        'from_tf' => $from_tf,
                                        'to_tf' => $to_tf,
                                        'amount' => $amount,
                                        'status' => 'Pending',
                                        'keterangan' => 'internal transfer wallet to broker'
                                    );

                                    $this->internal_transfer_model->insert_internaltf($data);
                                    $activity = array(
                                        'user_id' => login_key('member'),
                                        'type' => 'Internal Transfer',
                                        'activity' => 'Request Internal Transfer'
                                    );
                                    $this->account_model->insert_activity($activity);
                                    $this->sendemailAdmin();

                                    $this->session->set_flashdata('pesan', '<div class="alert alert-success">
									  <strong>Success!' . lang_line('itf_label_sukses') . '</strong>
									</div>');
                                    redirect(member_url('internal_transfer'));
                                } else {
                                    $cekusername = $this->db->get_where('t_user', array('username' => $to_tf))->row_array();
                                    if (!empty($cekusername)) {
                                        $data = array(
                                            'user_id' => login_key('member'),
                                            'from_tf' => $from_tf,
                                            'to_tf' => $to_tf,
                                            'amount' => $amount,
                                            'status' => 'Pending',
                                            'keterangan' => 'internal transfer wallet to user/ib'
                                        );

                                        $internaltf_id = $this->internal_transfer_model->insert_internaltf($data);

                                        //mengubah jumlah wallet
                                        $jml_wallet = $wallet['amount'] - $amount;

                                        $data_wallet = array('amount' => $jml_wallet);

                                        $this->account_model->update_wallet($wallet['id'], $data_wallet);

                                        //mencatat history
                                        $data_wallet_history = array(
                                            'wallet_id' => $wallet['id'],
                                            'amount_before' => $wallet['amount'],
                                            'amount' => $amount,
                                            'amount_after' => $jml_wallet,
                                            'source' => 'Internal Transfer',
                                            'internal_transfer_id' => $internaltf_id
                                        );
                                        $this->account_model->insert_wallet_history($data_wallet_history);
                                        $activity = array(
                                            'user_id' => login_key('member'),
                                            'type' => 'Internal Transfer',
                                            'activity' => 'Request Internal Transfer'
                                        );
                                        $this->account_model->insert_activity($activity);
                                        $this->sendemailAdmin();

                                        $this->session->set_flashdata('pesan', '<div class="alert alert-success">
										  <strong>Success!' . lang_line('itf_label_sukses') . '</strong>
										</div>');
                                        redirect(member_url('internal_transfer'));
                                    } else {
                                        $this->session->set_flashdata('pesan', '<div class="alert alert-danger"><strong>Warning!</strong> Error.
										</div>');
                                        redirect(member_url('internal_transfer'));
                                    }
                                }
                            }
                        }
                    } else {
                        $this->session->set_flashdata('pesan', '<div class="alert alert-danger">
					  		<strong>Warning!</strong> ERROR
						</div>');
                        redirect(member_url('internal_transfer'));
                    }
                }
                //jika bukan
                else {
                    //mendapatkan data account pribadi
                    $account = $this->account_model->get_one_account_trading($from_tf);
                    //jika benar account milik user
                    if (!empty($account)) {
                        //mengecek tujuan
                        //jika tujuan transfer bukan wallet
                        if ($to_tf !== 'Wallet') {
                            $this->session->set_flashdata('pesan', '<div class="alert alert-danger">
						  		<strong>Warning!</strong> ' . lang_line('itf_label_lainerror') . '.
							</div>');
                            redirect(member_url('internal_transfer'));
                        } else {

                            //jika jumlah internal transfer lebih besar dari jumlah wallet
                            if ($amount > $account['amount']) {
                                $this->session->set_flashdata('pesan', '<div class="alert alert-danger">
							  		<strong>Warning!</strong> ' . lang_line('itf_label_accerror') . '.
								</div>');
                                redirect(member_url('internal_transfer'));
                            }
                            //jika jumlah wd kurang dari &/ sama dengan 0
                            elseif ($amount <= 0) {
                                $this->session->set_flashdata('pesan', '<div class="alert alert-danger">
							  		<strong>Warning!</strong> ' . lang_line('itf_label_amounterror') . '.
								</div>');
                                redirect(member_url('internal_transfer'));
                            }
                            //jika jumlah wd kurang dari &/ sama dengan wallet
                            elseif ($amount <= $account['amount']) {
                                //insert user
                                $data = array(
                                    'user_id' => login_key('member'),
                                    'from_tf' => $from_tf,
                                    'to_tf' => $to_tf,
                                    'amount' => $amount,
                                    'status' => 'Pending',
                                    'keterangan' => 'internal transfer account trading pribadi ke wallet'
                                );

                                $internaltf_id = $this->internal_transfer_model->insert_internaltf($data);

                                //menghitung amount 
                                $jml_acc = $account['amount'];
                                $jml_acc_now = $jml_acc - $amount;

                                //update amount
                                $data_Account = array(
                                    'amount' => $jml_acc_now,
                                );
                                $this->db->where('id', $account['id']);
                                $this->db->update('t_account_trading', $data_Account);

                                //input  history ammout account 
                                $data_acc_history = array(
                                    'account_trading_id' => $account['id'],
                                    'amount_before' => $jml_acc,
                                    'amount' => $amount,
                                    'amount_after' => $jml_acc_now,
                                    'keterangan' => 'Internal Transfer',
                                    'internal_transfer_id' => $internaltf_id
                                );
                                $this->db->insert('t_account_trading_amount_history', $data_acc_history);
                                $activity = array(
                                    'user_id' => login_key('member'),
                                    'type' => 'Internal Transfer',
                                    'activity' => 'Request Internal Transfer'
                                );
                                $this->account_model->insert_activity($activity);
                                $this->sendemailAdmin();

                                $this->session->set_flashdata('pesan', '<div class="alert alert-success">
								  <strong>Success!' . lang_line('itf_label_sukses') . '</strong>
								</div>');
                                redirect(member_url('internal_transfer'));
                            } else {
                                $this->session->set_flashdata('pesan', '<div class="alert alert-danger">
							  		<strong>Warning!</strong> ERROR
								</div>');
                                redirect(member_url('internal_transfer'));
                            }
                        }
                    } else {
                        $this->session->set_flashdata('pesan', '<div class="alert alert-danger">
					  		<strong>Warning!</strong> ERROR
						</div>');
                        redirect(member_url('internal_transfer'));
                    }
                }
            }
        } else {
            $error_content = validation_errors();
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger">
			  <strong>Warning!</strong> ' . $error_content . '.
			</div>');
            redirect(member_url('internal_transfer'));
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
        $this->email->subject('Internal Transfer');

        // Isi email
        // $this->email->message('Klik unttuk verifikasi email anda : <a href="' . base_url() . 'login/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Activate</a>');
        // $this->email->message('test');
        // $this->email->message('test');
        $this->email->message('<html><body>
							Yth. Bpk/Ibu <b> Admin </b>,<br /><br />
							Member dengan username ' . $member_username . ' telah mengajukan internal transfer, silakan cek dilink berikut : <a href="' . admin_url("internal_transfer") . '"> cek internal transfer</a>
							</html></body>');
        $this->email->send();
    }
} // End class.