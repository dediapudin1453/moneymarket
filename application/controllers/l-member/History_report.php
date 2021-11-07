<?php defined('BASEPATH') OR exit('No direct script access allowed');

class History_report extends Member_controller {

	public $mod = 'history_report';
	public $mod_add  = 'add-new';
	public $mod_edit = 'edit';

	public function __construct()
	{
		parent::__construct();
		
		$this->meta_title(lang_line('referral_title'));
		$this->load->model('member/deposit_model');
		$this->load->model('member/withdrawal_model');
		$this->load->model('member/internal_transfer_model');
	}


	/**
	 * Fungsi untuk menampilkan halaman index referral.
	 * @access 	public
	 * @return 	void | string | json
	*/
	public function index() 
	{
		$this->vars['wd'] = $this->withdrawal_model->get_withdrawal();
		$this->vars['deposit'] = $this->deposit_model->get_deposit();
		$this->vars['internal'] = $this->internal_transfer_model->get_internaltf();
		$this->render_view('history_report', $this->vars);
	}
} // End class.