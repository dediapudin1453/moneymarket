<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Broker_model extends CI_Model {

	private $_table = 't_broker';
	private $_column_order = array(null, 'amount, date');
	private $_column_search = array('amount');

	public function __construct()
	{
		parent::__construct();
	}


	private function _datatable_query()
	{
		$this->db->select('*');
		$this->db->from($this->_table);

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

	public function get_data() {
		$this->db->select('*');
		$this->db->from($this->_table);
		$this->db->where('id', '1');
		return $this->db->get()->row_array();
	}
} // End class.