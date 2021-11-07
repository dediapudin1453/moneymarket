<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mt extends Admin_controller {

	public $mod = 'trade';
	public $pk;

	public function __construct() 
	{
		parent::__construct();
		
		$this->lang->load('mod/'.$this->mod, $this->_language);
		$this->meta_title(lang_line('mod_title'));
		$this->load->model('mod/' .$this->mod. '_model','mod_model');
	}

	public function upload() 
	{
		if ( $this->read_access )
		{
			if ( $this->input->is_ajax_request() ) // submit add new post.
			{
				$act = $this->input->post('act');
				if ( $act == 'upload' && $this->write_access) {
					$this->form_validation->set_rules(array(
						array(
							'field' => 'file',
							'label' => lang_line('form_label_upload_trade_title'),
							'rules' => 'callback_file_check'
						)
					));
	
					if ( $this->form_validation->run() ) 
					{
						$insertCount = $updateCount = $rowCount = $notAddCount = 0;
	
						// If file uploaded
						if(is_uploaded_file($_FILES['file']['tmp_name'])){
							// Load CSV reader library
							$this->load->library('CSVReader');
						
							// Parse data from CSV file
							$csvData = $this->csvreader->parse_csv($_FILES['file']['tmp_name']);
							
							$newcsvData = array();
							$no_account_Temp = array();
							$date = date('Y-m-d H:i:s');
							$rebate = array();
							foreach ($csvData as $key => $value) {
								$login = $value['login'];
								$closeTime = str_replace('.', '-', $value['close_time']) ;
								$openTime = str_replace('.', '-', $value['open_time']) ;
								$params = [
									'where' 		=> ['login' => $login],
									'order_by' 		=> 'close_time',
									'order_by_opt' 	=> 'DESC',
									'row'			=> 	true
								];
								$last_update = $this->mod_model->getRows($params);
								$params = [
									'where' 		=> ['login' => $login, 'open_price' => $value['open_price'], 'close_price' => $value['close_price'], 'close_time' => $value['close_time']],
									'returnType' 	=> 'count'
								];
								$is_db_trade_exist = $this->mod_model->getRows($params) > 0 ? false : true;
								$last_close_time = 0;
								$new_data = [];
								if ($last_update) 
									$last_close_time = strtotime($last_update['close_time']);
								if (!$last_update || $is_db_trade_exist 
								// || ($is_db_trade_exist&&$last_close_time!=0&&$last_close_time<strtotime($closeTime)) || 
								//  ( $is_db_trade_exist&&$last_close_time!=0&&$last_close_time>=strtotime($closeTime) && ($value['open_price']!= $last_update['open_price'] || $value['close_price']!= $last_update['close_price']))
								) {
									$new_data = [
										'login' 		=> $login,
										'type'	 		=> preg_replace('/[^a-zA-Z0-9]/', "", $value['type']),
										'symbol' 		=> preg_replace('/[^a-zA-Z0-9]/', "", $value['symbol']),
										'volume' 		=> $value['volume'],
										'open_price' 	=> $value['open_price'],
										'open_time' 	=> $openTime,
										'close_price' 	=> $value['close_price'],
										'close_time' 	=> $closeTime,
										'profit' 		=> $value['profit'],
										'pips' 			=> $value['pips'],
										'created'		=> $date
									];
									
									$ins = $this->mod_model->insert($new_data);
									if (!in_array($login, $no_account_Temp) && $ins)
										array_push($no_account_Temp, $login);
									if ($ins){ 
										$insertCount++;
										///$hasRebateAccount = array_search($login, array_column($rebate, 'account'));
										$hasRebateAccount = isset( $rebate[$login] ) ?  true  : false;
										if ($hasRebateAccount) {
											array_push($rebate[$login]['volume'], $new_data['volume']);
											array_push($rebate[$login]['symbol'], $new_data['symbol']);
											// $rebate[$login]['volume'] = $newVolume;
										}else{
											$rebate[$login] = array(
												'volume'	=> array($new_data['volume']),
												'symbol'	=> array($new_data['symbol']),
												'date'		=> $date
											);
										}
									}
								}
							}
						$message = null;
						
						$response['success'] = true;
						$response['alert']['type'] = 'success';
						$response['alert']['message'] = $message;
						$response['alert']['content'] = lang_line('form_message_upload_success') . ' ( ' .$insertCount. ' Inserted ).';
							
						}
						else{
							$response['success'] = false;
							$response['alert']['type'] = 'error';
							$response['alert']['content'] = lang_line('form_message_upload_error') ;
						}
					}
					else
					{
						$response['success'] = false;
						$response['alert']['type'] = 'error';
						$response['alert']['content'] = validation_errors();
					}
				}
				else
				{
					$data_output = [];
					$trades = $this->mod_model->get_datatables();

					foreach ($trades as $res) 
					{
						
						$row = [];
						$row[] = '<div class="text-center"><input type="checkbox" class="row_data" value="'. encrypt($res['user_id']) .'"></div>';
						$row[] = $res['login'];
						$row[] = $res['user_name'];
						$row[] = $res['volume'];
						$row[] = $res['open_price'];
						$row[] = $res['open_time'];
						$row[] = $res['close_price'];
						$row[] = $res['close_time'];
						$row[] = $res['profit'];
						$row[] = $res['pips'];
						$row[] = $res['created'];
						
						// status
						$row[] = '<div class="text-center"><div class="btn-group">
						<a href="'. admin_url($this->mod.'/under_referral/'.$res['user_name']) .'" class="button btn-xs btn-default" data-toggle="tooltip" data-placement="top" data-title="Under"><i class="fa fa-sitemap"></i></a>
						<a href="'. admin_url($this->mod.'/edit/'.$res['user_name']) .'" class="button btn-xs btn-default" data-toggle="tooltip" data-placement="top" data-title="'. lang_line('button_edit') .'"><i class="icon-pencil3"></i></a>
						<button type="button" class="button btn-xs btn-default delete_single" data-toggle="tooltip" data-placement="top" data-title="'. lang_line('button_delete') .'" data-pk="'. encrypt($res['user_id']) .'"><i class="icon-bin"></i></button>
						</div></div>';
						$data_output[] = $row;
					}

					$response = array(
									"draw" => $this->input->post('draw'),
									"recordsTotal" => $this->mod_model->count_all(),
									"recordsFiltered" => $this->mod_model->count_filtered(),
									"data" => $data_output,
									);
				}

				$this->json_output($response);
			}
			else
			{
				$this->render_view('view_upload_trade', $this->vars);
			}
		}
		else
		{
			$this->render_403();
		}
	}

	public function file_check($str){
        $allowed_mime_types = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
        if(isset($_FILES['file']['name']) && $_FILES['file']['name'] != ""){
            $mime = get_mime_by_extension($_FILES['file']['name']);
            $fileAr = explode('.', $_FILES['file']['name']);
            $ext = end($fileAr);
            if(($ext == 'csv') && in_array($mime, $allowed_mime_types)){
                return true;
            }else{
                $this->form_validation->set_message('file_check', lang_line('form_message_csv_only'));
                return false;
            }
        }else{
            $this->form_validation->set_message('file_check', lang_line('form_message_file_csv_empty'));
            return false;
        }
    }

} // End Class.