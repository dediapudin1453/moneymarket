<?php defined('BASEPATH') OR exit('No direct script access allowed');

class referral extends Member_controller {

	public $mod = 'referral';
	public $mod_add  = 'add-new';
	public $mod_edit = 'edit';

	public function __construct()
	{
		parent::__construct();
		
		$this->meta_title(lang_line('referral_title'));
		$this->load->model('member/referral_model');
		$this->load->library('email');
	}


	/**
	 * Fungsi untuk menampilkan halaman index referral.
	 * @access 	public
	 * @return 	void | string | json
	*/
	public function index() 
	{
		// if ( $this->input->is_ajax_request() )
		// {
		// 	$data_output = array();
		// 	foreach ( $this->referral_model->get_datatables() as $res )
		// 	{
		// 		$row = [];
		// 		$row[] = '<div class="text-center"><input type="checkbox" class="row_data" value="'. encrypt($res['id']) .'"></div>';
				
		// 		// Title
		// 		$row[] = $res['name'];
		// 		$row[] = $res['username'];

		// 		// category

		// 		$row[] = $res['email'];
		// 		$row[] = $res['tlpn'];
				
		// 		$data_output[] = $row;
		// 	}

		// 	$output = array(
		// 					 'data' => $data_output,
		// 					 'draw' => $this->input->post('draw'),
		// 					 'recordsTotal' => $this->referral_model->count_all(),
		// 					 'recordsFiltered' => $this->referral_model->count_filtered()
		// 					);

		// 	$this->json_output($output);
		// }
		
		// else
		// {
		$this->vars['link'] = $this->db->get_where('t_user', array('id' => login_key('member')))->row_array();
		$this->vars['referral'] = $this->db->get_where('t_user', array('referral_id' => login_key('member')))->result_array();
		$this->render_view('referral', $this->vars);
		// }
	}


	/**
	 * Fungsi untuk ON/OFF headline referral.
	 * @access 	public
	 * @return 	void | string | json
	*/
	public function headline()
	{
		if ( $this->input->is_ajax_request() )
		{
			$pk = decrypt($this->input->referral('pk'));
			
			$query_headline = $this->db
				->select('id,headline')
				->where('id', decrypt($this->input->referral('pk')))
				->get('t_referral');

			if ( $query_headline->num_rows() == 1 )
			{
				$referral = $query_headline->row_array();
				$headline = ( $referral['headline'] == 'Y' ? 'N' : 'Y');

				$data = array(
					'headline' => $headline
				);
				$this->referral_model->update_referral($pk, $data);

				$response['status'] = true;
				$response['index']  = 'h-'.$pk;
				$response['html']   = ( $headline == 'Y' ? '<i class="fa fa-star text-warning"></i> Headline' : '' );
				$response['alert']['type'] = 'alert';
				$response['alert']['content'] = ( $headline == 'Y' ? '<i class="fa fa-exclamation-circle mr-2"></i> Headline ON' : '<i class="fa fa-exclamation-circle mr-2"></i> Headline OFF' );
			}
			else
			{
				$response['status'] = false;
				$response['alert']['type'] = 'error';
				$response['alert']['content'] = 'Error';
			}

			$this->json_output($response);
		}
		else
		{
			show_404();
		}
	}


	/**
	 * Fungsi untuk ubah referral.
	 * @access 	public
	 * @return 	void
	*/
	public function edit($id_page = '') 
	{
		$id_page = xss_filter($id_page ,'sql');

		if ( !empty($id_page) && $this->referral_model->cek_id($id_page) == 1 )
		{			
			if ( $this->input->is_ajax_request() ) 
			{
				$pk = encrypt($id_page);
				$this->_submit_upate($pk);
			}
			else
			{
				// $this->vars['res_pages'] = $this->mod_model->get_member($id_page);
				$this->vars['row'] = $this->db->get_where('t_user', array('id'=>$id_page))->row_array();
				$this->vars['asuransi'] = $this->db->get_where('t_asuransi', array('user_id'=>$id_page))->row_array();
				$this->db->order_by('id', 'DESC');
				$this->vars['pm1'] = $this->db->get_where('t_penerima_manfaat', array('user_id'=>$id_page))->row_array();
				$this->db->order_by('id', 'ASC');
				$this->vars['pm2'] = $this->db->get_where('t_penerima_manfaat', array('user_id'=>$id_page))->row_array();
				$this->vars['rekam'] = $this->db->get_where('t_rekam_medis', array('user_id'=>$id_page))->row_array();
				$this->vars['calon'] = $this->db->get_where('t_tertanggung', array('user_id'=>$id_page))->row_array();
				$this->render_view('referral_lihat', $this->vars);
			}
		}
		else
		{
			$this->render_404();
		}
	}

	public function input($id_page = '') 
	{
		$id_page = xss_filter($id_page ,'sql');

		if ( !empty($id_page) && $this->referral_model->cek_id($id_page) == 1 )
		{	
			$this->vars['row'] = $this->db->get_where('t_user', array('id'=>$id_page))->row_array();
			$this->vars['asuransi'] = $this->db->get_where('t_asuransi', array('user_id'=>$id_page))->row_array();
			$this->render_view('referral_input', $this->vars);
		}
		else
		{
			$this->render_404();
		}
	}


