<?php defined('BASEPATH') OR exit('No direct script access allowed');

class History_report_model extends CI_Model {

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


	private function _datatable_query()
	{
		$this->db->select('*');
		
		$this->db->from($this->_table);
		$this->db->where('referral_id', $this->session_key);
		
		$i = 0;
		foreach ( $this->_column_search as $item ) 
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
			$this->db->order_by('id', 'DESC');
		}
		
		$this->db->group_by('id');
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
	
		// if ( $this->session_level != 0 && $this->session_level <= 2 ) 
		// {
		// 	$this->db->join('t_category', 't_category.id = t_user.id_category', 'left');
		// 	$this->db->join('t_user', 't_user.id = t_user.id_user', 'left');
		// }

			$this->db->where('t_user.referral_id', $this->session_key);

		return $this->db->count_all_results();
	}


	public function ajax_tags($input = '')
	{
		$query = $this->db
			->like('seotitle', $input)
			->order_by('seotitle', 'ASC')
			->get('t_tag');
		
		if ( $query->num_rows() >= 1 )
			$result = $query->result_array();
		else 
			$result = NULL;

		return $result;
	}


	public function insert_user($data)
	{
		$this->db->insert($this->_table, $data);
	}


	public function insert_tag($tag)
	{
		$tagseo = seotitle($tag);
		
		$cek_tag = $this->db->where("BINARY seotitle='$tagseo'", NULL, FALSE)->get('t_tag')->num_rows();

		if ($cek_tag === 0 && !empty($tagtitle))
		{
			$data_tag = array(
				'title' => $tagtitle,
				'seotitle' => $tagseo
			);
			$this->db->insert('t_tag', $data_tag);
		}
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


	public function get_user($id_user)
	{
		$query = $this->db
			->select('
					 t_user.id            AS user_id,
					 t_user.title         AS user_title,
					 t_user.content       AS user_content,
					 t_user.tag           AS user_tag,
					 t_user.picture,
					 t_user.image_caption,
					 t_user.comment,
					 t_user.headline,
					 t_category.id        AS category_id,
					 t_category.title     AS category_title,
					 t_category.seotitle  AS category_seotitle,
					 t_user.id            AS user_id,
					 t_user.name          AS user_name
					')
			->from($this->_table)
			->join('t_category', 't_category.id = t_user.id_category', 'left')
			->join('t_user', 't_user.id = t_user.id_user', 'left')
			->where('t_user.id', $id_user)
			->get();

		$result = $query->row_array();
		
		return $result;
	}


	public function num_comment($id)
	{
		$query = $this->db->where('id_user', $id)->get('t_comment')->num_rows();
		return $query;
	}


	public function get_all_category() 
	{
		$query = $this->db
			->select('id,title')
			->order_by('title', 'ASC')
			->get('t_category')
			->result_array();

		return $query;
	}


	public function val_cat($id)
	{
		$query = $this->db->where('id', $id)->get('t_category')->row_array();
		return $query;
	}


	public function get_all_tag() 
	{
		$query = $this->db->order_by('title', 'ASC')->get('t_tag')->result_array();
		return $query;
	}


	public function valtag($tags = '')
	{
		$tag = '';
		if ( !empty($tags) )
		{
			$arrtags = explode(',', $tags);
			foreach ($arrtags as $key) {
				$query = $this->db->select('title')->where('seotitle', $key)->get('t_tag');
				
				if ( $query->num_rows() > 0 )
					$tag .= $query->row_array()['title'].',';
			}
		}
		return rtrim($tag,',');
	}


	public function get_all_user() 
	{
		$query = $this->db
			->select('
			         t_user.id    AS user_id,
				     t_user.level AS user_level,
				     t_user.name  AS user_name,

				     t_user_level.id    AS level_id,
				     t_user_level.title AS level_title
				    ')
			->where('t_user.active', 'Y')
			->join('t_user_level', 't_user_level.id = t_user.level', 'left')
			->get('t_user')
			->result_array();
		return $query;
	}


	public function cek_id($id)
	{
		$session_id_level = login_level('member');
		$session_level = login_level('member', TRUE);
		$session_key = login_key('member');
		$num_rows = 0;

		$num_rows = $this->db
					->select('id')
					->where('id', $id)
					->get($this->_table)
					->num_rows();

		return $num_rows;
	}


	public function cek_seotitle($seotitle)
	{
		$query = $this->db->where("BINARY seotitle = '$seotitle'", NULL, FALSE)->get($this->_table);
		$result = $query->num_rows();

		if ($result == 0)
			return TRUE;
		else
			return FALSE;
	}


	public function cek_member_id($id)
	{
		$cek = $this->db
			->where('member_id', $id)
			->get($this->_table);
		if ($cek->num_rows() != 1) 
		{
			return TRUE;
		}
		else 
		{
			return FALSE;
		}
	}	
} // End class.