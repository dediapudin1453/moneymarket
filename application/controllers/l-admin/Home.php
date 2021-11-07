<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Admin_controller {

	public $mod = 'home';

	public function __construct()
	{
		parent::__construct();
		
		if ( $this->read_access )
		{
			$this->lang->load('mod/'.$this->mod, $this->_language);
			$this->meta_title(lang_line('mod_title'));
		}
		else
		{
			$this->render_404();
		}
	}


	public function index()
	{
		$this->vars['h_deposit']       = $this->db->select('SUM(amount_usd) as amount')->get_where('t_deposit', array('status'=>'Approved'))->row_array();
		$this->vars['h_withdraw']       = $this->db->select('SUM(amount_usd) as amount')->get_where('t_withdraw', array('status'=>'Approved'))->row_array();
		$this->vars['h_internaltf']       = $this->db->select('SUM(amount) as amount')->get_where('t_internal_transfer', array('status'=>'Approved'))->row_array();
		$this->vars['h_users']      = $this->db->select('id')->get_where('t_user', array('level'=>'4'))->num_rows();

		$notif_mail = $this->db->where('active','N')->get('t_mail')->num_rows();
		$this->vars['notif_mail'] = array(
		                                  $notif_mail,
		                                  lang_line('mod_notif_2')."&nbsp;".
		                                  $notif_mail."&nbsp;".
		                                  lang_line('mod_notif_5')."&nbsp;".lang_line('mod_notif_3')
		                                  );

		$notif_comment = $this->db->where('active','N')->get('t_comment')->num_rows();
		$this->vars['notif_comment'] = array(
		                                  $notif_comment,
		                                  lang_line('mod_notif_2')."&nbsp;".
		                                  $notif_comment."&nbsp;".
		                                  lang_line('mod_notif_4')."&nbsp;".lang_line('mod_notif_3')
		                                  );

		$range = 6;
		for ($i = $range; $i >= 0; $i--) 
		{
			if ($i == 0) 
			{
				$visitorstemp = $this->db
					->where('date', date('Y-m-d'))
					->group_by('ip')
					->get('t_visitor')
					->result_array();

				$hitstemp = $this->db
					->select('SUM(hits) as hitstoday')
					->where('date', date('Y-m-d'))
					->group_by('date')
					->get('t_visitor')
					->row_array();
			} 
			else 
			{
				$visitorstemp = $this->db
					->where('date', date('Y-m-d', strtotime('-'.$i.' days')))
					->group_by('ip')
					->get('t_visitor')
					->result_array();

				$hitstemp = $this->db
					->select('SUM(hits) as hitstoday')
					->where('date', date('Y-m-d', strtotime('-'.$i.' days')))
					->group_by('date')
					->get('t_visitor')
					->row_array();
			}

			$arrvisitor[$i] = count($visitorstemp);
			$this->vars['arrhari'][$i] = '"'.date('D, d M', strtotime('-'.$i.' days')).'"';
			$arrhits[$i] = (empty($hitstemp['hitstoday']) ? '0' : $hitstemp['hitstoday']);
		}
		$this->vars['rvisitors'] = array_combine(array_keys($arrvisitor), array_reverse(array_values($arrvisitor)));
		$this->vars['rhits'] = array_combine(array_keys($arrhits), array_reverse(array_values($arrhits)));

		
		$this->render_view('view_index', $this->vars);
	}


	public function visitors()
	{
		$this->render_view('view_visitors', $this->vars);
	}


	public function _js_str($s)
	{
		return '"' . addcslashes($s, "\0..\37\"\\") . '"';
	}


	public function _js_array($array)
	{
		$temp = array_map(array($this, '_js_str'), $array);
		return '[' . implode(',', $temp) . ']';
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
} // End Class.