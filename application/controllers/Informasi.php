<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Informasi extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */

	 public function __construct()
	 {
			 parent::__construct();
			 $this->load->model('Informasi_perkuliahan_model');
			 // Your own constructor code
	 }

	public function index()
	{
		// $this->load->view('welcome_message');
		// $this->load->model('Informasi_perkuliahan_model');
		$data['informasis']=$this->Informasi_perkuliahan_model->read();
		$this->load->view('informasi_perkuliahan/informasi_perkuliahan_list',$data);


	}
	public function add()
	{
		if ($this->input->post('submit')) {
			$this->load->model('Informasi_perkuliahan_model');
			$this->Informasi_perkuliahan_model->create();
			if ($this->db->affected_rows()>0) {
				$this->session->set_flashdata('msg','informasi_perkuliahan sucessfully added !');		
			}else {
				$this->session->set_flashdata('msg','informasi_perkuliahan gagal added !');		
			}
			redirect('Informasi/');
		}
		// $this->load->model('Informasi_perkuliahan_model');
		$this->load->view('informasi_perkuliahan/informasi_perkuliahan_form');
	}
	public function edit($id){
		if ($this->input->post('submit')) {
			$this->Informasi_perkuliahan_model->update($id);
			if ($this->db->affected_rows()>0) {
				$this->session->set_flashdata('msg','informasi_perkuliahan sucessfully updated !');		
			}else {
				$this->session->set_flashdata('msg','informasi_perkuliahan gagal updated !');		
			}
			redirect('Informasi/');
		}

		// $this->load->model('Informasi_perkuliahan_model');
		$data['informasis']=$this->Informasi_perkuliahan_model->read_by($id);
		$this->load->view('informasi_perkuliahan/informasi_perkuliahan_form',$data);
	}
	public function delete($id){
		// $this->Informasi_perkuliahan_model->delete($id);
		$this->db->set('informasi_delete', 1);
		$this->db->where('id_informasi', $id);
		$this->db->update('informasi_perkuliahan');
		if ($this->db->affected_rows()>0) {
			$this->session->set_flashdata('msg','informasi_perkuliahan sucessfully deleted !');		
		}else {
			$this->session->set_flashdata('msg','informasi_perkuliahan gagal deleted !');		
		}
		redirect('Informasi/');
	}
}
