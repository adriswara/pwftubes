<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categori_model extends CI_Model {

	public function create()
	{
    $data = array(
        'cate_name' => $this->input->post('cate_name'),
        'description' => $this->input->post('description')
    );
    $this->db->insert('',$data);
        

	}
	public function read()
	{
      $query=$this->db->get('');
        return $query->result();
    }
    
    public function read_by($id)
	{
        $this->db->where('id',$id);
        $query=$this->db->get('');
        return $query->row();
    }
    public function update($id){
        $data = array(
        'cate_name' => $this->input->post('cate_name'),
        'description' => $this->input->post('description')
        );
        $this->db->where('id',$id);
        $this->db->update('',$data);
    }

    public function delete($id){
        $this->db->where('id',$id); 
        $this->db->delete(''); 
    }
    

}
