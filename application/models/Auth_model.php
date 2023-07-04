<?php defined('BASEPATH') OR exit('No direct script access allowed ');

class Auth_model extends CI_Model{
    
    public function getuser($username)
    {
        $this->db->where('username', $username);
        return $this->db->get('mahasiswa')->row();
    }

    public function changepass()
    {
        $this->db->set('password', password_hash($this->input->post('newpassword'), PASSWORD_DEFAULT));
        $this->db->where('username',$this->session->userdata('username'));
        return $this->db->update('mahasiswa');
    }


    public function changephoto($photo){
        if ($this->session->userdata('photo') !== 'default.png' ) 
			if ($this->input->post('upload')) {
                if ($this->upload()) {
                    $this->db->set('photo' , $photo);
                    $this->db->where('username',$this->session->userdata('username'));                    $this->session->set_userdata('photo',$this->upload->data('file_name'));
                    $this->session->set_userdata('msg','<p style="color:green">Photo sucessfuly changed !</p>');
                }
            else $data['error'] = $this->upload->display_errors();
        }
        
        return $this->db->update('mahasiswa');
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

}