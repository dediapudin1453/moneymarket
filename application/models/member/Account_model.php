<?php defined('BASEPATH') or exit('No direct script access allowed');

class Account_model extends CI_Model
{

    private $_table = 't_user';
    private $key;

    public function __construct()
    {
        parent::__construct();
        $this->key = login_key('member');
    }


    public function get_account()
    {
        $query = $this->db->select('username,email,name,gender,birthday,about,address,tlpn,photo,id_type,id_number,id_photo,status_data,join_date')
            ->where('id', $this->key)
            ->get($this->_table)
            ->row_array();
        return $query;
    }

    public function get_activity()
    {
        $this->db->select('*');
        $this->db->where('user_id', $this->key);
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('t_activity')->result_array();
        return $query;
    }

    public function get_one_bank_member($id_bank)
    {
        $query = $this->db->select('id')
            ->where('user_id', $this->key)
            ->where('id', $id_bank)
            ->get('t_bank')
            ->row_array();
        return $query;
    }

    public function get_bank()
    {
        $this->db->select('id,bank_name,acc_number,owner_name,branch');
        $this->db->where('user_id', $this->key);
        $this->db->order_by('id', 'DESC');
        $this->db->limit('1');
        $query = $this->db->get('t_bank')->row_array();
        return $query;
    }

    public function get_all_bank()
    {
        $this->db->select('id,bank_name,acc_number,owner_name,branch');
        $this->db->where('user_id', $this->key);
        $query = $this->db->get('t_bank')->result_array();
        return $query;
    }

    public function get_wallet()
    {
        return $this->db->get_where('t_wallet', array('user_id' => $this->key))->row_array();
    }

    public function update_wallet($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('t_wallet', $data);
    }

    public function insert_wallet_history($data)
    {
        $this->db->insert('t_wallet_history', $data);
    }


    public function update_profile(array $data)
    {
        return $this->db->where('id', $this->key)->update($this->_table, $data);
    }

    public function update_bank($id, $data)
    {
        return $this->db->where('id', $id)->update('t_bank', $data);
    }

    public function create_bank($data)
    {
        return $this->db->insert('t_bank', $data);
    }

    public function delete()
    {
        return $this->db->where('id', $this->key)->delete($this->_table);
    }

    public function get_account_trading()
    {
        $this->db->join('t_product', 't_product.id=t_account_trading.product_id');
        $this->db->order_by('t_account_trading.id', 'DESC');
        return $this->db->get_where('t_account_trading', array('user_id' => $this->key))->result_array();
    }

    public function get_account_trading_active()
    {
        return $this->db->get_where('t_account_trading', array('user_id' => $this->key, 'status_request' => 'Approved'))->result_array();
    }

    public function get_one_account_trading($acc)
    {
        return $this->db->get_where('t_account_trading', array('user_id' => $this->key, 'account' => $acc))->row_array();
    }

    public function get_account_receiver()
    {
        $this->db->select('t_user.username, t_account_trading.account');
        $this->db->from('t_account_receiver');
        $this->db->join('t_account_trading', 't_account_trading.id=t_account_receiver.account_id');
        $this->db->join('t_user', 't_user.id=t_account_trading.user_id');
        $this->db->where('t_account_trading.user_id !=', $this->key);
        return $this->db->get()->result_array();
    }

    public function get_one_account_receiver($acc)
    {
        $this->db->select('t_user.username, t_account_trading.account');
        $this->db->from('t_account_receiver');
        $this->db->join('t_account_trading', 't_account_trading.id=t_account_receiver.account_id');
        $this->db->join('t_user', 't_user.id=t_account_trading.user_id');
        $this->db->where('t_account_trading.user_id !=', $this->key);
        $this->db->where('t_account_trading.account', $acc);
        return $this->db->get()->result_array();
    }

    public function insert_acc_req($data)
    {
        return $this->db->insert('t_account_trading', $data);
    }

    public function get_jml_account()
    {
        $this->db->select('COUNT(id) as jml');
        $this->db->from('t_account_trading');
        $this->db->where('user_id', $this->key);
        $this->db->where('status_request', 'Approved');
        return $this->db->get()->row_array();
    }

    public function insert_activity($data)
    {
        $this->db->insert('t_activity', $data);
    }


    public function get_wallet_history()
    {
        $this->db->select('*');
        $this->db->select('t_wallet_history.amount as amount');
        $this->db->order_by('t_wallet_history.id', 'DESC');
        $this->db->join('t_wallet', 't_wallet.id=t_wallet_history.wallet_id');
        return $this->db->get_where('t_wallet_history', array('t_wallet.user_id' => login_key('member')))->result_array();
    }

} // End class.