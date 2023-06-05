<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen_model extends CI_Model {

	public function create()
	{
        $data = array(
            'nama_dosen' => $this->input->post('nama_dosen'),
        );
    $this->db->insert('dosen',$data);
        

	}
	public function read()
	{
      $query=$this->db->get('dosen');
        return $query->result();
    }
    
    public function read_by($id)
	{
        $this->db->where('id_dosen',$id);
        $query=$this->db->get('dosen');
        return $query->row();
    }
    public function update($id){
        $data = array(
            'nama_dosen' => $this->input->post('nama_dosen'),
          
        );
        $this->db->where('id_dosen',$id);
        $this->db->update('dosen',$data);
    }

    public function delete($id){
        $this->db->where('id_dosen',$id); 
        $this->db->delete('dosen'); 
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
        $this->db->update('dosen',$sold);
    }

    public function sales(){
        // $query = $this->db->get('item3088');
        $this->db->select('*');
        $this->db->from('item3088');
        $this->db->join('dosen','item3088.cat_id = dosen.id');
        $query = $this->db->get();
        return $query->result();
    }

}
