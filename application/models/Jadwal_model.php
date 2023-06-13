<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal_model extends CI_Model {

	public function create()
	{
    $data = array(
        'fk_dosen' => $this->input->post('fk_dosen'),
        'fk_perkuliahan' => $this->input->post('fk_perkuliahan')
    );
    $this->db->insert('jadwal',$data);
        

	}
	public function read()
	{
    //   $query=$this->db->get('transaksi_matakuliah');
        $this->db->select('*');
        $this->db->from('jadwal');
        $this->db->join('matakuliah','jadwal.fk_matakuliah = matakuliah.id_matakuliah');
        $this->db->join('dosen','matakuliah.fk_dosen = dosen.id_dosen');
        $query= $this->db->get();
        return $query->result();
    }
    
    public function read_by($id)//form edit
	{
        $this->db->where('id_jadwal',$id);
        $query=$this->db->get('jadwal');
        return $query->row();
    }
    public function update($id){
        $data = array(
            'fk_dosen' => $this->input->post('fk_dosen'),
            'fk_perkuliahan' => $this->input->post('fk_perkuliahan')
        );
        $this->db->where('id_transaksi',$id);
        $this->db->update('transaksi_matakuliah',$data);
    }

    public function delete($id){
        $this->db->where('id_transaksi',$id); 
        $this->db->delete('transaksi_matakuliah'); 
    }
    

}
