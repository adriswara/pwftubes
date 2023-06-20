<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cats_model extends CI_Model {

	public function create()
	{
        $data = array(
            'nama' => $this->input->post('nama'),
            'role' => $this->input->post('role'),
            'ipk' => $this->input->post('ipk'),
            'sks_lulus' => $this->input->post('sks_lulus'),
            'username' => $this->input->post('username'),
        );
    $this->db->insert('mahasiswa',$data);
        

	}
	public function read()
	{
        $this->db->where('mahasiswa_delete',0);  
        $this->db->where('superuser',0);
        $query=$this->db->get('mahasiswa');
        return $query->result();
    }
    
    public function read_by($id)
	{
        $this->db->where('id_mahasiswa',$id);
        $query=$this->db->get('mahasiswa');
        return $query->row();
    }
    public function update($id){
        $data = array(
            'nama' => $this->input->post('nama'),
            'role' => $this->input->post('role'),
            'ipk' => $this->input->post('ipk'),
            'sks_lulus' => $this->input->post('sks_lulus'),
            'username' => $this->input->post('username'),


        );
        $this->db->where('id_mahasiswa',$id);
        $this->db->update('mahasiswa',$data);
    }

    public function delete($id){
        $this->db->where('id_mahasiswa',$id); 
        $this->db->delete('mahasiswa'); 
    }

    public function validation(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name','Cat name','required');
        $this->form_validation->set_rules('type','Cat type','required');
        $this->form_validation->set_rules('gender','Cat gender','required');
        $this->form_validation->set_rules('age','Cat age','required|numeric');
        $this->form_validation->set_rules('price','Cat price','required|numeric');
    
        if ($this->form_validation->run())
            return TRUE;
        else
            return FALSE;
    }

    public function sale($id){
        $data = array(
            'customer_name' => $this->input->post('customer_name'),
            'customer_address' => $this->input->post('customer_address'),
            'customer_phone' => $this->input->post('customer_phone'),
            'cat_id' => $id
        );
        $this->db->insert('item3088',$data);

        $this->db->set('sold','1');
        $this->db->where('id',$id);
        $this->db->update('mahasiswa',$sold);
    }

    public function sales(){
        // $query = $this->db->get('item3088');
        $this->db->select('*');
        $this->db->from('item3088');
        $this->db->join('mahasiswa','item3088.cat_id = mahasiswa.id');
        $query = $this->db->get();
        return $query->result();
    }

    public function reset($userid,$user)
    {
        $this->db->set('password', password_hash($user->username, PASSWORD_DEFAULT));
        $this->db->where('id_mahasiswa',$userid);
        $this->db->update('mahasiswa');
    } 

}
