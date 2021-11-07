<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Trade_model extends CI_Model{
    
    function __construct() {
        // Set table name
        $this->table = 't_trade_report';
    }
    
    /*
     * Fetch members data from the database
     * @param array filter data based on the passed parameters
     */
    function getRows($params = array()){
        $this->db->select('*');
        $this->db->from($this->table);
        
        if(array_key_exists("where", $params)){
            foreach($params['where'] as $key => $val){
                $this->db->where($key, $val);
            }
        }
        
        if(array_key_exists("returnType",$params) && $params['returnType'] == 'count'){
            $result = $this->db->count_all_results();
        }else{
            if(array_key_exists("id", $params)){
                $this->db->where('id', $params['id']);
                $query = $this->db->get();
                $result = $query->row_array();
            }else{
                if(array_key_exists("order_by", $params)){
                    $this->db->order_by($params['order_by'], 
                                        array_key_exists("order_by_opt", $params) ? $params['order_by_opt'] : 'asc' );
                }else{
                    $this->db->order_by('id', 'desc');
                }
                if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
                    $this->db->limit($params['limit'],$params['start']);
                }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
                    $this->db->limit($params['limit']);
                }
                
                $query = $this->db->get();
                $result = ($query->num_rows() > 0)? (
                    (array_key_exists("row", $params)) && $params['row'] == true ? $query->row_array(): $query->result_array())
                    :FALSE;
            }
        }
        
        // Return fetched data
        return $result;
    }
    
    public function get_rebate( $whr ){
        $this->db->select('*');
        $this->db->where( $whr );
        //$this->db->limit(100);
        return $this->db->get('t_rebate')->result();
    }

    private $_column_order_rebate = array(null, 't_user.name', 
                                't_user.level_ib', 
                                '(SELECT SUM(rebate) FROM t_rebate y where y.child_id = t_rebate.child_id AND y.date = t_rebate.date)', 
                                '(SELECT SUM(volume) FROM t_rebate y where y.child_id = t_rebate.child_id AND y.date = t_rebate.date)');
	private $_column_search_rebate = array('t_user.name', 't_user.level_ib');

    private function _datatable_query_rebate()
	{
		$this->db->select(' DISTINCT
                            DATE(date),
                            `user_id`
                            ', FALSE);
        $this->db->select('
        (SELECT SUM(rebate) FROM t_rebate h WHERE h.user_id = t_rebate.user_id and DATE(h.date) = DATE(t_rebate.date)) as total_rebate,
        (SELECT SUM(volume) FROM t_rebate h WHERE h.user_id = t_rebate.user_id and DATE(h.date) = DATE(t_rebate.date)) as total_volume,
                    t_user.name as receive_rebate_name,
                    t_user.level_ib as receive_rebate_level,
                    DATE(t_rebate.date)         as created,
                    t_rebate.status             as status
                    ');
		$this->db->from('t_rebate');
		$this->db->join('t_user', 't_rebate.user_id = t_user.id');
		
		$i = 0;
		foreach ( $this->_column_search_rebate as $item ) 
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

				if ( count($this->_column_search_rebate) - 1 == $i ) 
				{
					$this->db->group_end(); 
				}
			}
			$i++;
		}
		
		if ( !empty($this->input->post('order')) ) 
		{
			$this->db->order_by(
				$this->_column_order_rebate[$this->input->post('order')['0']['column']], 
				$this->input->post('order')['0']['dir']
			);
		}
		else
		{
			$this->db->order_by('t_rebate.date', 'DESC');
		}
	}


	public function get_datatables_rebate()
	{
		$this->_datatable_query_rebate();

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


	public function count_filtered_rebate()
	{
		$this->_datatable_query_rebate();
		$query = $this->db->get();
		return $query->num_rows();
	}


	public function count_all_rebate()
	{
	    $this->db->select(' DISTINCT
                            DATE(date),
                            `user_id`
                            ', FALSE);
		$this->db->from('t_rebate');
        $this->db->join('t_user', 't_rebate.user_id = t_user.id');
        $query = $this->db->get();
		return count($query->result()); 
	}

    private $_column_order_trade = array(null, 't_trade_report.login', 't_user.name', 't_trade_report.volume', 't_trade_report.open_price', 't_trade_report.open_time', 't_trade_report.close_price',
                            't_trade_report.close_time', 't_trade_report.profit', 't_trade_report.pips', 't_trade_report.created');
	private $_column_search_trade = array('t_trade_report.login', 't_user.name', 't_user.username', 't_trade_report.created');
    private function _datatable_query()
	{
		$session_level = login_level('admin');
		
		$this->db->select('
				         t_user.id           AS  user_id,
					     t_user.name         AS  user_name,
					     t_user.username     AS  user_username,
                         ' .$this->table. '.*
					    ');

        $this->db->join('t_account_trading', $this->table.'.login = t_account_trading.account', 'LEFT');
        $this->db->join('t_user', 't_user.id = t_account_trading.user_id', 'LEFT');
		$this->db->from($this->table);
		// $this->db->where("t_user.level = '4'", NULL, FALSE);


		$i = 0;	
		foreach ($this->_column_search_trade as $item) 
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

				if ( count($this->_column_search_trade) - 1 == $i ) 
				{
					$this->db->group_end(); 
				}
			}
			$i++;
		}
		
		if ( !empty($this->input->post('order')) ) 
		{
			$this->db->order_by(
				$this->_column_order_trade[$this->input->post('order')['0']['column']], 
				$this->input->post('order')['0']['dir']
			);
		}
		else
		{
			$this->db->order_by($this->table . '.created', 'DESC');
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
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}
    
    /*
     * Insert members data into the database
     * @param $data data to be insert based on the passed parameters
     */
    public function insert($data = array()) {
        if(!empty($data)){
            // Add created and modified date if not included
            if(!array_key_exists("created", $data)){
                $data['created'] = date("Y-m-d H:i:s");
            }
            if(!array_key_exists("modified", $data)){
                $data['modified'] = date("Y-m-d H:i:s");
            }
            
            // Insert member data
            $insert = $this->db->insert($this->table, $data);
            
            // Return the status
            return $insert?$this->db->insert_id():false;
        }
        return false;
    }
    
    /*
     * Update member data into the database
     * @param $data array to be update based on the passed parameters
     * @param $condition array filter data
     */
    public function update($data, $condition = array()) {
        if(!empty($data)){
            // Add modified date if not included
            if(!array_key_exists("modified", $data)){
                $data['modified'] = date("Y-m-d H:i:s");
            }
            
            // Update member data
            $update = $this->db->update($this->table, $data, $condition);
            
            // Return the status
            return $update?true:false;
        }
        return false;
    }
}