<?php defined('BASEPATH') or exit('No direct script access allowed');

class Member_login_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }


    public function cek_email($email = '')
    {
        $dataEmail = decrypt($email);
        $query = $this->db->select('id');
        $query = $this->db->where("email = '" . $input['email'] . "'", NULL, FALSE);
        $query = $this->db->where('level', '4');
        $query = $this->db->where('active', 'Y');
        $query = $this->db->or_where('level', '5');
        $query = $this->db->where("email = '" . $input['email'] . "'", NULL, FALSE);
        $query = $this->db->where('active', 'Y');
        $query = $this->db->or_where('level', '6');
        $query = $this->db->where("email = '" . $input['email'] . "'", NULL, FALSE);
        $query = $this->db->where('active', 'Y');
        $query = $this->db->get('t_user');
        return $query->num_rows();
    }


    public function cek_reg_email($email = '')
    {
        $dataEmail = decrypt($email);
        $query = $this->db->select('id');
        $query = $this->db->where("email = '" . $dataEmail . "'", NULL, FALSE);
        $query = $this->db->get('t_user');
        $result = $query->num_rows();

        if ($result == 1)
            return FALSE;
        else
            return TRUE;
    }

    public function cek_reg_username($username = '')
    {
        $dataUsername = decrypt($username);
        $query = $this->db->select('id');
        $query = $this->db->where("BINARY username = '" . $dataUsername . "'", NULL, FALSE);
        $query = $this->db->get('t_user');
        $result = $query->num_rows();

        if ($result == 1)
            return FALSE;
        else
            return TRUE;
    }

    public function cek_reg_phone($phone = '')
    {
        $dataPhone = decrypt($phone);
        $query = $this->db->select('id');
        $query = $this->db->where("BINARY tlpn = '" . $dataPhone . "'", NULL, FALSE);
        $query = $this->db->get('t_user');
        $result = $query->num_rows();

        if ($result == 1)
            return FALSE;
        else
            return TRUE;
    }


    public function cek_login($input)
    {
        $query = $this->db->where("email = '" . $input['email'] . "' OR username = '" . $input['email'] . "'", NULL, FALSE);
        $query = $this->db->where('level', '4');
        $query = $this->db->or_where('level', '5');
        $query = $this->db->where("email = '" . $input['email'] . "' OR username = '" . $input['email'] . "'", NULL, FALSE);
        $query = $this->db->or_where('level', '6');
        $query = $this->db->where("email = '" . $input['email'] . "' OR username = '" . $input['email'] . "'", NULL, FALSE);
        // $query = $this->db->where('active','Y');
        $query = $this->db->get('t_user');

        if ($query->num_rows() == 1) {
            $userdata = $query->row_array();
            if (decrypt($userdata['password']) == decrypt($input['password']))
                return TRUE;
            else
                return FALSE;
        }
        else {
            return FALSE;
        }
    }


    public function get_user($input)
    {
        $query = $this->db->where("email = '" . $input['email'] . "' OR username = '" . $input['email'] . "'", NULL, FALSE);
        $query = $this->db->where('level', '4');
        $query = $this->db->where('active', 'Y');
        $query = $this->db->or_where('level', '5');
        $query = $this->db->where("email = '" . $input['email'] . "' OR username = '" . $input['email'] . "'", NULL, FALSE);
        $query = $this->db->where('active', 'Y');
        $query = $this->db->or_where('level', '6');
        $query = $this->db->where("email = '" . $input['email'] . "' OR username = '" . $input['email'] . "'", NULL, FALSE);
        $query = $this->db->where('active', 'Y');
        $query = $this->db->get('t_user');
        $query = $query->row_array();
        return $query;
    }

    public function get_user_email($input)
    {
        $query = $this->db->where("email = '" . $input['email'] . "'", NULL, FALSE);
        $query = $this->db->where('level', '4');
        $query = $this->db->where('active', 'Y');
        $query = $this->db->or_where('level', '5');
        $query = $this->db->where("email = '" . $input['email'] . "'", NULL, FALSE);
        $query = $this->db->where('active', 'Y');
        $query = $this->db->or_where('level', '6');
        $query = $this->db->where("email = '" . $input['email'] . "'", NULL, FALSE);
        $query = $this->db->where('active', 'Y');
        $query = $this->db->get('t_user');
        $query = $query->row_array();
        return $query;
    }
    public function get_user_username($input)
    {
        $query = $this->db->where("username = '" . $input['email'] . "'", NULL, FALSE);
        $query = $this->db->where('level', '4');
        $query = $this->db->where('active', 'Y');
        $query = $this->db->or_where('level', '5');
        $query = $this->db->where("username = '" . $input['email'] . "'", NULL, FALSE);
        $query = $this->db->where('active', 'Y');
        $query = $this->db->or_where('level', '6');
        $query = $this->db->where("username = '" . $input['email'] . "'", NULL, FALSE);
        $query = $this->db->where('active', 'Y');
        $query = $this->db->get('t_user');
        $query = $query->row_array();
        return $query;
    }


    public function insert_member(array $data)
    {
        $this->db->insert('t_user', $data);
        return $this->db->insert_id();
    }

    public function create_wallet($data)
    {
        return $this->db->insert('t_wallet', $data);
    }

    public function update_cookie($data, $id)
    {
        $this->db->where('id', $id);
        return $this->db->update('t_user', $data);
    }

    public function get_by_cookie($key)
    {
        return $this->db->get_where('t_user', array('remember_key' => $key))->row_array();
    }
} // End class.