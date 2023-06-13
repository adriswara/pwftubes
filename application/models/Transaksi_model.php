<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_model extends CI_Model {

	public function create()
	{
    $data = array(
        'fk_mahasiswa' => $this->input->post('fk_mahasiswa'),
        // 'fk_perkuliahan' => $this->input->post('fk_perkuliahan'),
        'fk_jadwal' => $this->input->post('fk_jadwal'),

    );
    $this->db->insert('transaksi_matakuliah',$data);
        

	}
	public function read()
	{
    //   $query=$this->db->get('transaksi_matakuliah');
        $this->db->select('*');
        $this->db->from('transaksi_matakuliah');
        $this->db->join('mahasiswa','transaksi_matakuliah.fk_mahasiswa = mahasiswa.id_mahasiswa');
        $this->db->join('jadwal','transaksi_matakuliah.fk_jadwal = jadwal.id_jadwal');
        $this->db->join('matakuliah','jadwal.fk_matakuliah = matakuliah.id_matakuliah');
        $this->db->join('dosen','matakuliah.fk_dosen = dosen.id_dosen');
        $this->db->where('transaksi_delete',0);
        if($this->session->userdata('role') != "admin") {
            $this->db->where('nama',$this->session->userdata('nama'));  
        }
        $query= $this->db->get();
        return $query->result();
    }
    
    public function read_by($id)//form edit
	{
        $this->db->where('id_transaksi',$id);
        $query=$this->db->get('transaksi_matakuliah');
        return $query->row();
    }

    public function read_by_jdwl($id)//form edit
	{
        $this->db->where('id_jadwal',$id);
        $query=$this->db->get('jadwal');
        return $query->row();
    }

    public function update($id){
        $data = array(
            'fk_mahasiswa' => $this->input->post('fk_mahasiswa'),
            // 'fk_perkuliahan' => $this->input->post('fk_perkuliahan'),
            'fk_jadwal' => $this->input->post('fk_jadwal'),

        );
        $this->db->where('id_transaksi',$id);
        $this->db->update('transaksi_matakuliah',$data);
    }

    public function delete($id){
        $this->db->where('id_transaksi',$id); 
        $this->db->delete('transaksi_matakuliah'); 
    }
    

}
