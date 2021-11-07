<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Withdrawal_model extends CI_Model {

	public $vars;
	private $session_level;
	private $session_key;
	private $_table = 't_withdraw';
	private $_column_order = array(null, 'username', 'email', 'name', 'status_member');
	private $_column_search = array('username', 'email', 'name', 'status_member');

	public function __construct()
	{
		parent::__construct();

		$this->session_level = login_level('member');
		$this->session_key = login_key('member');
	}

	public function insert_withdrawal($data)
	{
		$this->db->insert($this->_table, $data);
		return $this->db->insert_id();
	}

	public function update_user($id_user, array $data)
	{
		return $this->db->where('id', $id_user)->update($this->_table, $data);
	}


	public function delete($id)
	{
		if ($this->cek_id($id) == 1) 
		{
			$this->db->where('id', $id)->delete($this->_table);
			$respon = TRUE;
		}
		else
		{
			$respon = FALSE;
		}

		return $respon;
	}

	public function get_withdrawal() {
		$this->db->select('bank_name, '.$this->_table.'.amount, rate_amount, amount_usd, '.$this->_table.'.date,'.$this->_table.'.status');
		$this->db->from($this->_table);
		$this->db->join('t_bank', 't_bank.id='.$this->_table.'.bank_id');
		$this->db->where($this->_table.'.user_id', $this->session_key);
		$this->db->order_by($this->_table.'.id', 'DESC');
		return $this->db->get()->result_array();
	}

	public function get_jml_withdrawal() {
		$this->db->select('SUM(amount_usd) as amount');
		$this->db->from($this->_table);
		$this->db->where('user_id', $this->session_key);
		$this->db->where('status', 'Approved');
		return $this->db->get()->row_array();
	}


} // End class.