<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Member extends Admin_controller
{

    public $mod = 'member';
    public $dirout = 'mod/user/';
    public $path_photo = CONTENTPATH . 'uploads/user/';

    public function __construct()
    {
        parent::__construct();

        $this->lang->load('mod/' . $this->mod, $this->_language);
        $this->meta_title(lang_line('mod_title'));
        $this->load->model('mod/member_model');
    }


    public function index()
    {
        if ($this->read_access) {
            if ($this->input->is_ajax_request()) {
                $data_output = [];
                $users = $this->member_model->get_datatables();

                foreach ($users as $res) {
                    $wallet = $this->member_model->get_wallet($res['user_id']);
                    if ($res['user_username'] == data_login('admin', 'username')) {
                        continue;
                    }
                    $row = [];
                    $row[] = '<div class="text-center"><input type="checkbox" class="row_data" value="' . encrypt($res['user_id']) . '"></div>';
                    $row[] = '<div class="text-center"><a href="' . user_photo($res['user_photo']) . '" class="fancybox"><img src="' . user_photo($res['user_photo']) . '" style="background:#fff;padding:2px;width:40px;border-radius:50%;border:1px solid #ddd;"></a></div>';
                    $row[] = $res['user_username'];
                    $row[] = $res['user_name'];
                    $row[] = $res['user_email'];
                    $row[] = '$' . number_format($wallet, 2);
                    // status
                    $row[] = ($res['status_data'] == 'Complete' ? '<span class="badge badge-b badge-pill badge-primary">Complete</span>' : '<span class="badge badge-b badge-pill badge-secondary">Incomplete</span>');
                    $row[] = ($res['user_active'] == 'Y' ? '<span class="badge badge-b badge-pill badge-primary">Active</span>' : '<span class="badge badge-b badge-pill badge-secondary">No</span>');
                    $row[] = '<div class="text-center"><div class="btn-group">
					<a href="' . admin_url($this->mod . '/under_referral/' . $res['user_username']) . '" class="button btn-xs btn-default" data-toggle="tooltip" data-placement="top" data-title="Under"><i class="fa fa-sitemap"></i></a>
					<a href="' . admin_url($this->mod . '/edit/' . $res['user_username']) . '" class="button btn-xs btn-default" data-toggle="tooltip" data-placement="top" data-title="' . lang_line('button_edit') . '"><i class="icon-pencil3"></i></a>
					<button type="button" class="button btn-xs btn-default delete_single" data-toggle="tooltip" data-placement="top" data-title="' . lang_line('button_delete') . '" data-pk="' . encrypt($res['user_id']) . '"><i class="icon-bin"></i></button>
					</div></div>';
                    $data_output[] = $row;
                }

                $json_output = array(
                    "draw" => $this->input->post('draw'),
                    "recordsTotal" => $this->member_model->count_all(),
                    "recordsFiltered" => $this->member_model->count_filtered(),
                    "data" => $data_output,
                );

                $this->json_output($json_output);
            }
            else {
                $this->vars['all_users'] = $this->member_model->all_user();
                $this->render_view('view_index', $this->vars);
            }
        }
        else {
            $this->render_403();
        }
    }


    public function delete()
    {
        if ($this->input->is_ajax_request() && $this->delete_access) {
            $act = $this->input->post('act');

            if ($act == 'level') {
                $id_del = xss_filter($this->input->post('id'), 'sql');

                if ($id_del > 4 && $id_del != 0) {
                    $this->member_model->delete_level($id_del);

                    $json_output['alert_type'] = "success";
                    $json_output['alert_messages'] = lang_line('level_delete_success');
                    $json_output['status'] = TRUE;
                    $this->json_output($json_output);
                }
                else {
                    $json_output['alert_type'] = "danger";
                    $json_output['alert_messages'] = "Oups..! " . lang_line('error_unknown');
                    $json_output['status'] = TRUE;
                    $this->json_output($json_output);
                }
            }

            else // default delete user account
            {
                $data_pk = $this->input->post('data');

                foreach ($data_pk as $key) {
                    $pk = xss_filter(decrypt($key), 'sql');
                    $photo = $this->member_model->get_photo($pk);
                    $this->member_model->delete_user($pk);

                    // delete user photo.
                    if (!is_null($photo))
                        @unlink($this->path_photo . $photo);
                }

                $response['success'] = true;
                $response['alert']['type'] = 'success';
                $response['alert']['content'] = lang_line('form_message_delete_success');
                $this->json_output($response);
            }
        }
        else {
            show_404();
        }
    }


    public function add_new()
    {
        if ($this->write_access) {
            if ($this->input->is_ajax_request()) {
                $this->form_validation->set_rules(array(
                        array(
                        'field' => 'username',
                        'label' => lang_line('form_label_username'),
                        'rules' => 'required|trim|min_length[4]|max_length[20]|regex_match[/^[a-zA-Z0-9._-]+$/]|callback__cek_addusername',
                    ),
                        array(
                        'field' => 'email',
                        'label' => lang_line('form_label_email'),
                        'rules' => 'required|trim|min_length[10]|max_length[60]|valid_email|callback__cek_addemail',
                    ),
                        array(
                        'field' => 'input_password',
                        'label' => lang_line('form_label_password'),
                        'rules' => 'required|min_length[6]|max_length[20]',
                    ),
                        array(
                        'field' => 'name',
                        'label' => lang_line('form_label_fullname'),
                        'rules' => 'required|trim|min_length[4]|max_length[20]|alpha_numeric_spaces',
                    ),
                        array(
                        'field' => 'birthday',
                        'label' => lang_line('form_label_birthday'),
                        'rules' => 'required',
                    ),
                        array(
                        'field' => 'tlpn',
                        'label' => lang_line('form_label_tlpn'),
                        'rules' => 'required|min_length[4]|max_length[20]',
                    ),
                ));

                if ($this->form_validation->run()) {
                    $active = (!empty($this->input->post('active')) ? 'Y' : 'N');
                    $data = array(
                        'level' => '4',
                        'username' => xss_filter($this->input->post('username')),
                        'email' => $this->input->post('email', TRUE),
                        'password' => encrypt($this->input->post('input_password')),
                        'name' => xss_filter($this->input->post('name'), 'xss'),
                        'gender' => xss_filter($this->input->post('gender'), 'xss'),
                        'tlpn' => xss_filter($this->input->post('tlpn'), 'xss'),
                        'address' => xss_filter($this->input->post('address')),
                        'about' => xss_filter($this->input->post('about'), 'xss'),
                        'referral_id' => '4',
                        'active' => $active,
                        'photo' => 'user-' . random_string('numeric', 20) . ".jpg",
                    );

                    $this->member_model->insert_user($data);

                    $cekid = $this->member_model->get_id($data['username']);

                    $wallet = array('user_id' => $cekid, 'amount' => '0');
                    $this->db->insert('t_wallet', $wallet);
                    $response['success'] = true;
                }
                else {
                    $response['success'] = false;
                    $response['alert']['type'] = 'error';
                    $response['alert']['content'] = validation_errors();
                }

                $this->json_output($response);
            }
            else {
                $this->render_view('view_add_new', $this->vars);
            }
        }
        else {
            $this->render_403();
        }
    }


    public function edit($val = '')
    {
        if ($this->modify_access) {
            $uname = xss_filter($val, 'xss');
            $cek_uname = $this->member_model->cek_username($uname);

            if ($cek_uname == TRUE) {
                return $this->render_404();
            }
            else {
                $id = $this->member_model->get_id($uname);

                $this->vars['res_user'] = $this->member_model->get_user($id);
                $this->vars['bank_user'] = $this->db->get_where('t_bank', array('user_id' => $id))->row_array();
                $this->vars['select_levels'] = $this->member_model->select_level();
                $this->render_view('view_edit', $this->vars);
            }
        }
        else {
            return $this->render_403();
        }
    }


    public function submit_update_user()
    {
        $pk = decrypt($this->input->post('pk'));
        $id = xss_filter($pk, 'sql');
        $formtype = xss_filter($this->input->post('formtype'));

        $username = $this->db->get_where('t_user', array('id' => $id))->row_array()['username'];

        if ($formtype === 'profile') {
            $this->form_validation->set_rules(array(array(
                    'field' => 'name',
                    'label' => lang_line('form_label_fullname'),
                    'rules' => 'required|trim|min_length[4]|max_length[20]|alpha_numeric_spaces',
                )));

            $this->form_validation->set_rules(array(array(
                    'field' => 'email',
                    'label' => lang_line('form_label_email'),
                    'rules' => 'required|trim|min_length[4]|max_length[80]|valid_email',
                )));

            $this->form_validation->set_rules(array(array(
                    'field' => 'input_password',
                    'label' => lang_line('form_label_password'),
                    'rules' => 'min_length[6]|max_length[20]',
                )));

            $this->form_validation->set_rules(array(array(
                    'field' => 'birthday',
                    'label' => lang_line('form_label_birthday'),
                    'rules' => 'required|trim',
                )));

            $this->form_validation->set_rules(array(array(
                    'field' => 'birthday',
                    'label' => lang_line('form_label_birthday'),
                    'rules' => 'required',
                )));

            $this->form_validation->set_rules(array(array(
                    'field' => 'tlpn',
                    'label' => lang_line('form_label_tlpn'),
                    'rules' => 'max_length[20]|regex_match[/^[0-9-+ ]+$/]',
                )));

            if ($this->form_validation->run()) {
                $email = $this->input->post('email', TRUE);

                $cek_email = $this->db
                    ->select('email')
                    ->where("BINARY email='$email'", NULL, FALSE)
                    ->get('t_user');

                $contMail = $cek_email->num_rows();
                $currentMail = $cek_email->row_array()['email'];

                $editMail = $this->db
                    ->select('email')
                    ->where('id', $id)
                    ->get('t_user')
                    ->row_array()['email'];

                if (
                $contMail == 1 &&
                $currentMail == $editMail ||
                $contMail != 1
                ) {
                    $in_pass1 = $this->input->post('input_password');
                    $in_pass2 = $this->input->post('input_password2');
                    $password = empty($in_pass1) ? $in_pass2 : encrypt($in_pass1);


                    $data = array(
                        'password' => $password,
                        'email' => $email,
                        'name' => xss_filter($this->input->post('name'), 'xss'),
                        'gender' => xss_filter($this->input->post('gender'), 'gender'),
                        'birthday' => date('Y-m-d', strtotime($this->input->post('birthday'))),
                        'address' => xss_filter($this->input->post('address')),
                        'about' => xss_filter($this->input->post('about'), 'xss'),
                        'tlpn' => xss_filter($this->input->post('tlpn'), 'xss'),
                        'active' => (!empty($this->input->post('active')) ? 'Y' : 'N')
                    );

                    if (empty($_FILES['fupload']['tmp_name'])) {
                        $this->member_model->update($id, $data);
                        $this->session->set_flashdata('msg', '<div class="alert alert-success">
						  ' . lang_line('form_message_update_success') . '
						</div>');
                        redirect(admin_url($this->mod . '/edit/' . $username));
                    }

                    else {
                        $photop = $this->upload_photoprofile($id, $data);

                        if ($photop === TRUE) {
                            $this->session->set_flashdata('msg', '<div class="alert alert-success">
							  ' . lang_line('form_message_update_success') . '
							</div>');
                            redirect(admin_url($this->mod . '/edit/' . $username));
                        }
                        else {
                            $this->session->set_flashdata('msg', '<div class="alert alert-danger">
							  ' . $this->upload->display_errors() . '
							</div>');
                            redirect(admin_url($this->mod . '/edit/' . $username));
                        }
                    }
                }

                else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger">
					  ' . lang_line('mail_exist') . '
					</div>');
                    redirect(admin_url($this->mod . '/edit/' . $username));
                }
            }

            else {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger">
				  ' . validation_errors() . '
				</div>');
                redirect(admin_url($this->mod . '/edit/' . $username));
            }
        }
        elseif ($formtype === 'identitas') {
            $this->form_validation->set_rules(array(array(
                    'field' => 'idtype',
                    'label' => lang_line('form_label_idtype'),
                    'rules' => 'required|trim',
                )));

            $this->form_validation->set_rules(array(array(
                    'field' => 'idnumber',
                    'label' => lang_line('form_label_idnumber'),
                    'rules' => 'required|trim|numeric',
                )));

            if ($this->form_validation->run()) {
                $data = array(
                    'id_type' => xss_filter($this->input->post('idtype'), 'xss'),
                    'id_number' => xss_filter($this->input->post('idnumber'), 'xss')
                );

                if (empty($_FILES['fuploadid']['tmp_name'])) {
                    $this->member_model->update($id, $data);

                    $this->session->set_flashdata('msg', '<div class="alert alert-success">
					  ' . lang_line('form_message_update_success') . '
					</div>');
                    redirect(admin_url($this->mod . '/edit/' . $username));
                }

                else {
                    $photoid = $this->upload_photoid($id, $data);

                    if ($photoid === TRUE) {
                        $this->session->set_flashdata('msg', '<div class="alert alert-success">
						  ' . lang_line('form_message_update_success') . '
						</div>');
                        redirect(admin_url($this->mod . '/edit/' . $username));
                    }
                    else {
                        $this->session->set_flashdata('msg', '<div class="alert alert-danger">
						  ' . $this->upload->display_errors() . '
						</div>');
                        redirect(admin_url($this->mod . '/edit/' . $username));
                    }
                }
            }

            else {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger">
				  ' . validation_errors() . '
				</div>');
                redirect(admin_url($this->mod . '/edit/' . $username));
            }
        }
        elseif ($formtype === 'bank') {
            $this->form_validation->set_rules(array(array(
                    'field' => 'bank',
                    'label' => lang_line('form_label_bank'),
                    'rules' => 'required|trim|alpha_numeric_spaces',
                )));

            $this->form_validation->set_rules(array(array(
                    'field' => 'owner',
                    'label' => lang_line('form_label_bank_owner'),
                    'rules' => 'required|trim|alpha_numeric_spaces',
                )));

            $this->form_validation->set_rules(array(array(
                    'field' => 'cabang',
                    'label' => lang_line('form_label_bank_cabang'),
                    'rules' => 'required|trim|alpha_numeric_spaces',
                )));


            $this->form_validation->set_rules(array(array(
                    'field' => 'norek',
                    'label' => lang_line('form_label_bank_acc'),
                    'rules' => 'required|trim|numeric',
                )));

            if ($this->form_validation->run()) {

                $bi = decrypt($this->input->post('bi'));
                $bank_id = xss_filter($bi, 'sql');

                $data = array(
                    'bank_name' => xss_filter($this->input->post('bank'), 'xss'),
                    'owner_name' => xss_filter($this->input->post('owner'), 'xss'),
                    'branch' => xss_filter($this->input->post('cabang'), 'xss'),
                    'acc_number' => xss_filter($this->input->post('norek'), 'xss')
                );

                $cek = $this->db->get_where('t_bank', array('id' => $bank_id))->row_array();

                if (empty($cek)) {
                    $this->db->insert('t_bank', $data);

                    $this->session->set_flashdata('msg', '<div class="alert alert-success">
					  ' . lang_line('form_message_update_success') . '
					</div>');
                    redirect(admin_url($this->mod . '/edit/' . $username));
                }
                else {
                    $this->db->where('id', $bank_id);
                    $this->db->update('t_bank', $data);

                    $this->session->set_flashdata('msg', '<div class="alert alert-success">
					  ' . lang_line('form_message_update_success') . '
					</div>');
                    redirect(admin_url($this->mod . '/edit/' . $username));
                }
            }

            else {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger">
				  ' . validation_errors() . '
				</div>');
                redirect(admin_url($this->mod . '/edit/' . $username));
            }
        }
        elseif ($formtype === 'level') {

            $this->form_validation->set_rules(array(array(
                    'field' => 'status_data',
                    'label' => 'Status Data',
                    'rules' => 'required|trim',
                )));

            if ($this->form_validation->run()) {
                $data = array(
                    'status_data' => xss_filter($this->input->post('status_data'), 'xss'),
                );
                $this->member_model->update($id, $data);
                $this->session->set_flashdata('msg', '<div class="alert alert-success">
				  ' . lang_line('form_message_update_success') . '
				</div>');
                redirect(admin_url($this->mod . '/edit/' . $username));
            }
        }
    }


    public function upload_photo()
    {
        if ($this->input->is_ajax_request() && $this->write_access) {
            $pk = $this->input->post('pk');
            $photo_pk = $this->member_model->get_photo($pk);
        }
        else {
            show_404();
        }
    }

    public function upload_photoprofile($id, $data)
    {
        $new_photo = $this->member_model->get_photo($id);

        $this->load->library('upload', array(
            'upload_path' => $this->path_photo,
            'allowed_types' => "jpg|png|jpeg",
            'file_name' => $new_photo,
            'max_size' => 1024 * 10,
            'overwrite' => TRUE
        ));

        if ($this->upload->do_upload('fupload')) {
            $this->member_model->update($id, $data);

            // crop image.
            $this->load->library('simple_image');
            $this->simple_image
                ->fromFile($this->path_photo . $new_photo)
                ->thumbnail(200, 200, 'center')
                ->toFile($this->path_photo . $new_photo);

            return TRUE;
        }

        else {
            return FALSE;
        }
    }

    public function upload_photoid($id, $data)
    {
        $new_photo = $this->member_model->get_idphoto($id);

        if ($new_photo == null) {
            $new_photo = $new_photo;
        }
        else {
            $new_photo = 'userid-' . md5(strtotime(date('YmdHis'))) . '.jpg';
        }

        $this->load->library('upload', array(
            'upload_path' => $this->path_photo,
            'allowed_types' => "jpg|png|jpeg",
            'file_name' => $new_photo,
            'max_size' => 1024 * 10,
            'overwrite' => TRUE
        ));

        // $this->load->library('upload', $config);

        if (!$this->upload->do_upload('fuploadid')) {
            return FALSE;
        }
        else {
            $photo = array('upload_data' => $this->upload->data());

            $data = array(
                'id_type' => $data["id_type"],
                'id_number' => $data["id_number"],
                'id_photo' => $photo["upload_data"]["file_name"]
            );

            $this->member_model->update($id, $data);
            return TRUE;
        }
    }

    public function _cek_addusername($username = '')
    {
        $cek = $this->member_model->cek_username($username);

        if ($cek == FALSE) {
            $this->form_validation->set_message('_cek_addusername', lang_line('form_message_already_exists'));
            return FALSE;
        }

        return $cek;
    }


    public function _cek_addemail($email = '')
    {
        $cek = $this->member_model->cek_email($email);

        if ($cek == FALSE) {
            $this->form_validation->set_message('_cek_addemail', lang_line('form_message_already_exists'));
            return FALSE;
        }

        return $cek;
    }


    public function _cek_editusername($username = '')
    {
        $id = $this->uri->segment(4);
        $cek = $this->member_model->cek_username2($id, $username);

        if ($cek == FALSE) {
            $this->form_validation->set_message('_cek_editusername', lang_line('form_message_already_exists'));
        }

        return $cek;
    }


    public function _cek_editemail($email = '')
    {
        $id = $this->uri->segment(4);
        $cek = $this->member_model->cek_email2($id, $email);

        if ($cek == FALSE) {
            $this->form_validation->set_message('_cek_editemail', lang_line('form_message_already_exists'));
        }

        return $cek;
    }

    public function under_referral($val = '')
    {
        if ($this->modify_access) {
            $uname = xss_filter($val, 'xss');
            $cek_uname = $this->member_model->cek_username($uname);

            if ($cek_uname == TRUE) {
                return $this->render_404();
            }
            else {
                $id = $this->member_model->get_id($uname);
                $this->vars['under_user'] = $this->db->get_where('t_user', array('referral_id' => $id))->result_array();
                $this->render_view('view_under', $this->vars);
            }
        }
        else {
            return $this->render_403();
        }
    }

    public function ib()
    {
        if ($this->read_access) {
            $this->vars['all_ib'] = $this->member_model->get_ib();
            $this->render_view('view_ib', $this->vars);
        }
        else {
            $this->render_403();
        }
    }

} // End Class.