<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('email');
		$this->load->helper('cookie');
		// $this->load->model('Member_model');
		$this->load->library('encryption');
	}

	public function test()
	{
		echo $this->settings->website('email_alert');
	}

	public function kirimemail() {
		$this->sendEmail();
	}

	public function sendEmail()
	{
		$website_name   = $this->settings->website('web_name');
		$website_email  = $this->settings->website('username');
		//$mailpas		= decrypt($this->settings->website('password'));
		$mailpas		= $this->settings->website('password');
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
		$this->email->to($alert_address);
        // Subject email
        $this->email->subject('Informasi Pendaftaran');

    	$this->email->message('<html><body>
		Dear admin,<br /><br />
		
		<a href="'. site_url() .'" target="_blank" title="'. $website_name .'">'. $website_name .'</a>
		</html></body>');
		// // $email->send(false);
	 //    $this->email->send(false);
	 //    echo $this->email->printDebugger(['headers']);    
        if ($this->email->send()) {
        	echo "berhasil";
        }else {
        	echo $this->email->print_debugger(array('headers'));
        	echo "gagal kirim email";
        }
	}

	public function getEmailBody($nama_lengkap, $email)
    {
        $data['user'] = array('nama'=>$nama_lengkap, 'email'=>$email, 'token'=>'123','type'=>'verifikasi');
        // echo "<pre>";
        // var_dump($data);
        // die();
        $msg = $this->load->view('template_email/email_aktivasi', $data, true);
        return $msg;
    }

    public function getPrice(){ 

		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://fxmarketapi.com/apilive?api_key=PhW_iiNjb0dMZdbvlWog&currency=EURUSD,GBPUSD,USDJPY,AUDUSD",
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

			echo "<pre>";
			var_dump($data);
		}
	}

    public function getCity(){ //fungsi untuk mengambil data kota dari rajaongkir
		//cek apakah request berupa ajax atau bukan
		// if ($this->input->is_ajax_request()){
			//tampung data lalu decrypt dan explode data yang dikirim
			$prov = explode(",", $this->encryption->decrypt($this->input->post('provinsi', TRUE)));

			$curl = curl_init();

			curl_setopt_array($curl, array(
				CURLOPT_URL => "http://api.rajaongkir.com/starter/city",
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => "",
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 30,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => "GET",
				CURLOPT_HTTPHEADER => array(
					"key: c74b62e46b6621d2034341db811901eb"
				),
			));

			$response = curl_exec($curl);
			$err = curl_error($curl);

			curl_close($curl);

			if ($err) {
				echo "cURL Error #:" . $err;
			} else {
				$data = json_decode($response, TRUE);

				echo '<option value="" selected disabled>Kota / Kabupaten</option>';

				for ($i=0; $i < count($data['rajaongkir']['results']); $i++) {
					echo '<option value="'.$this->encryption->encrypt($data['rajaongkir']['results'][$i]['city_id'].','.$data['rajaongkir']['results'][$i]['city_name']).'">'.$data['rajaongkir']['results'][$i]['city_name'].'</option>';

					
				}

				foreach ($data['rajaongkir']['results'] as $key => $value) {
	  				$kota = array('kota' => $value['city_name'],
	     						  'kota_id' =>$value['city_id'],
	     						  'provinsi_id' =>$value['province_id']);

	  				// echo "<pre>";
	  				// echo $kota['kota_id']."-".$kota['provinsi_id']."-".$kota['kota'];

	  				// $this->db->get_where('provinsi',)

	  				$this->db->insert('kota', $kota);
	  			}
			}

		// }else{
		// 	redirect('base_url("checkout")');
		// }
	}

	public function getProv(){ //fungsi untuk mengambil data kota dari rajaongkir
		$curl = curl_init();

		curl_setopt_array($curl, array(
  			CURLOPT_URL => "http://api.rajaongkir.com/starter/province",
  			CURLOPT_RETURNTRANSFER => true,
  			CURLOPT_ENCODING => "",
  			CURLOPT_MAXREDIRS => 10,
  			CURLOPT_TIMEOUT => 30,
  			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  			CURLOPT_CUSTOMREQUEST => "GET",
  			CURLOPT_HTTPHEADER => array(
	    		"key: c74b62e46b6621d2034341db811901eb"
  			),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
  			echo "cURL Error #:" . $err;
		} else {
  			$data = json_decode($response, TRUE);

  			echo "<pre>";
  			var_dump($data);
  			die();

  			for ($i=0; $i < count($data['rajaongkir']['results']); $i++) {
     			echo '<option value="'.$this->encryption->encrypt($data['rajaongkir']['results'][$i]['province_id'].','.$data['rajaongkir']['results'][$i]['province']).'" kode="'.$data['rajaongkir']['results'][$i]['province_id'].'" provinsi="'.$data['rajaongkir']['results'][$i]['province'].'">'.$data['rajaongkir']['results'][$i]['province'].'</option>';
  			}

  			// $prov = array('provinsi' => $data['rajaongkir']['results'][$i]['province'],
     // 						  'provinsi_id' =>$data['rajaongkir']['results'][$i]['province_id']);

  			// var_dump($prov);

  			foreach ($data['rajaongkir']['results'] as $key => $value) {
  				$prov = array('provinsi' => $value['province'],
     						  'provinsi_id' =>$value['province_id']);

  				// echo "<pre>";
  				// echo $value['province_id']."-".$prov['provinsi'];

  				$this->db->insert('provinsi', $prov);
  			}
		}
	}

	public function huh() {
		$array = json_decode(file_get_contents("https://raw.githubusercontent.com/guangrei/Json-Indonesia-holidays/master/calendar.json"),true);
			//check tanggal merah berdasarkan libur nasional
		// foreach ($array as $key => $value) {
		// 	echo $value["20180101"];
		// }
		// echo "<pre>";
		// var_dump($array);

		//mendapatkan tgl kemarin
		$tglskr = mktime(0, 0, 0, date("01"), date("01") - 1, date("2021"));
		$tglkemarin = date("Ymd", $tglskr);
		//mendapatkan tgl 30 hari kemarin
		$tgl_30_hari_lalu = mktime(0, 0, 0, date("m"), date("d") - 618, date("Y"));
		$tgllalu = date("Ymd", $tgl_30_hari_lalu);
		$tgl_skr = new DateTime($tglkemarin, new DateTimeZone("Europe/London"));
		$tgl_lalu = new DateTime($tgllalu, new DateTimeZone("Europe/London"));
		//looping
		do {
		    // echo $tgl_skr->format("Ymd");
		    // echo '<br>';
		    $tanggal = $tgl_skr->format("Ymd");
		    
		    $tgl_skr->modify("-1 day");

		    $tahun = array($tanggal);

		    if (!empty($array[$tanggal])) {
		    	echo "<br>";
		    	echo "tanggal : ".date("Y-m-d",strtotime($tanggal));
		    	echo "<p>";
				echo "deskripsi : ".$array[$tanggal]['deskripsi'];
				echo "<hr>";

				$data = array('tanggal' => date("Y-m-d",strtotime($tanggal)),
							  'deskripsi' => $array[$tanggal]['deskripsi'],
							  'status' => $array[$tanggal]['status'] );

				$this->db->insert('hari_libur', $data);
			}

		    // if ($tanggal==$array[$tanggal]) {
		    	// echo "<pre>";
		    	// var_dump($array[$tanggal]);
		    // }
		    // echo "string : ".$tanggal;

		    
		} while ($tgl_skr >= $tgl_lalu);

		// for ($i=0; $i < count($array); $i++) { 
		// 	if (!empty($array[$tanggal])) {
		// 		echo $array[$tanggal]['deskripsi'];
		// 	}
		// }

		

		// foreach ($array as $key => $value) {
		//     	echo "<pre>";
		//     	echo $value['20201231'];
		//     	// var_dump($value);
		//   //   	if (in_array($value, $tahun)) {
		// 		// 	echo "a";
		// 		// }else{
		// 		// 	echo '<br>';
		// 		// 	echo "string";
		// 		// }
		//     }

		// $hari_ini = date("Y-m-d");
		// $tgl_pertama = date('Y-m-01', strtotime($hari_ini));
		// $tgl_terakhir = date('Y-m-t', strtotime($hari_ini));

		// echo "Tanggal Hari ini".$hari_ini;
		// echo "<br/>";
		// echo "Tanggal Pertama di Bulan :".$tgl_pertama;
		// echo "<br/>";
		// echo "Tanggal Akhir di Bulan ini ".$tgl_terakhir;
		 // die();
		//  $value = "20180101";
		//  if(isset($array[$value])) :		
		//  	echo"tanggal merah ".$array[$value]["deskripsi"];
		// 	//check tanggal merah berdasarkan hari minggu
		// elseif(date("D",strtotime($value))==="Sun") :		
		// 	echo"tanggal merah hari minggu";
		// 	//bukan tanggal merah
		// else
		// 	:echo"bukan tanggal merah";
		// endif;

		// $hari_ini = date("Ymd");
		// echo"<b>Check untuk hari ini (".date("d-m-Y",strtotime($hari_ini)).")</b><br>";
		// tanggalMerah($hari_ini);

		 // for ($i=0; $i < count($array); $i++) { 
		 // 	// echo $array["20180101"];

		 // 	echo $array[$value]["deskripsi"];
		 // }
	}
}

/* End of file login.php */
/* Location: ./application/controllers/login.php */