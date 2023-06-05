<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categori_model extends CI_Model {

	public function create()
	{
    $data = array(
        'nama_kuliah' => $this->input->post('nama_kuliah'),
        'sks' => $this->input->post('sks')
    );
    $this->db->insert('matakuliah',$data);
        

	}
	public function read()
	{
      $query=$this->db->get('matakuliah');
        return $query->result();
    }
    
    public function read_by($id)
	{
        $this->db->where('id_matakuliah',$id);
        $query=$this->db->get('matakuliah');
        return $query->row();
    }
    public function update($id){
        $data = array(
        'nama_kuliah' => $this->input->post('nama_kuliah'),
        'sks' => $this->input->post('sks')
        );
        $this->db->where('id_matakuliah',$id);
        $this->db->update('matakuliah',$data);
    }

    public function delete($id){
        $this->db->where('id_matakuliah',$id); 
        $this->db->delete('matakuliah'); 
    }
    

}
