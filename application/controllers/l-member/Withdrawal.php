<?php defined('BASEPATH') or exit('No direct script access allowed');

class Withdrawal extends Member_controller
{

	public $mod = 'withdrawal';
	public $mod_add  = 'add-new';
	public $mod_edit = 'edit';

	public function __construct()
	{
		parent::__construct();

		$this->meta_title(lang_line('referral_title'));
		$this->load->model('member/withdrawal_model');
		$this->load->model('member/account_model');
		$this->load->model('mod/rate_model');
		$this->load->library('email');
	}


	/**
	 * Fungsi untuk menampilkan halaman index wd.
	 * @access 	public
	 * @return 	void | string | json
	 */
	public function index()
	{
		if ($this->input->get('t') === 'request') {
			$status_data = $this->account_model->get_account()['status_data'];

			if ($status_data === 'Incomplete') {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger">
    			  <strong>Info!</strong> ' . lang_line('account_incomplete') . ' ' . lang_line('or') . ' ' . lang_line('verify') . ' 
    			</div>');
				redirect(member_url('deposit'));
			}
			$this->vars['wallet'] = $this->account_model->get_wallet();
			$this->vars['bank'] = $this->account_model->get_all_bank();
			$this->vars['rate'] = $this->rate_model->get_rate('4');
			$this->render_view('withdrawal', $this->vars);
		} else {
			$this->vars['wd'] = $this->withdrawal_model->get_withdrawal();
			$this->render_view('withdrawal_history', $this->vars);
		}
	}


