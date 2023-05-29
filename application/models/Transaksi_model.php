<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_model extends CI_Model {

	public function create()
	{
    $data = array(
        'fk_mahasiswa' => $this->input->post('fk_mahasiswa'),
        'fk_perkuliahan' => $this->input->post('fk_perkuliahan')
    );
    $this->db->insert('transaksi_matakuliah',$data);
        

	}
	public function read()
	{
      $query=$this->db->get('transaksi_matakuliah');
        return $query->result();
    }
    
    public function read_by($id)
	{
        $this->db->where('id_transaksi',$id);
        $query=$this->db->get('transaksi_matakuliah');
        return $query->row();
    }
    public function update($id){
        $data = array(
        'nama' => $this->input->post('nama'),
        'sks' => $this->input->post('sks')
        );
        $this->db->where('id_transaksi',$id);
        $this->db->update('transaksi_matakuliah',$data);
    }

    public function delete($id){
        $this->db->where('id_transaksi',$id); 
        $this->db->delete('transaksi_matakuliah'); 
    }
    

}
