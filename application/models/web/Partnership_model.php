<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Partnership_model extends CI_Model {

	public $vars;

	public function __construct()
	{
		parent::__construct();
	}

	public function insert(array $data)
	{
		$this->db->insert('t_partnership', $data);
	}
} // End class.