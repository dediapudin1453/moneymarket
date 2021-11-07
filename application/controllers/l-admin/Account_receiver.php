<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account_receiver extends Admin_controller {

	public $mod = 'account_receiver';
	public $pk;

	public function __construct() 
	{
		parent::__construct();
		
		$this->lang->load('mod/'.$this->mod, $this->_language);
		$this->meta_title(lang_line('mod_title'));
		$this->load->model('mod/account_receiver_model','mod_model');
	}


	public function index()
	{
		if ( $this->read_access )
		{
			if ( $this->input->is_ajax_request() ) 
			{

				$data_list = $this->mod_model->get_datatables();
				$data_output = array();
				foreach ($data_list as $val) 
				{
					$row = [];
					$row[] = '<div class="text-center"><input type="checkbox" class="row_data" value="'. encrypt($val['id']) .'"></div>';

					$row[] = $val['username'];

					$row[] = $val['account'];

					$row[] = date('d-m-Y', strtotime($val['date']));

					$row[] = '<div class="text-center"><div class="btn-group">
							<button type="button" class="button btn-xs btn-default delete_single" data-toggle="tooltip" data-placement="top" data-title="'. lang_line('button_delete') .'" data-pk="'. encrypt($val['id']) .'"><i class="icon-bin"></i></button>
							</div></div>';

					$data_output[] = $row;
				}

				$output = array(
					"draw" => $this->input->post('draw'),
					"recordsTotal" => $this->mod_model->count_all(),
					"recordsFiltered" => $this->mod_model->count_filtered(),
					"data" => $data_output,
				);

				$this->json_output($output);
			}
			else
			{
				$this->render_view('view_index', $this->vars);
			}
		}
		else
		{
			$this->render_403();
		}
	}


	public function add_new() 
	{
		if ( $this->write_access ) 
		{
			if ( $this->input->is_ajax_request() ) // submit add new post.
			{
				$this->form_validation->set_rules(array(
					array(
						'field' => 'account',
						'label' => lang_line('form_label_title'),
						'rules' => 'required|trim|callback__cek_account'
					)
				));

				if ( $this->form_validation->run() ) 
				{
					//cek account
					$acc = xss_filter($this->input->post('account'));
					$cekAcc = $this->mod_model->cek_account2($acc);
					if (empty($cekAcc)) {
						$response['success'] = false;
						$response['alert']['type'] = 'error';
						$response['alert']['content'] = 'Could not find account';
					} else {
						//cek apakah sudaah ada di accout receiver
						$cekreceiver = $this->mod_model->cek_account3($cekAcc['id']);

						if (empty($cekreceiver)) {
							//masukan ke database
							$data = array('account_id' => $cekAcc['id']);

							$this->mod_model->insert($data);

							$response['success'] = true;
							$response['alert']['type'] = 'success';
							$response['alert']['content'] = lang_line('form_message_add_success');
						} else {
							$response['success'] = false;
							$response['alert']['type'] = 'error';
							$response['alert']['content'] = 'account already registered on Account Receiver';
						}
							
					}
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
				
				$this->render_view('view_add_new', $this->vars);
			}
		}
		else 
		{
			$this->render_403();
		}
	}

	public function edit($id_page = '')
	{
		$id_page = xss_filter($id_page ,'sql');

		if ( $this->modify_access )
		{
			if ( !empty($id_page) && $this->mod_model->cek_id($id_page) == 1 )
			{			
				if ( $this->input->is_ajax_request() ) 
				{
					$pk = encrypt($id_page);
					$this->_submit_upate($pk);
				}
				else
				{
					$this->vars['res_pages'] = $this->mod_model->get_acc($id_page);
					$this->render_view('view_edit', $this->vars);
				}
			}
			else
			{
				$this->render_404();
			}
		}
		else
		{
			$this->render_403();
		}
	}

	public function _cek_account($acc = '') 
	{
		$cek = $this->mod_model->cek_account($acc);
		if ( $cek == FALSE ) 
		{
			$this->form_validation->set_message('_cek_account', 'Could not find account');
			return FALSE;
		} else {
			return TRUE;
		}

		// return $cek;
	}

	public function delete()
	{
		if ( $this->input->is_ajax_request() && $this->delete_access )
		{
			$data_pk = $this->input->post('data');
			foreach ($data_pk as $key)
			{
				$pk = xss_filter(decrypt($key),'sql');
				$this->mod_model->delete($pk);
			}
			$response['success'] = true;
			$response['alert']['type'] = 'success';
			$response['alert']['content'] = lang_line('form_message_delete_success');
			$this->json_output($response);
		}
		else
		{
			show_403();
		}
	}

} // End Class.