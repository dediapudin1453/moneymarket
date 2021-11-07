<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Broker extends Admin_controller {

	public $mod = 'broker';
	public $pk;

	public function __construct() 
	{
		parent::__construct();
		
		$this->lang->load('mod/'.$this->mod, $this->_language);
		$this->meta_title(lang_line('mod_title'));
		$this->load->model('mod/broker_model','mod_model');
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

					$row[] = 'Broker';

					$row[] = number_format($val['amount']);

					$row[] = date('d-m-Y', strtotime($val['date']));

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


	private function _submit_upate($param = NULL)
	{
		if ( $this->input->is_ajax_request() && !empty($param) ) 
		{
			$pk = xss_filter(decrypt($param),'sql');

			if ( $this->modify_access && $this->mod_model->cek_id($pk) == 1 ) 
			{
				$accreq = $this->mod_model->get_acc($pk);

				if ($accreq['status_request']=='Pending') {
					$rules = array(
						array(
							'field' => 'status',
							'label' => lang_line('form_label_title'),
							'rules' => 'required|trim'
						)
					);
				} elseif ($accreq['status_request']=='Approved') {
					$rules = array(
						array(
							'field' => 'account',
							'label' => lang_line('form_label_acc'),
							'rules' => 'required|trim'
						),
						array(
							'field' => 'password',
							'label' => 'Password',
							'rules' => 'required|trim'
						),
						array(
							'field' => 'password_investor',
							'label' => 'Password Investor',
							'rules' => 'required|trim'
						),
						array(
							'field' => 'amount',
							'label' => lang_line('form_label_amount'),
							'rules' => 'required|trim'
						)
					);
				}
					

				$this->form_validation->set_rules($rules);

				if ( $this->form_validation->run() ) 
				{
					$status = xss_filter($this->input->post('status', true), 'xss');
					//periksa status sebelumnya
					//jika status sebelumnya adalah PENDING
					if ($accreq['status_request']=='Pending') {
						//jika status yang dipilih admin PENDING
						if ($status=='Pending') {
							$response['success'] = true;
							$response['alert']['type'] = 'success';
							$response['alert']['content'] = 'Not making change';
						} 
						//jika status yang dipilih admin bukan PENDING
						else {
							//mengupdate status req
							$data = array(
								'status_request'    => $status
							);
							$this->mod_model->update($pk, $data);

							$response['success'] = true;
							$response['alert']['type'] = 'success';
							$response['alert']['content'] = lang_line('form_message_update_success');
						}
					} 
					//jika status sebelumnya adalah Approved
					elseif ($accreq['status_request']=='Approved') {
						//mengupdate status req
						$data = array(
							'account' => xss_filter($this->input->post('account', true), 'xss'),
							'password' => xss_filter($this->input->post('password', true), 'xss'),
							'password_investor' => xss_filter($this->input->post('password_investor', true), 'xss'),
							'amount' => xss_filter($this->input->post('amount', true), 'xss')
						);
						$this->mod_model->update($pk, $data);

						$response['success'] = true;
						$response['alert']['type'] = 'success';
						$response['alert']['content'] = lang_line('form_message_update_success');
					} 
					//jika status sebelumnya adalah Rejected
					else {
						$response['success'] = false;
						$response['alert']['type'] = 'error';
						$response['alert']['content'] = 'cant make changes anymore';
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
				$this->render_403();
			}
		}
		else
		{
			show_404();
		}
	}


	public function _cek_add_seotitle($seotitle = '') 
	{
		$seotitle = seotitle($seotitle);
		$cek = $this->mod_model->cek_seotitle($seotitle);
		
		if ( $cek >= 1 )
		{
			$this->form_validation->set_message('_cek_add_seotitle', lang_line('form_message_already_exists'));
			return FALSE;
		}
		else
			return TRUE;
	}


	
	public function _cek_edit_seotitle($seotitle = '') 
	{
		$seotitle = seotitle($seotitle);
		$idEdit = $this->uri->segment(4);
		$cek = $this->mod_model->cek_seotitle2($idEdit, $seotitle);
		
		if ( $cek == FALSE ) 
		{
			$this->form_validation->set_message('_cek_edit_seotitle', lang_line('form_message_already_exists'));
			return FALSE;
		} 
		else
			return TRUE;
	}
} // End Class.