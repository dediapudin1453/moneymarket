<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Add_account_receiver_model extends CI_Model {

	private $_table = 't_account_trading';
	private $_column_order = array(null, 'username, account, date');
	private $_column_search = array('account');

	public function __construct()
	{
		parent::__construct();
	}


	private function _datatable_query()
	{
		$this->db->select('t_account_trading.id as id, username, account');
		$this->db->from($this->_table);
		$this->db->join('t_account_receiver', 't_account_receiver.account_id='.$this->_table.'.id');
		$this->db->join('t_user', 't_user.id=t_account_trading.user_id');
		$this->db->where('t_account_trading.id !=', 't_account_receiver.account_id');

		$i = 0;	
		foreach ($this->_column_search as $item) 
		{
			if ( $this->input->post('search')['value'] )
			{
				if ( $i == 0 )
				{
					$this->db->group_start();
					$this->db->like($item, $this->input->post('search')['value']);
				}
				else
				{
					$this->db->or_like($item, $this->input->post('search')['value']);
				}

				if ( count($this->_column_search) - 1 == $i ) 
				{
					$this->db->group_end(); 
				}
			}
			$i++;
		}
		
		if ( !empty($this->input->post('order')) ) 
		{
			$this->db->order_by(
				$this->_column_order[$this->input->post('order')['0']['column']], 
				$this->input->post('order')['0']['dir']
			);
		}
		else
		{
			$this->db->order_by($this->_table.'.id', 'DESC');
		}
	}


	public function get_datatables()
	{
		$this->_datatable_query();

		if ( $this->input->post('length') != -1 ) 
		{
			$this->db->limit($this->input->post('length'), $this->input->post('start'));
			$query = $this->db->get();
		}
		else
		{
			$query = $this->db->get();
		}
		
		return $query->result_array();
	}


	public function count_filtered()
	{
		$this->_datatable_query();
		$query = $this->db->get();
		return $query->num_rows();
	}


	public function count_all()
	{
		$this->db->from($this->_table);
		return $this->db->count_all_results();
	}


	public function insert($data)
	{
		$query = $this->db->insert($this->_table, $data);
		return $query;
	}


	public function update($id, $data)
	{
		$query = $this->db->where('id', $id);
		$query = $this->db->update($this->_table, $data);
		return $query;
	}


	public function delete($id)
	{
		if ( $this->cek_id($id) > 0 ) 
		{
			$query = $this->db->where('id', $id);
			$query = $this->db->delete($this->_table);
			return TRUE;
		}
		else
			return FALSE;
	}


	public function get_acc($id) 
	{
		$query = $this->db->select('*');
		$query = $this->db->select('t_account_trading.id as id, t_account_trading.password as password');
		$query = $this->db->where($this->_table.'.id', $id);
		$query = $this->db->join('t_user', 't_user.id='.$this->_table.'.user_id');
		$query = $this->db->get($this->_table);
		$query = $query->row_array();
		return $query;
	}


	public function cek_id($id=0)
	{
		$query = $this->db->select('id');
		$query = $this->db->where('id', $id);
		$query = $this->db->get($this->_table);
		$result = $query->num_rows();
		$int = (int)$result;
		return $int;
	}
	

	public function cek_seotitle($seotitle)
	{
		$query = $this->db
			     ->where('seotitle',$seotitle)
			     ->get($this->_table)
			     ->num_rows();
		return $query;
	}


	public function cek_seotitle2($id, $seotitle)
	{
		$query = $this->db
			     ->select('id,seotitle')
			     ->where('seotitle', $seotitle)
			     ->get($this->_table);

		if (
		    $query->num_rows() == '1' && 
		    $query->row_array()['id'] == $id || 
		    $query->num_rows() != '1'
		   ) 
		{
			return TRUE;
		}
		else 
			return FALSE;
	}
} // End class.