	public function submit_withdrawal()
	{
		$this->form_validation->set_rules(array(
			array(
				'field' => 'bank_name',
				'label' => lang_line('withdrawal_label_bank'),
				'rules' => 'required|trim'
			),
			array(
				'field' => 'asal',
				'label' => lang_line('withdrawal_label_asal'),
				'rules' => 'required|trim'
			),
			array(
				'field' => 'amount_wd',
				'label' => lang_line('withdrawal_label_jumlah'),
				'rules' => 'required|trim'
			)
		));

		if ($this->form_validation->run()) {
			//ngecek bank yang dipilih benar atau tidak
			$bank = decrypt($this->input->post('bank_name'));
			$cek_bank = $this->account_model->get_one_bank_member($bank);
			if (!empty($cek_bank)) {
				//mendapatkan username
				$user = $this->account_model->get_account()['username'];

				//mendapatkan wallet
				$wallet = $this->account_model->get_wallet();

				//menghitung jumlah wd
				$amount = xss_filter($this->input->post('amount_wd', true), 'xss');
				$rate = xss_filter($this->input->post('rate_wd'), 'xss');
				$jumlah_wd = $amount * $rate;

				//membandingkan jumlah wd dengan wallet
				//jika jumlah wd lebih dari jumlah wallet
				if ($amount > $wallet['amount']) {
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger">
				  		<strong>Info!</strong> ' . lang_line('withdrawal_label_walleterror') . '.
					</div>');
					redirect(member_url('withdrawal'));
				}
				//jika jumlah wd kurang dari &/ sama dengan 0
				elseif ($amount <= 0) {
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger">
				  		<strong>Info!</strong> ' . lang_line('withdrawal_label_amounterror') . '.
					</div>');
					redirect(member_url('withdrawal'));
				}
				//jika jumlah wd kurang dari &/ sama dengan wallet
				else {
					$data   = array(
						'user_id'  => login_key('member'),
						'bank_id'  => $bank,
						'username' => $user,
						'source'  => xss_filter($this->input->post('asal'), 'xss'),
						'amount'  => $jumlah_wd,
						'rate_amount'  => $rate,
						'amount_usd' => $amount,
						'status' => 'Pending'
					);

					$wallet_id = $this->withdrawal_model->insert_withdrawal($data);

					//hitung wallet - jumlah wd
					$jumlah_wallet = $wallet['amount'] - $amount;

					//update wallet
					$data_wallet = array(
						'amount' => $jumlah_wallet
					);
					$this->account_model->update_wallet($wallet['id'], $data_wallet);

					//insert ke history wallet
					$data_wallet_history = array(
						'wallet_id' => $wallet['id'],
						'amount_before' => $wallet['amount'],
						'amount' => $amount,
						'amount_after' => $jumlah_wallet,
						'source' => 'Withdrawal',
						'withdraw_id' => $wallet_id
					);
					$this->account_model->insert_wallet_history($data_wallet_history);

					$activity = array(
						'user_id' => login_key('member'),
						'type' => 'Withdraw',
						'activity' => 'Request Withdrawal'
					);
					$this->account_model->insert_activity($activity);

					$this->sendemailAdmin();

					$this->session->set_flashdata('pesan', '<div class="alert alert-success">
					  <strong>Success!' . lang_line('withdrawal_label_sukses') . '</strong>
					</div>');
					redirect(member_url('withdrawal'));
				}
			} else {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger">
				  <strong>Info!</strong> ' . lang_line('withdrawal_label_emptybank') . '.
				</div>');
				redirect(member_url('withdrawal'));
			}
		} else {
			$error_content = validation_errors();
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger">
			  <strong>Info!</strong> ' . $error_content . '.
			</div>');
			redirect(member_url('withdrawal'));
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

		$website_name   = $this->settings->website('web_name');
		$website_email  = $this->settings->website('username');
		$mailpas		= decrypt($this->settings->website('password'));
		$mailhost		= $this->settings->website('hostname');
		$mailproto		= $this->settings->website('protocol');
		$mailport 		= $this->settings->website('port');
		$alert_address	= $this->settings->website('email_alert');

		// Konfigurasi email
		$config = [
			'mailtype'  => 'html',
			'charset'   => 'utf-8',
			'protocol'  => $mailproto,
			'smtp_host' => $mailhost,
			'smtp_user' => $website_email,
			'smtp_pass' => $mailpas,
			'smtp_port' => $mailport,
			'crlf'      => "\r\n",
			'newline'   => "\r\n"
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
		$this->email->subject('Withdraw');

		// Isi email
		// $this->email->message('Klik unttuk verifikasi email anda : <a href="' . base_url() . 'login/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Activate</a>');
		// $this->email->message('test');
		// $this->email->message('test');
		$this->email->message('<html><body>
							Yth. Bpk/Ibu <b> Admin </b>,<br /><br />
							Member dengan username ' . $member_username . ' telah mengajukan withdrawal, silakan cek dilink berikut : <a href="' . admin_url("withdrawal") . '"> cek withdrawal</a>
							</html></body>');
		$this->email->send();
	}


	/**
	 * Fungsi aksi hapus referral.
	 * @access 	public
	 * @return 	void | string | json
	 */
	public function delete()
	{
		if ($this->input->is_ajax_request()) {
			$data_pk = $this->input->referral('data');

			foreach ($data_pk as $key) {
				$pk = xss_filter(decrypt($key), 'sql');
				$this->referral_model->delete($pk);
			}

			$response['success'] = true;
			$response['alert']['type'] = 'success';
			$response['alert']['content'] = lang_line('form_message_delete_success');

			$this->json_output($response);
		} else {
			show_404();
		}
	}


	/**
	 * Fungsi untuk menampilkan tag saat di ketik pada inputan tags.
	 * @access 	public
	 * @return 	void | string | json
	 */
	public function ajax_tags()
	{
		if ($this->input->is_ajax_request()) {
			$input  = seotitle($this->input->referral('q'));
			$output = $this->referral_model->ajax_tags($input);
			$this->json_output($output);
		} else {
			show_404();
		}
	}


	/**
	 * Fungsi untuk validasi seotitle untuk aksi tambah referral.
	 * @access 	public
	 * @return 	bool | void
	 */
	public function _cek_add_seotitle($seotitle = '')
	{
		$cek = $this->referral_model->cek_seotitle(seotitle($seotitle));
		if ($cek === FALSE)
			$this->form_validation->set_message('_cek_add_seotitle', lang_line('form_message_already_exists'));
		return $cek;
	}


	/**
	 * Fungsi untuk validasi seotitle untuk aksi ubah referral.
	 * @access 	public
	 * @return 	bool | void
	 */
	public function _cek_id_member($id)
	{
		$cek = $this->referral_model->cek_member_id($id);
		if ($cek === FALSE)
			echo "<script>
			alert('ID Sudah Tersedia');
			</script>";
	}
} // End class.