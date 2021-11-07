<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Internal_transfer_model extends CI_Model {

	public $vars;
	private $session_level;
	private $session_key;
	private $_table = 't_user';
	private $_column_order = array(null, 'username', 'email', 'name', 'status_member');
	private $_column_search = array('username', 'email', 'name', 'status_member');

	public function __construct()
	{
		parent::__construct();

		$this->session_level = login_level('member');
		$this->session_key = login_key('member');
	}

	public function insert_internaltf($data)
	{
		$this->db->insert('t_internal_transfer', $data);
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

	public function get_internaltf() {
		$this->db->select('*');
		$this->db->from('t_internal_transfer');
		$this->db->where('user_id', $this->session_key);
		$this->db->order_by('id', 'DESC');
		return $this->db->get()->result_array();
	}
} // End class.