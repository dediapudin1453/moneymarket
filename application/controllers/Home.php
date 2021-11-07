<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Web_Controller {

	public $vars;
	public $mod = 'home';

	public function __construct()
	{
		parent::__construct();

		$this->load->library('paging');
		$this->load->library('email');
		$this->load->model('web/home_model');
		$this->load->model('web/contact_model');
		$this->load->model('member_login_model', 'login_model');
	}
	

	public function index()
	{
		if ( $_SERVER['REQUEST_METHOD'] == 'POST' )
		{
			return $this->_submit();
		}
		if ($this->input->get('ref')!=null) {
			$ref_link = $this->input->get('ref'); 
            if (empty($this->input->cookie('referral',true))) {
		       	// setcookie('referral', $ref_link,  time() + 60 * 60 * 24 * 30);

				$cek = $this->db->get_where('t_user', array('username'=>$ref_link))->row_array();

				if (!empty($cek)) {
					$cookie = array(
	                    'name'   => 'referral',
	                    'value'  => $cek['id'],
	                    'expire' => strtotime('+3 months'),
	                );
	                $this->input->set_cookie($cookie);
				}
			} else {
				$this->load->helper('cookie');
				$cek_cookie = $this->db->get_where('t_user', array('id'=>$this->input->cookie('referral',true)))->row_array();

				if (empty($cek_cookie)) {
					delete_cookie("referral");
				}
			}
		} else {
			if (!empty($this->input->cookie('referral',true))) {
				$this->load->helper('cookie');
				$cek_cookie = $this->db->get_where('t_user', array('id'=>$this->input->cookie('referral',true)))->row_array();

				if (empty($cek_cookie)) {
					delete_cookie('referral');
				} 
			}
		}

		$this->vars['price']= $this->getPriceDua();

		$this->vars['slider'] 		= $this->db->get_where('t_slider', array('active' => 'Y'))->result();
		$this->vars['step'] 		= $this->db->get_where('t_homepage', array('jenis' => 'step'))->row_array();
		$this->vars['typeaccount'] 	= $this->db->get_where('t_homepage', array('jenis' => 'typeaccount', 'active'=>'Y'))->row_array();
		$this->vars['news'] 		= $this->db->get_where('t_homepage', array('jenis' => 'news', 'active'=>'Y'))->row_array();
		$this->vars['news2'] 		= $this->db->get_where('t_homepage', array('jenis' => 'news2', 'active'=>'Y'))->row_array();
		$this->vars['market']		= $this->db->get_where('t_homepage', array('jenis' => 'market', 'active'=>'Y'))->row_array();
		$this->vars['sdmtrainer']	= $this->db->get_where('t_homepage', array('jenis' => 'sdmtrainer', 'active'=>'Y'))->row_array();

		$this->vars['bagian2'] 		= $this->db->get_where('t_homepage', array('jenis' => 'bagian2', 'active'=>'Y'))->row_array();
		$this->vars['bagian3'] 		= $this->db->get_where('t_homepage', array('jenis' => 'bagian3', 'active'=>'Y'))->row_array();
		$this->vars['bagian4'] 		= $this->db->get_where('t_homepage', array('jenis' => 'bagian4', 'active'=>'Y'))->row_array();
		$this->vars['bagian5']		= $this->db->get_where('t_homepage', array('jenis' => 'bagian5', 'active'=>'Y'))->row_array();

		$this->vars['titleproduk'] = $this->db->get_where('t_homepage', array('jenis' => 'produk', 'active'=>'Y'))->row_array();
		$this->vars['titletesti'] = $this->db->get_where('t_homepage', array('jenis' => 'testimoni', 'active'=>'Y'))->row_array();
		
		$this->vars['product'] = $this->db->get_where('t_product', array('active' => 'Y'))->result();
		$this->vars['headline'] = $this->home_model->get_headline();
		$this->vars['testimoni'] = $this->db->get_where('t_testimoni', array('active' => 'Y'))->result();


		//------------LANDINGPAGE--------------
		$this->vars['lp_bagian1'] = $this->db->get_where('t_landingpage', array('jenis' => 'bagian1'))->row_array();
		$this->vars['lp_bagian2'] = $this->db->get_where('t_landingpage', array('jenis' => 'bagian2'))->row_array();
		$this->vars['lp_bagian3'] = $this->db->get_where('t_landingpage', array('jenis' => 'bagian3'))->row_array();
		$this->vars['lp_bagian4'] = $this->db->get_where('t_landingpage', array('jenis' => 'bagian4'))->row_array();
		$this->vars['lp_bagian5'] = $this->db->get_where('t_landingpage', array('jenis' => 'bagian5'))->row_array();
		$this->vars['lp_bagian6'] = $this->db->get_where('t_landingpage', array('jenis' => 'bagian6'))->row_array();
		$this->vars['lp_bagian7'] = $this->db->get_where('t_landingpage', array('jenis' => 'bagian7'))->row_array();
		$this->vars['lp_bagian8'] = $this->db->get_where('t_landingpage', array('jenis' => 'bagian8'))->row_array();
		$this->vars['lp_bagian9'] = $this->db->get_where('t_landingpage', array('jenis' => 'bagian9'))->row_array();
		$this->vars['lp_bagian10'] = $this->db->get_where('t_landingpage', array('jenis' => 'bagian10'))->row_array();
		//------------LANDINGPAGE--------------

		$this->vars['step_regist'] = $this->db->get('t_step_register')->result_array();

		$this->vars['footer'] = $this->db->get('t_footer')->row_array();
		$this->render_view('home', $this->vars);
	}

	public function _submit()
	{
		if ( $this->captcha() == TRUE && googleCaptcha()->success == FALSE )
		{
			$this->alert->set('contact', 'danger', 'Please complete the captcha');
			redirect(uri_string());
		}
		else
		{
			$this->form_validation->set_rules(array(
				array(
					'field' => 'name',
					'label' => 'Name',
					'rules' => 'required|trim|min_length[4]|max_length[100]|alpha_numeric_spaces'
				),
				array(
					'field' => 'username',
					'label' => 'Username',
					'rules' => 'required|trim|min_length[6]|max_length[150]|callback__cek_username_register',
				),
				array(
					'field' => 'phone',
					'label' => 'Phone',
					'rules' => 'required|trim|min_length[8]|max_length[15]|numeric|callback__cek_phone_register',
				),
				array(
					'field' => 'email',
					'label' => 'Email',
					'rules' => 'required|trim|min_length[4]|max_length[80]|valid_email|callback__cek_reg_email'
				),
				array(
					'field' => 'password',
					'label' => 'Password',
					'rules' => 'required|trim|min_length[4]|max_length[20]'
				),
				array(
					'field' => 'password2',
					'label' => 'Re-type Password',
					'rules' => 'required|trim|min_length[4]|max_length[20]|matches[password]',
					'errors' => array(
						// 'matches' => '%s '
						'matches' => lang_line('err_match')
					)
				)
			));

			if ( $this->form_validation->run() ) 
			{
				$photo          = 'user-'.md5(strtotime(date('YmdHis'))).'.jpg';
				$email          = $this->input->post('email', TRUE);
				$username       = seotitle($this->input->post('username'));
				$full_name      = $this->input->post('name',TRUE);
				$tlpn      		= $this->input->post('phone',TRUE);
				$pass           = $this->input->post('password');
				$password       = encrypt($pass);
				$activation_key = md5('reg'.strtotime(date('YmdHis')).random_string('alnum', 4));
				$website_name   = $this->settings->website('web_name');
				$website_email  = $this->settings->website('web_email');

				if (!empty($this->input->cookie('referral',true))) {
					$referral_id  = $this->input->cookie('referral',true);

					$cek_cookie = $this->db->get_where('t_user', array('id'=>$referral_id))->row_array();

					if (empty($cek_cookie)) {
						$referral_id  = "4";
					} 
				} else {
					$referral_id  = "4";
				}

				// insert member to database.
				$usernya = $this->login_model->insert_member(array(
					'name'           => $full_name,
					'username'       => $username,
					'email'          => $email,
					'password'       => $password,
					'tlpn'       	 => $tlpn,
					'photo'          => $photo,
					'level'          => '4',
					'active'         => 'Y',
					'activation_key' => $activation_key,
					'referral_id'	 => $referral_id
				));

				$this->login_model->create_wallet(array(
					'user_id' => $usernya,
					'amount' => '0'));

				$type = 'member';
				$this->sendemailAdmin($type);

				$this->session->set_flashdata('reg_success','1');
				redirect(member_url());
			}
			else
			{
				$error_content = validation_errors();
				$this->alert->set('register','danger',$error_content);
				$this->session->set_flashdata('register', '<div uk-alert="" class="uk-alert-danger">
				    <a class="uk-alert-close" uk-close></a>
				    '.$error_content.'
				</div>
				');
				redirect(member_url('register'));
			}
		}
	}

	public function sendemailAdmin($type) {

    	$member_nama = $this->input->post('email', TRUE);
    	$member_uname = seotitle($this->input->post('username'));
    	$member_email = $this->input->post('email', TRUE);

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
        $this->email->to('emailuntuktesting123@gmail.com'); // Ganti dengan email tujuan kamu
        // Lampiran email, isi dengan url/path file
        // $this->email->attach('https://masrud.com/content/images/20181215150137-codeigniter-smtp-gmail.png');

        if ($type==='ib') {
        	// Subject email
	        $this->email->subject('IB Registered');

	        // Isi email
	       // $this->email->message('Klik unttuk verifikasi email anda : <a href="' . base_url() . 'login/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Activate</a>');
	        // $this->email->message('test');
	        // $this->email->message('test');
	        $this->email->message('<html><body>
								Yth. Bpk/Ibu <b> Admin </b>,<br /><br />
								IB baru telah terdaftar dengan data sebagai berikut :<br>
								Nama : '.$member_nama.'<br>
								Username : IB-'.$member_uname.'<br>
								Email : '.$member_email.' <br>
								<br>silakan cek dilink berikut : <a href="'.admin_url("member").'"> cek user</a>
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
								Nama : '.$member_nama.'<br>
								Username : '.$member_uname.'<br>
								Email : '.$member_email.' <br>
								<br>silakan cek dilink berikut : <a href="'.admin_url("member").'"> cek user</a>
								</html></body>');
        }

	        
        $this->email->send();
    }

    public function _cek_reg_email($email='')
	{
		if ( empty($email) )
		{
			$this->form_validation->set_message('_cek_reg_email', '%s is required');
			return FALSE;
		} 

		else
		{
			$input_email = encrypt(xss_filter($email,'xss'));
			$cekmail = $this->login_model->cek_reg_email($input_email);

			if ( $cekmail == FALSE )
			{
				$this->form_validation->set_message('_cek_reg_email', lang_line('err_mailexists'));
				return FALSE;
			} 
			else 
			{
				return TRUE;
			}
		}
	}

	public function _cek_username_register($username = '') 
	{
		if ( empty($username) )
		{
			$this->form_validation->set_message('_cek_username_register', '%s is required');
			return FALSE;
		} 

		else
		{
			$input_username = encrypt(xss_filter($username,'xss'));
			$cekmail = $this->login_model->cek_reg_username($input_username);

			if ( $cekmail == FALSE )
			{
				$this->form_validation->set_message('_cek_username_register', 'Username Exist');
				return FALSE;
			} 
			else 
			{
				return TRUE;
			}
		}
	}

	public function setlang()
	{
		if ( $this->input->is_ajax_request() ) 
		{
			$session_lang['lang_active'] = $this->input->post('data');
			$this->session->set_userdata($session_lang);
			$response['status'] = true;
			$this->json_output($response);
		}
		else
		{
			show_404();
		}
	}

	public function getPrice(){ 

		$running_price_lama = $this->db->get('t_running_price_satu')->result_array();

		foreach ($running_price_lama as $key => $value) {
			$datarp = array('price'=>$value['price'],
							'date'=>$value['date']);

			$this->db->where('mata_uang', $value['mata_uang']);
			$this->db->update('t_running_price_dua', $datarp);
		}

		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://fxmarketapi.com/apilive?api_key=PhW_iiNjb0dMZdbvlWog&currency=XAUUSD,GBPUSD,EURUSD,USDJPY,USDCAD,USDCHF,AUDUSD,GBPJPY",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			echo "cURL Error #:" . $err;
		} else {
			$price = json_decode($response, TRUE);

			$data = array('price' => $price['price']["XAUUSD"],
						  'date' => $price['timestamp']);
			$this->db->where('mata_uang', 'XAUUSD');
			$this->db->update('t_running_price_satu', $data);

			$data = array('price' => $price['price']["GBPUSD"],
						  'date' => $price['timestamp']);
			$this->db->where('mata_uang', 'GBPUSD');
			$this->db->update('t_running_price_satu', $data);

			$data = array('price' => $price['price']["EURUSD"],
						  'date' => $price['timestamp']);
			$this->db->where('mata_uang', 'EURUSD');
			$this->db->update('t_running_price_satu', $data);

			$data = array('price' => $price['price']["USDJPY"],
						  'date' => $price['timestamp']);
			$this->db->where('mata_uang', 'USDJPY');
			$this->db->update('t_running_price_satu', $data);

			$data = array('price' => $price['price']["USDCAD"],
						  'date' => $price['timestamp']);
			$this->db->where('mata_uang', 'USDCAD');
			$this->db->update('t_running_price_satu', $data);

			$data = array('price' => $price['price']["USDCHF"],
						  'date' => $price['timestamp']);
			$this->db->where('mata_uang', 'USDCHF');
			$this->db->update('t_running_price_satu', $data);

			$data = array('price' => $price['price']["AUDUSD"],
						  'date' => $price['timestamp']);
			$this->db->where('mata_uang', 'AUDUSD');
			$this->db->update('t_running_price_satu', $data);

			$data = array('price' => $price['price']["GBPJPY"],
						  'date' => $price['timestamp']);
			$this->db->where('mata_uang', 'GBPJPY');
			$this->db->update('t_running_price_satu', $data);
		}

		$tampil_runningprice = $this->db->get('t_running_price_satu')->result_array();

		foreach ($tampil_runningprice as $key => $value) {

			$tampil_runningprice_dua = $this->db->get_where('t_running_price_dua', array('mata_uang'=>$value['mata_uang']))->row_array();

			if ($tampil_runningprice_dua['price'] < $value["price"]) {
				$iclass = 'fas fa-angle-up in-icon-wrap small circle up';
				$spanclass = 'uk-text-success';
			} elseif ($tampil_runningprice_dua['price'] > $value["price"]) {
				$iclass = 'fas fa-angle-down in-icon-wrap small circle down';
				$spanclass = 'uk-text-danger';
			} else {
				$iclass = 'fas fa-equals in-icon-wrap small circle up';
				$spanclass = 'uk-text-success';
			}
			echo '<li>
                    <i class="'.$iclass.'"></i> '.$value["mata_uang"].' <span class="'.$spanclass.'">'.$value["price"].'</span>
                </li>';
		}
	}

	public function getPriceDua(){ 

		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://fxmarketapi.com/apilive?api_key=PhW_iiNjb0dMZdbvlWog&currency=XAUUSD,GBPUSD,EURUSD,USDJPY,USDCAD,USDCHF,AUDUSD,GBPJPY",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			echo "cURL Error #:" . $err;
		} else {
			$data = json_decode($response, TRUE);

			return $data;
		}
	}

	public function simple_registrasi() {
		if ( $this->input->is_ajax_request() ) 
		{
			$nama = $this->input->post('name', TRUE);
			$email = $this->input->post('email', TRUE);
			$tlpon = $this->input->post('phone', TRUE);
			$paket = $this->input->post('paket', TRUE);
			$tema = $this->input->post('tema', TRUE);
			$domain = $this->input->post('domain', TRUE);
			//1. form validasi
			$this->form_validation->set_rules(array(
				array(
					'field' => 'name',
					'label' => 'Name',
					'rules' => 'required|trim|min_length[4]|max_length[150]|regex_match[/^[a-zA-Z _]+$/]',
				),
				array(
					'field' => 'email',
					'label' => 'Email',
					'rules' => 'required|trim|valid_email'
				),
				array(
					'field' => 'phone',
					'label' => 'No. Whatsapp',
					'rules' => 'required|trim|max_length[15]|regex_match[/^[0-9]+$/]'
				),
				array(
				    'field' => 'paket',
					'label' => 'Paket',
					'rules' => 'required|trim'
				),
				array(
				    'field' => 'tema',
					'label' => 'Tema',
					'rules' => 'required|trim'
				),
				array(
				    'field' => 'domain',
					'label' => 'Domain',
					'rules' => 'required|trim'
				)
			));
			if ($this->form_validation->run()) {
				$email_cek =  $this->db->get_where('t_data_pesan', array('email'=>$email))->row_array();
				if ($email_cek==null) {
					//4. mengecek no. hp
					$hp_cek = $this->db->get_where('t_data_pesan', array('no_hp'=>$tlpon))->row_array();
					if ($hp_cek==null) {
						$email     		= $email;
						$name      		= $nama;
						$phone			= $tlpon;
						$paket 			= $paket;
						$tema 			= $tema;
						$domain 		= $domain;
						$status			= 'Pending';
						$website_name	= 'Kelola Website Praktis';
						$website_email	= 'support@kelola.work';

						$data_member = array(
							'nama'		=> $name,
							'email'		=> $email,
							'no_hp'		=> $phone,
							'paket'		=> $paket,
							'tema' 		=> $tema,
							'domain' 	=> $domain,
							'status' 	=> $status,
						);

						$this->db->insert('t_data_pesan', $data_member);

						// Konfigurasi email
				        $config = [
				               'mailtype'  => 'html',
				               'charset'   => 'utf-8',
				               'protocol'  => 'mail',
				               'smtp_host' => 'mail.kelola.work',
				               'smtp_user' => 'support@kelola.work',   
				               'smtp_pass' => 'DediApudin123',      
				               'smtp_port' => 465,
				               'crlf'      => "\r\n",
				               'newline'   => "\r\n"
				           ];

				        // Load library email dan konfigurasinya
				        $this->email->initialize($config);
				        $this->load->library('email', $config);

				        // Email dan nama pengirim
				        $this->email->from('support@kelola.work', 'Kelola Website Praktis');

				        // Email penerima
				        $this->email->to($email); // Ganti dengan email tujuan kamu

				        // Lampiran email, isi dengan url/path file
				        // $this->email->attach('https://masrud.com/content/images/20181215150137-codeigniter-smtp-gmail.png');

				        // Subject email
				        $this->email->subject('Pemesanan Website Praktis');

				        // Isi email
				       // $this->email->message('Klik unttuk verifikasi email anda : <a href="' . base_url() . 'login/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Activate</a>');
				        // $this->email->message('test');
				        $this->email->message('<html><body>
											Yth. Bpk/Ibu <b>'. $full_name .'</b>,<br /><br />
											Terima kasih telah memesan jasa pembuatan website praktis, .<br />
											Berikut merupakan rincian pesanan anda : <br />
											-------------------------------------------------------<br />
											Paket   : '. $paket .'<br />
											Tema 	: '. $tema .'<br />
											Domain 	: '. $domain .'<br />
											-------------------------------------------------------<br /><br />
											Atas nama : <br />
											-------------------------------------------------------<br />
											Nama 	: '. $nama .'<br />
											Email 	: '. $email .'<br />
											No. HP 	: '. $tlpon .'<br />
											-------------------------------------------------------<br /><br />
											Silahkan lakukan konfirmasi dengan menghubungi nomor 087885355577.<br /><br />
											Salam,<br />
											<a href="'. site_url() .'" target="_blank" title="'. $website_name .'">'. $website_name .'</a>
											</html></body>');
				        if ($this->email->send()) {
				        	$data = array(
			                    'success' => true,
			                    'message' => 'Pesanan Telah kami catat, silahkan cek email anda untuk konfirmasi!');
			                echo json_encode($data);
				        } else {
							$data = array(
			                    'success' => false,
			                    'message' => $this->email->print_debugger());
			                echo json_encode($data);				        
			            }

						
					} else {
						$data = array(
		                    'success' => false,
		                    'message' => 'No. HP sudah terdaftar, silahkan pakai No. HP lain!');
		                echo json_encode($data);
					}
				} else {
					$data = array(
	                    'success' => false,
	                    'message' => 'Email sudah terdaftar, silahkan pakai email lain!');
	                echo json_encode($data);
				}
			} else {
				$data = array(
	                'success' => false,
	                'message' => validation_errors());
	            echo json_encode($data);
			}
		}
		else
		{
			show_404();
		}
	}

	public function cek_email() {
        $cek =  $this->db->get_where('t_data_pesan', array('email'=>$this->input->post('email', TRUE)))->row_array();
        if ($this->input->post('email', TRUE)!=null) {
            if ($cek==null) {
                $data = array('success' => true,
                              'message' => 'email dapat digunakan!');
                echo json_encode($data);
                return true;
            } else {
                $data = array('success' => false,
                              'message' => 'email sudah digunakan!');
                echo json_encode($data);
                return false;
            }
        } else {
            $data = array('success' => false,
                          'message' => 'harap isikan email anda!');
            echo json_encode($data);
            return false;
        }
    }

    public function cek_hp() {
        $cek =  $this->db->get_where('t_data_pesan', array('no_hp'=>$this->input->post('phone', TRUE)))->row_array();
        if ($this->input->post('phone', TRUE)!=null) {
            if ($cek==null) {
                $data = array('success' => true,
                              'message' => 'no. hp dapat digunakan!');
                echo json_encode($data);
                return true;
            } else {
                $data = array('success' => false,
                              'message' => 'no. hp sudah digunakan!');
                echo json_encode($data);
                return false;
            }
        } else {
            $data = array('success' => false,
                          'message' => 'harap isikan no. hp anda!');
            echo json_encode($data);
            return false;
        }
    }

    public function _cek_phone_register($phone = '') 
	{
		if ( empty($phone) )
		{
			$this->form_validation->set_message('_cek_phone_register', '%s is required');
			return FALSE;
		} 

		else
		{
			$input_phone = encrypt(xss_filter($phone,'xss'));
			$cekmail = $this->login_model->cek_reg_phone($input_phone);

			if ( $cekmail == FALSE )
			{
				$this->form_validation->set_message('_cek_phone_register', 'Phone Number Exist');
				return FALSE;
			} 
			else 
			{
				return TRUE;
			}
		}
	}
} // End Class