<?php defined('BASEPATH') or exit('No direct script access allowed');

class Home extends Member_controller
{

    public $mod = 'home';

    public function __construct()
    {
        parent::__construct();
        $this->meta_title(lang_line('home_title'));
        $this->load->model('member/deposit_model');
        $this->load->model('member/withdrawal_model');
        $this->load->model('member/account_model');
        $this->load->model('member/referral_model');
    }

    public function index()
    {
        $this->vars['deposit'] = $this->deposit_model->get_jml_deposit();
        $this->vars['withdrawal'] = $this->withdrawal_model->get_jml_withdrawal();
        $this->vars['account'] = $this->account_model->get_jml_account();
        $this->vars['wallet'] = $this->account_model->get_wallet();
        $this->vars['activity'] = $this->account_model->get_activity();
        $this->vars['downline'] = $this->referral_model->get_downline();
        $this->vars['data'] = $this->account_model->get_account();
        $this->vars['row_bank'] = $this->account_model->get_bank();

        $this->render_view('home', $this->vars);
    }
} // End Class.