	/**
	 * Fungsi aksi ubah referral.
	 * @access 	private
	 * @return 	void | string | json
	*/
	private function _submit_update()
	{
		if ( $this->input->is_ajax_request() )
		{
			$pk = $this->input->referral('pk');
			$id_referral = xss_filter(decrypt($pk), 'sql');

			$this->form_validation->set_rules(array(
				array(
					'field' => 'id',
					'label' => lang_line('referral_label_title'),
					'rules' => 'required|trim|min_length[6]|max_length[150]|callback__cek_edit_seotitle['. $id_referral .']'
				),
				array(
					'field' => 'category',
					'label' => lang_line('referral_label_category'),
					'rules' => 'required|trim'
				),
				array(
					'field' => 'content',
					'label' => lang_line('referral_label_content'),
					'rules' => 'required'
				)
			));

			if ( $this->form_validation->run() )
			{
				$tags_input = $this->input->referral('tags');
				$tags_input_s = explode(',', $tags_input);
				$tags = '';
				foreach ($tags_input_s as $tval) 
				{
					$tag_title = seotitle($tval,'');
					$tags .= $tag_title.',';	
				}
				$tags = rtrim($tags, ',');
				$data_referral='';
				$data_picture = []; // Set default picutre name.
				
				if ( !empty($_FILES['fupload']['tmp_name']) ) // if isset image file.
				{
					$temp = current($_FILES);
					$img_name = date('YmdHis').'_'.md5(date('YmdHis'));
					$extension = pathinfo($temp['name'], PATHINFO_EXTENSION);

					$this->load->library('upload', array(
						'upload_path'   => CONTENTPATH.'uploads/referral/',
						'allowed_types' => "jpg|jpeg|png",
						'file_name'     => $img_name,
						'max_size'      => 1024 * 10,
						'overwrite'     => TRUE
					));

					if ( $this->upload->do_upload('fupload') )
					{
						$referral_picture = "referral/$img_name.$extension";

						$this->load->library('simple_image');

						// Ori
						$this->simple_image
						     ->fromFile(CONTENTPATH.'uploads/'.$referral_picture)
						     ->thumbnail(900, 600, 'center')
						     ->toFile(CONTENTPATH.'uploads/'.$referral_picture);

						// Medium
						$this->simple_image
						     ->fromFile(CONTENTPATH.'uploads/'.$referral_picture)
						     ->thumbnail(640, 426, 'center')
						     ->toFile(CONTENTPATH.'uploads/medium/'.$referral_picture);

						// Thumb.
						$this->simple_image
						     ->fromFile(CONTENTPATH.'uploads/'.$referral_picture)
						     ->thumbnail(122, 91, 'center')
						     ->toFile(CONTENTPATH.'thumbs/'.$referral_picture);
					}
					else
					{
						$referral_picture = '';
					}
					
					$data_picture = ['picture' => $referral_picture];
				}
				
				// Set data referral.
				$title = xss_filter($this->input->referral('title'));
				$data_referral = array(
					'title'         => $title,
					'seotitle'      => seotitle($title),
					'content'       => xss_filter($this->input->referral('content', TRUE)),
					'id_category'   => xss_filter(decrypt($this->input->referral('category')), 'sql'),
					'image_caption' => xss_filter($this->input->referral('image_caption')),
					'tag'           => $tags,
					'comment'       => ($this->input->referral('comment') == '1' ? 'Y' : 'N'),
					'headline'      => ($this->input->referral('headline') == '1' ? 'Y' : 'N')
				);
				
				// Merge array $data_referral & $data_picture.
				$data = array_merge_recursive($data_referral,$data_picture);
				
				// Insert data referral to database.
				$this->referral_model->update_referral($id_referral, $data);

				$response['success'] = true;
				$response['alert']['type'] = 'success';
				$response['alert']['content'] = lang_line('form_message_update_success');
			}
			else
			{
				$response['success'] = false;
				$response['alert']['type'] = 'error';
				$response['alert']['content'] = validation_errors();
			}

			$this->json_output($response);
		}
		else
		{
			$this->render_404();
		}
	}

