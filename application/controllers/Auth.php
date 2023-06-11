<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model');
    }

    public function login()
    {
        $this->load->library('form_validation');
        if($this->input->post('login') && $this->validation('login')){
            $login=$this->Auth_model->getuser($this->input->post('username'));
            if($login != NULL){
                if(password_verify($this->input->post('password'), $login->password)) {
                    $data = array (
                        'username' => $login->username,
                        'role' => $login->role,
                        'nama' => $login->nama,
                    );
                    $this->session->set_userdata($data);
                    redirect('welcome');
                }
            }
            $this->session->set_flashdata('msg','<p style="color:red">Invalid Username or Password !</p>');
        }
        $this->load->view('auth/form_login');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth/login');
    }

    public function changepass()
    {
        $this->load->library('form_validation');
        if(! $this->session->userdata('username')) redirect('auth/login');
        if($this->input->post('change') && $this->validation('change')){
            $change=$this->Auth_model->getuser($this->session->userdata('username'));
            if(password_verify($this->input->post('oldpassword'), $change->password)) {
                if($this->Auth_model->changepass())
                    $this->session->set_flashdata('msg','<p style="color:green">Password Successfully Changed !</p>');
                else
                    $this->session->set_flashdata('msg','<p style="color:red">Change Password Failed !</p>');
            } else {
                $this->session->set_flashdata('msg','<p style="color:red">Wrong Old Password !</p>');
            }
        }
        $this->load->view('auth/form_password');
    }

    public function changephoto(){
        if (! $this->session->userdata('username')) redirect('auth/login');
        $data['error']='';
        if ($this->input->post('upload')) {
            if ($this->upload()) {
                $this->Auth_model->changephoto($this->upload->data('file_name'));
                $this->session->set_userdata('photo',$this->upload->data('file_name'));
                $this->session->set_userdata('msg','<p style="color:green">Photo sucessfuly changed !</p>');
            }
            else $data['error'] = $this->upload->display_errors();
        }
        $this->load->view('auth/form_photo',$data);
    }

    private function upload(){
        $config['upload_path']          = './uploads/users/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 100;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;

        $this->load->library('upload', $config);
        return $this->upload->do_upload('photo');
    }

    public function validation($type)
    {
        $this->load->library('form_validation');

        if($type=='login') {
            $this->form_validation->set_rules('username', 'Username ', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
        } else{   
            $this->form_validation->set_rules('oldpassword', 'Old Password', 'required');
            $this->form_validation->set_rules('newpassword', 'New Password', 'required');
        }

        if($this->form_validation->run())
            return TRUE;
        else
            return FALSE;    
    }
}