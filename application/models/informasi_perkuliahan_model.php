<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_model extends CI_Model {

	public function create()
	{
    $data = array(
        'judul' => $this->input->post('judul'),
        'tanggal' => $this->input->post('tanggal'),
        'isiPengumuman' => $this->input->post('isiPengumuman')
    );
    $this->db->insert('informasi_matakuliah',$data);
        

	}
	public function read()
	{
    //   $query=$this->db->get('informasi_matakuliah');
        $this->db->select('*');
        $this->db->from('informasi_matakuliah');
        $this->db->join('mahasiswa','informasi_matakuliah.fk_mahasiswa = mahasiswa.id_mahasiswa');
        $this->db->join('matakuliah','informasi_matakuliah.fk_perkuliahan = matakuliah.id_matakuliah');
        $this->db->join('dosen','matakuliah.fk_dosen = dosen.id_dosen');
        $query= $this->db->get();
        return $query->result();
    }
    
    public function read_by($id)//form edit
	{
        $this->db->where('id_transaksi',$id);
        $query=$this->db->get('informasi_matakuliah');
        return $query->row();
    }
    public function update($id){
        $data = array(
            'judul' => $this->input->post('judul'),
            'tanggal' => $this->input->post('tanggal'),
            'isiPengumuman' => $this->input->post('isiPengumuman')
        );
        // $this->db->insert('informasi_matakuliah',$data);
        $this->db->where('id_transaksi',$id);
        $this->db->update('informasi_matakuliah',$data);
    }

    public function delete($id){
        $this->db->where('id_transaksi',$id); 
        $this->db->delete('informasi_matakuliah'); 
    }
    

}