	public function submit_input($id_page = '')
	{
		$id_referral = xss_filter($id_page ,'sql');
		if ($this->db->get_where('t_user', array('id'=>$id_referral))->row_array()['status_member']!='Complete') {
			echo "<script>
			alert('User Belum Melengkapi data');
			window.location.href='".site_url()."l-member/referral';
			</script>";
		} else {
			$this->form_validation->set_rules(array(
				array(
					'field' => 'id',
					'label' => lang_line('referral_label_title'),
					'rules' => 'required|trim'
				)
			));

			if ( $this->form_validation->run() )
			{
				$data_referral='';
				$data_picture = []; // Set default picutre name.
				
				if ( !empty($_FILES['fupload']['tmp_name']) ) // if isset image file.
				{
					$temp = current($_FILES);
					$img_name = date('YmdHis').'_'.md5(date('YmdHis'));
					$extension = pathinfo($temp['name'], PATHINFO_EXTENSION);

					$this->load->library('upload', array(
						'upload_path'   => CONTENTPATH.'uploads/member_ss/',
						'allowed_types' => "jpg|jpeg|png",
						'file_name'     => $img_name,
						'max_size'      => 1024 * 10,
						'overwrite'     => TRUE
					));

					if ( $this->upload->do_upload('fupload') )
					{
						$referral_picture = "member_ss/$img_name.$extension";

						$this->load->library('simple_image');

						// Ori
						$this->simple_image
						     ->fromFile(CONTENTPATH.'uploads/'.$referral_picture)
						     ->thumbnail(900, 600, 'center')
						     ->toFile(CONTENTPATH.'uploads/'.$referral_picture);

						// Medium
						$this->simple_image
						     ->fromFile(CONTENTPATH.'uploads/'.$referral_picture)
						     ->thumbnail(640, 426, 'center')
						     ->toFile(CONTENTPATH.'uploads/medium/'.$referral_picture);

						// Thumb.
						$this->simple_image
						     ->fromFile(CONTENTPATH.'uploads/'.$referral_picture)
						     ->thumbnail(122, 91, 'center')
						     ->toFile(CONTENTPATH.'thumbs/'.$referral_picture);
					}
					else
					{
						echo "<script>
						alert('Gagal Mengupload Gambar');
						window.location.href='".site_url()."l-member/referral';
						</script>";
					}
					
					$data_picture = ['bukti_input' => $referral_picture];
				}
				$data_referral = array(
					'member_id'       => xss_filter($this->input->post('id', TRUE))
				);
				
				// Merge array $data_referral & $data_picture.
				$data = array_merge_recursive($data_referral,$data_picture);
				
				// Insert data referral to database.
				$this->referral_model->update_user($id_referral, $data);

				$this->sendemailAdmin($id_referral);

				echo "<script>
				alert('Input ID Berhasil');
				window.location.href='".site_url()."l-member/referral';
				</script>";
			}
			else
			{
				echo "<script>
				alert(".validation_errors().");
				window.location.href='".site_url()."l-member/referral';
				</script>";
			}	
		}			
	}

	public function sendemailAdmin($id) {
    	$u_id = login_key('member');
    	$member = $this->db->get_where('t_user', array('id'=>$u_id))->row_array();
    	$downline = $this->db->get_where('t_user', array('id'=>$id))->row_array();

    	$member_nama = $member['name'];
    	$member_email = $member['email'];
    	$member_phone = $member['tlpn'];

    	$downline_nama = $downline['name'];
    	$downline_email = $downline['email'];
    	$downline_phone = $downline['tlpn'];

    	$website_name   = $this->settings->website('web_name');
		$website_email  = $this->settings->website('username');
		$mailpas		= decrypt($this->settings->website('password'));
		$mailhost		= $this->settings->website('hostname');
		$mailproto		= $this->settings->website('protocol');
		$mailport 		= $this->settings->website('port');

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
        $this->email->to('info@bangunasset.online'); // Ganti dengan email tujuan kamu
        // Lampiran email, isi dengan url/path file
        // $this->email->attach('https://masrud.com/content/images/20181215150137-codeigniter-smtp-gmail.png');

        // Subject email
        $this->email->subject('Upline Mengisi ID');

        // Isi email
       // $this->email->message('Klik unttuk verifikasi email anda : <a href="' . base_url() . 'login/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Activate</a>');
        // $this->email->message('test');
        // $this->email->message('test');
        $this->email->message('<html><body>
							Yth. Bpk/Ibu <b> Admin </b>,<br /><br />
							Member atas nama '.$member_nama.' telah mendaftarkan Leadsnya yaitu :  <br />
							-------------------------------------------------------<br />
							Nama    : '.$downline_nama.' <br />
							No. HP 	: '.$downline_phone.'<br />
							Email 	: '.$downline_email.'<br />
							-------------------------------------------------------<br />
							ke aplikasi Mobiss dan Menginputkan ID nya ke Dashboard. Mohon segera anda periksa. <br /><br />
							Salam,<br />
							<a href="'. site_url() .'" target="_blank" title="'. $website_name .'">'. $website_name .'</a>
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
		if ( $this->input->is_ajax_request() )
		{
			$data_pk = $this->input->referral('data');

			foreach ($data_pk as $key)
			{
				$pk = xss_filter(decrypt($key),'sql');
				$this->referral_model->delete($pk);
			}

			$response['success'] = true;
			$response['alert']['type'] = 'success';
			$response['alert']['content'] = lang_line('form_message_delete_success');

			$this->json_output($response);
		}
		else
		{
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
		if ( $this->input->is_ajax_request() )
		{
			$input  = seotitle($this->input->referral('q'));
			$output = $this->referral_model->ajax_tags($input);
			$this->json_output($output);
		}
		else
		{
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
		if ( $cek === FALSE ) 
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
		if ( $cek === FALSE )
			echo "<script>
			alert('ID Sudah Tersedia');
			</script>";
	}
} // End class.