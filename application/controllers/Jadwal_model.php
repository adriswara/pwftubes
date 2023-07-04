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
	public function read($limit, $start)
	{
    //   $query=$this->db->get('transaksi_matakuliah');
        $this->db->limit($limit, $start);
		$this->db->select('*');
        $this->db->from('jadwal');
        $this->db->join('matakuliah','jadwal.fk_matakuliah = matakuliah.id_matakuliah');
        if($this->session->userdata('role') != "admin") {
            $this->db->join('transaksi_matakuliah','transaksi_matakuliah.fk_jadwal = jadwal.id_jadwal');
            $this->db->join('mahasiswa','transaksi_matakuliah.fk_mahasiswa = mahasiswa.id_mahasiswa');
        }  
        $this->db->join('dosen','jadwal.fk_dosen = dosen.id_dosen');
        $this->db->where('jadwal_delete',0);
        if($this->session->userdata('role') != "admin" && $this->session->userdata('role') != null) {
            $this->db->where('nama',$this->session->userdata('nama'));  
        }  
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
