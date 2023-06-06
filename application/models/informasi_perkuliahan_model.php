<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Informasi_perkuliahan_model extends CI_Model {

	public function create()
	{
    $data = array(
        'judul' => $this->input->post('judul'),
        'tanggal' => $this->input->post('tanggal'),
        'isiPengumuman' => $this->input->post('isiPengumuman')
    );
    $this->db->insert('informasi_perkuliahan',$data);
        

	}
	public function read()
	{
    //   $query=$this->db->get('informasi_perkuliahan');
        $this->db->select('*');
        $this->db->from('informasi_perkuliahan');
        // $this->db->join('mahasiswa','informasi_perkuliahan.fk_mahasiswa = mahasiswa.id_mahasiswa');
        // $this->db->join('matakuliah','informasi_perkuliahan.fk_perkuliahan = matakuliah.id_matakuliah');
        // $this->db->join('dosen','matakuliah.fk_dosen = dosen.id_dosen');
        $query= $this->db->get();
        return $query->result();
    }
    
    public function read_by($id)//form edit
	{
        $this->db->where('id_informasi',$id);
        $query=$this->db->get('informasi_perkuliahan');
        return $query->row();
    }
    public function update($id){
        $data = array(
            'judul' => $this->input->post('judul'),
            'tanggal' => $this->input->post('tanggal'),
            'isiPengumuman' => $this->input->post('isiPengumuman')
        );
        // $this->db->insert('informasi_perkuliahan',$data);
        $this->db->where('id_informasi',$id);
        $this->db->update('informasi_perkuliahan',$data);
    }

    public function delete($id){
        $this->db->where('id_informasi',$id); 
        $this->db->delete('informasi_perkuliahan'); 
    }
    

}
