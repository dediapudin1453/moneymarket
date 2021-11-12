<?php defined('BASEPATH') or exit('No direct script access allowed');

class Account extends Member_controller
{

	public $mod = 'account';
	public $mod_add = 'add-new';
	public $mod_edit = 'edit';

	public function __construct()
	{
		parent::__construct();

		$this->meta_title(lang_line('account_title'));
		$this->load->model('member/account_model');
	}


	/**
	 * Fungsi untuk menampilkan halaman index account.
	 * @access 	public
	 * @return 	void
	 */
	public function index()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			return $this->_upload();
		} else {
			$this->vars['row'] = $this->account_model->get_account();
			$this->vars['row_bank'] = $this->account_model->get_bank();
			$this->render_view('account', $this->vars);
		}
	}

	/**
	 * Fungsi submit update account.
	 * @access 	private
	 * @return 	void
	 */
	public function update_account()
	{
		$this->form_validation->set_rules(array(
			array(
				'field' => 'email',
				'label' => lang_line('account_label_email'),
				'rules' => 'required|trim|min_length[4]|max_length[80]|valid_email'
			),
			array(
				'field' => 'name',
				'label' => lang_line('account_label_name'),
				'rules' => 'required|trim|min_length[4]|max_length[100]|alpha_numeric_spaces'
			),
			array(
				'field' => 'gender',
				'label' => lang_line('account_label_gender'),
				'rules' => 'required|trim|max_length[1]|alpha'
			),
			array(
				'field' => 'birthday',
				'label' => lang_line('account_label_birthday'),
				'rules' => 'required|trim'
			),
			array(
				'field' => 'tlpn',
				'label' => lang_line('account_label_tlpn'),
				'rules' => 'required|trim|numeric|max_length[20]'
			),
			array(
				'field' => 'about',
				'label' => lang_line('account_label_about'),
				'rules' => 'trim|max_length[500]'
			),
			array(
				'field' => 'address',
				'label' => lang_line('account_label_address'),
				'rules' => 'trim|max_length[500]'
			)
		));

		if ($this->form_validation->run()) {
			$email = xss_filter($this->input->post('email', TRUE), 'xss');

			$cek_email = $this->db
				->select('email')
				->where("BINARY email='$email'", NULL, FALSE)
				->get('t_user');

			$contMail = $cek_email->num_rows();
			$currentMail = $cek_email->row_array()['email'];


			if (
				$contMail == 1 &&
				$currentMail == data_login('member', 'email') ||
				$contMail != 1
			) {
				$phone = xss_filter($this->input->post('tlpn', TRUE), 'xss');

				$cek_phone = $this->db
					->select('tlpn')
					->where("BINARY tlpn='$phone'", NULL, FALSE)
					->get('t_user');

				$contPhone = $cek_phone->num_rows();
				$currentPhone = $cek_phone->row_array()['tlpn'];

				$get_tlpn = $this->db->get_where('t_user', array('id' => login_key('member')))->row_array()['tlpn'];

				if (
					$contPhone == 1 &&
					$currentPhone	 == $get_tlpn ||
					$contPhone != 1
				) {
					$gender = ($this->input->post('gender', TRUE) == 'M' ? 'M' : 'F');
					$data   = array(
						'email'    => xss_filter($this->input->post('email', TRUE), 'xss'),
						'name'     => xss_filter($this->input->post('name', TRUE), 'xss'),
						'gender'   => $gender,
						'birthday' => xss_filter($this->input->post('birthday', TRUE), 'xss'),
						'tlpn'     => xss_filter($this->input->post('tlpn', TRUE), 'sql'),
						'about'    => xss_filter($this->input->post('about'), 'xss'),
						'address'  => xss_filter($this->input->post('address'), 'xss')
					);

					$this->account_model->update_profile($data);

					$this->session->set_flashdata('pesan', '<div class="alert alert-success">
					  ' . lang_line('form_message_update_success') . '.
					</div>');
					redirect(member_url('account'));
				} else {
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger">
					  ' . lang_line('err_phoneexists') . '.
					</div>');
					redirect(member_url('account'));
				}
			} else // Email has been registered.
			{
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger">
				  ' . lang_line('err_mailexists') . '.
				</div>');
				redirect(member_url('account'));
			}
		} else {
			$error_content = validation_errors();
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger">
			  ' . $error_content . '.
			</div>');
			redirect(member_url('account'));
		}
	}

	public function update_id()
	{
		$this->form_validation->set_rules(array(
			array(
				'field' => 'id_type',
				'label' => lang_line('account_label_idtype'),
				'rules' => 'required|trim|max_length[50]'
			),
			array(
				'field' => 'id_number',
				'label' => lang_line('account_label_idno'),
				'rules' => 'required|trim|numeric|max_length[500]'
			),
			array(
				'field' => 'id_photo',
				'label' => lang_line('account_label_idupload'),
				'rules' => 'trim|callback_validate_fotoid'
			)
		));

		if ($this->form_validation->run()) {
			$data   = array(
				'id_type'  => xss_filter($this->input->post('id_type'), 'xss'),
				'id_number'  => xss_filter($this->input->post('id_number'), 'xss'),
				'id_photo'  => $_POST['foto']
			);

			$this->account_model->update_profile($data);

			$this->session->set_flashdata('pesan', '<div class="alert alert-success">
			  ' . lang_line('form_message_update_success') . '
			</div>');
			redirect(member_url('account'));
		} else {
			$error_content = validation_errors();
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger">
			  ' . $error_content . '.
			</div>');
			redirect(member_url('account'));
		}
	}

	public function update_bank()
	{
		$this->form_validation->set_rules(array(
			array(
				'field' => 'bank',
				'label' => lang_line('account_label_bank'),
				'rules' => 'required|trim|max_length[50]'
			),
			array(
				'field' => 'norekening',
				'label' => lang_line('account_label_rekening'),
				'rules' => 'required|trim|numeric|max_length[500]'
			),
			array(
				'field' => 'pemilik',
				'label' => lang_line('account_label_pemilik'),
				'rules' => 'required|trim|max_length[250]'
			),
			array(
				'field' => 'cabang',
				'label' => lang_line('account_label_cabang'),
				'rules' => 'trim|max_length[500]'
			)
		));

		if ($this->form_validation->run()) {
			$data = array(
				'user_id' => login_key('member'),
				'bank_name'    => xss_filter($this->input->post('bank', TRUE), 'xss'),
				'acc_number'     => xss_filter($this->input->post('norekening', TRUE), 'xss'),
				'owner_name'   =>  xss_filter($this->input->post('pemilik', TRUE), 'xss'),
				'branch' => xss_filter($this->input->post('cabang', TRUE), 'xss')
			);

			$databank = $this->account_model->get_bank();
			if (empty($databank)) {
				$this->account_model->create_bank($data);
			} else {
				$idbank = decrypt($this->input->post('idbank'));
				$this->account_model->update_bank($idbank, $data);
			}


			$this->session->set_flashdata('pesan', '<div class="alert alert-success">
			  ' . lang_line('form_message_update_success') . '
			</div>');
			redirect(member_url('account'));
		} else {
			$error_content = validation_errors();
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger">
			  ' . $error_content . '.
			</div>');
			redirect(member_url('account'));
		}
	}

	/**
	 * Fungsi submit upload photo.
	 * @access 	private
	 * @return 	void
	 */
	private function _upload()
	{
		if (!empty($_FILES['fupload']['tmp_name'])) // if isset image file.
		{
			$temp      = current($_FILES);
			$img_name  = data_login('member', 'photo');
			$extension = pathinfo($temp['name'], PATHINFO_EXTENSION);

			$this->load->library('upload', array(
				'upload_path'   => CONTENTPATH . 'uploads/user/',
				'allowed_types' => "jpg|jpeg|png",
				'file_name'     => $img_name,
				'max_size'      => 1024 * 10, // 10mb
				'overwrite'     => TRUE
			));

			if ($this->upload->do_upload('fupload')) {
				$post_picture = "user/$img_name";

				$this->load->library('simple_image');
				$this->simple_image
					->fromFile(CONTENTPATH . 'uploads/' . $post_picture)
					->thumbnail(200, 200, 'center')
					->toFile(CONTENTPATH . 'uploads/' . $post_picture);
			} else {
				$error_content = $this->upload->display_errors();
				$this->alert->set($this->mod, 'danger', $error_content);
			}
		} else {
			$this->alert->set($this->mod, 'danger', 'File not found');
		}

		redirect(uri_string());
	}

	/**
	 * Fungsi submit delete photo.
	 * @access 	public
	 * @return 	void
	 */
	public function delete_photo()
	{
		if ($this->input->is_ajax_request()) {
			$photo = data_login('member', 'photo');

			if (file_exists(CONTENTPATH . "uploads/user/$photo")) {
				@unlink(CONTENTPATH . "uploads/user/$photo");
				$response['status'] = true;
				$response['url'] = member_url($this->mod);
			} else {
				$response['status'] = false;
			}

			$this->json_output($response);
		} else {
			show_404();
		}
	}

	/**
	 * Fungsi untuk menampikan halaman uba password.
	 * @access 	public
	 * @return 	void
	 */
	public function password()
	{
		$this->meta_title = 'Member - ' . lang_line('change_password');
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$this->form_validation->set_rules(array(
				array(
					'field' => 'old-pass',
					'label' => lang_line('old_password'),
					'rules' => 'required|trim|min_length[4]|max_length[20]|callback__cek_pass'
				),
				array(
					'field' => 'new-pass1',
					'label' => lang_line('new_password1'),
					'rules' => 'required|trim|min_length[4]|max_length[20]'
				),
				array(
					'field' => 'new-pass2',
					'label' => lang_line('new_password2'),
					'rules' => 'required|trim|min_length[4]|max_length[20]|matches[new-pass1]',
					'errors' => array(
						// 'matches' => '%s '
						'matches' => lang_line('err_match')
					)
				)
			));

			if ($this->form_validation->run()) {
				$data = array(
					'password' => encrypt($this->input->post('new-pass2'))
				);

				$this->account_model->update_profile($data);
				$this->alert->set($this->mod, 'success', lang_line('pass_success'));
				redirect(uri_string());
			} else {
				$error_content = validation_errors();
				$this->alert->set($this->mod, 'danger', $error_content);
				redirect(uri_string());
			}
		} else {
			$this->render_view('account_password', $this->vars);
		}
	}

	/**
	 * Fungsi untuk valifasi password.
	 * @access 	public
	 * @return 	void
	 */
	public function _cek_pass($pass = '')
	{
		$in_pass = encrypt($pass);
		$current_pass = data_login('member', 'password');

		if (empty($pass)) {
			$this->form_validation->set_message('_cek_pass', '%s ' . lang_line('err_required'));
			return FALSE;
		} elseif (decrypt($in_pass) == decrypt($current_pass)) {
			return TRUE;
		} else {
			$this->form_validation->set_message('_cek_pass', '%s ' . lang_line('err_wrong'));
			return FALSE;
		}
	}

	/**
	 * Fungsi untuk delete account.
	 * @access 	public
	 * @return 	void
	 */
	public function delete()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$this->form_validation->set_rules(array(
				array(
					'field' => 'confirm',
					'label' => lang_line('your_password'),
					'rules' => 'required|trim|min_length[4]|max_length[20]|callback__cek_pass'
				)
			));

			if ($this->form_validation->run()) {
				@unlink(CONTENTPATH . 'uploads/user/' . data_login('member', 'photo'));
				$this->account_model->delete();
				redirect(member_url('logout'));
			} else {
				$error_content = validation_errors();
				$this->alert->set($this->mod, 'danger', $error_content);
				redirect(uri_string());
			}
		} else {
			$this->render_view('account_delete', $this->vars);
		}
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
			} else {
				$_POST['foto'] = $user['id_photo'];
			}
		} else {
			$_POST['foto'] = $user['id_photo'];
		}

		return $data;
	}
} // End class.