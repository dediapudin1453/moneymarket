<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Deposit_model extends CI_Model {

	public $vars;
	private $session_level;
	private $session_key;
	private $_table = 't_deposit';
	private $_column_order = array(null, 'user_id', 'bank_name', 'amount', 'rate_amount', 'amount_usd', 'photo', 'date');
	private $_column_search = array('bank_name', 'amount', 'rate_amount', 'amount_usd', 'date');

	public function __construct()
	{
		parent::__construct();

		$this->session_level = login_level('member');
		$this->session_key = login_key('member');
	}

	public function insert_deposit($data)
	{
		$this->db->insert($this->_table, $data);
	}


	public function update_deposit($id_user, array $data)
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

	public function get_deposit() {
		$this->db->select('bank_name, '.$this->_table.'.amount, rate_amount, amount_usd, '.$this->_table.'.date,'.$this->_table.'.status');
		$this->db->from($this->_table);
		$this->db->join('t_bank', 't_bank.id='.$this->_table.'.bank_id');
		$this->db->where($this->_table.'.user_id', $this->session_key);
		$this->db->order_by($this->_table.'.id', 'DESC');
		return $this->db->get()->result_array();
	}

	public function get_jml_deposit() {
		$this->db->select('SUM(amount_usd) as amount');
		$this->db->from($this->_table);
		$this->db->where('user_id', $this->session_key);
		$this->db->where('status', 'Approved');
		return $this->db->get()->row_array();
	}
} // End class.