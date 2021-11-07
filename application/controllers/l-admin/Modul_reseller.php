<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modul_reseller extends Admin_controller {

	public $mod = 'modul_reseller';
	public $pk;

	public function __construct() 
	{
		parent::__construct();
		
		$this->lang->load('mod/'.$this->mod, $this->_language);
		$this->meta_title(lang_line('mod_title'));
		$this->load->model('mod/modul_reseller_model','mod_model');
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
					if (!empty($val['picture'])) {
						$gambar = '<img src="'.site_url().'content/uploads/'.$val['picture'].'" style="width:100%;max-width:35px;">';
					} else {
						$gambar = '-';
					}
					$row = [];
					$row[] = '<div class="text-center"><input type="checkbox" class="row_data" value="'. encrypt($val['id']) .'"></div>';
					$row[] = $val['title'];
					$row[] = $val['type'];
					$row[] = $gambar;
					$row[] = ($val['active'] == 'Y' ? '<span class="badge badge-b badge-pill badge-primary">Active</span>' : '<span class="badge badge-b badge-pill badge-secondary">No</span>');

					$row[] = '<div class="text-center"><div class="btn-group">
							<a href="'. admin_url($this->mod.'/edit/'.$val['id']) .'" class="button btn-xs btn-default" data-toggle="tooltip" data-placement="top" data-title="'. lang_line('button_edit') .'"><i class="icon-pencil3"></i></a>
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


	public function delete()
	{
		if ( $this->input->is_ajax_request() )
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
			show_404();
		}
	}



	public function add_new()
	{
		if ( $this->write_access )
		{
			if ( $this->input->is_ajax_request() ) 
			{
				$this->form_validation->set_rules(array(
					array(
						'field' => 'title',
						'label' => lang_line('form_label_title'),
						'rules' => 'required|trim|min_length[3]|max_length[100]|callback__cek_add_seotitle'
					)
				));
				
				if ( $this->form_validation->run() ) 
				{
					$active = ($this->input->post('active') == '1' ? 'Y' : 'N');
					$data_form = array(
						'title'    => xss_filter($this->input->post('title')),
						'seotitle' => seotitle($this->input->post('title')),
						'content'  => xss_filter($this->input->post('content')),
						'picture'  => xss_filter($this->input->post('picture')),
						'type'  => xss_filter($this->input->post('type')),
						'active'   => $active
					);

					$this->mod_model->insert($data_form);
					$this->alert->set($this->mod, 'success', lang_line('form_message_add_success'));
					$response['success'] = true;
				}
				else 
				{
					$response['success'] = false;
					$response['alert']['type'] = 'error';
					$response['alert']['content'] = validation_errors();
				}
				$this->json_output($response);
			}

			$this->render_view('view_add_new', $this->vars);
		}

		else
		{
			$this->render_403();
		} 
	}

	public function add_new_save()
	{
			$this->form_validation->set_rules(array(
				array(
					'field' => 'title',
					'label' => lang_line('form_label_title'),
					'rules' => 'required|trim|min_length[3]|max_length[100]|callback__cek_add_seotitle'
				)
			));
			
			if ( $this->form_validation->run() ) 
			{
				$active = ($this->input->post('active') == '1' ? 'Y' : 'N');
				$data_form = array(
					'title'    => xss_filter($this->input->post('title')),
					'seotitle' => seotitle($this->input->post('title')),
					'content'  => xss_filter($this->input->post('content')),
					'picture'  => xss_filter($this->input->post('picture')),
					'type'  => xss_filter($this->input->post('type')),
					'active'   => $active
				);

				$this->mod_model->insert($data_form);
				// $this->alert->set($this->mod, 'success', lang_line('form_message_add_success'));
				$this->session->set_flashdata($this->mod, '<div class="alert alert-success"><strong>Success!</strong>'.lang_line('form_message_add_success').'</div>');
				$response['success'] = true;
			}
			else 
			{
				// $response['success'] = false;
				// $response['alert']['type'] = 'error';
				// $response['alert']['content'] = validation_errors();

				$this->session->set_flashdata($this->mod, '<div class="alert alert-danger"><strong>Danger!</strong>'.validation_errors().'</div>');
			}
			redirect(admin_url('modul_reseller'));
	}



	public function edit($id_page = '')
	{
		// die($id_page);
		// $id_page = xss_filter($id_page ,'sql');

		if ( $this->modify_access )
		{
			// die();
			if ( !empty($id_page) && $this->mod_model->cek_id($id_page) == 1 )
			{		
				// die($id_page);
				$this->vars['res_pages'] = $this->mod_model->get_product($id_page);
				$this->render_view('view_edit', $this->vars);
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


	public function submit_update()
	{
		$pk = xss_filter(decrypt($this->input->post('param')),'sql');

		if ( $this->modify_access && $this->mod_model->cek_id($pk) == 1 ) 
		{
			$rules = array(
				array(
					'field' => 'title',
					'label' => lang_line('form_label_title'),
					'rules' => 'required|trim|min_length[3]|max_length[100]'
				)
			);

			$this->form_validation->set_rules($rules);

			if ( $this->form_validation->run() ) 
			{
				$active = ($this->input->post('active') == '1' ? 'Y' : 'N');
				$data = array(
					'title'    => xss_filter($this->input->post('title')),
					'seotitle' => seotitle($this->input->post('title')),
					'content'  => xss_filter($this->input->post('content')),
					'picture'  => xss_filter($this->input->post('picture')),
					'type'  => xss_filter($this->input->post('type')),
					'active'   => $active
				);

				if ( $this->mod_model->update($pk, $data) ) 
				{
					$this->session->set_flashdata($this->mod, '<div class="alert alert-success"><strong>Success!</strong>'.lang_line('form_message_update_success').'</div>');
				}
				else
				{
					$this->session->set_flashdata($this->mod, '<div class="alert alert-danger"><strong>Danger!</strong>Error</div>');
				}
			}
			else 
			{
				$this->session->set_flashdata($this->mod, '<div class="alert alert-danger"><strong>Danger!</strong>'.validation_errors().'</div>');
			}

			redirect(admin_url('modul_reseller'));
		}
		else
		{
			$this->render_403();
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