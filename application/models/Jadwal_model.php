<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal_model extends CI_Model {

	public function create()
	 {
    // $data = array(
    //     'fk_dosen' => $this->input->post('fk_dosen'),
    //     'fk_perkuliahan' => $this->input->post('fk_perkuliahan')
    // );
    $data = array(
        'fk_matakuliah' => $this->input->post('fk_matakuliah'),
        'fk_dosen' => $this->input->post('fk_dosen'),
        'shift_kelas' => $this->input->post('shift_kelas'),
        'hari' => $this->input->post('hari'),
        'jam' => $this->input->post('jam'),
        'lokasi' => $this->input->post('lokasi'),
        'periode_akademik' => $this->input->post('periode_akademik')
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
        $this->db->where('jadwal_delete',0);  
        $query= $this->db->get();
        return $query->result();
    }
    
    public function read_by($id)//form edit
	{
        $this->db->where('id_jadwal',$id);
        $query=$this->db->get('jadwal');
        return $query->row();
    }

    public function read_by_mtkl($id)//form edit
	{
        $this->db->where('fk_matakuliah',$id);
        $query=$this->db->get('jadwal');
        return $query->row();
    }

    public function update($id){
        $data = array(
            'fk_matakuliah' => $this->input->post('fk_matakuliah'),
            'fk_dosen' => $this->input->post('fk_dosen'),
            'shift_kelas' => $this->input->post('shift_kelas'),
            'hari' => $this->input->post('hari'),
            'jam' => $this->input->post('jam'),
            'lokasi' => $this->input->post('lokasi'),
            'periode_akademik' => $this->input->post('periode_akademik'),
        );
        $this->db->where('id_jadwal',$id);
        $this->db->update('jadwal',$data);
    }

    public function delete($id){
        $this->db->where('id_transaksi',$id); 
        $this->db->delete('transaksi_matakuliah'); 
    }
    

}
