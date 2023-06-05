<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen extends CI_Controller {

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
			 $this->load->model('Dosen_model');
			 // Your own constructor code
	 }

	public function index()
	{
		// $this->load->view('welcome_message');
		// $this->load->model('Dosen_model');
		$data['dosens']=$this->Dosen_model->read();
		$this->load->view('dosen/dosen_list',$data);


	}
	public function add()
	{
		if ($this->input->post('submit')) {
			$this->load->model('Dosen_model');
			$this->Dosen_model->create();
			if ($this->db->affected_rows()>0) {
				$this->session->set_flashdata('msg','dosen sucessfully added !');		
			}else {
				$this->session->set_flashdata('msg','dosen gagal added !');		
			}
			redirect('dosen/');
		}
		// $this->load->model('Dosen_model');
		$this->load->view('dosen/dosen_form');
	}
	public function edit($id){
		if ($this->input->post('submit')) {
			$this->Dosen_model->update($id);
			if ($this->db->affected_rows()>0) {
				$this->session->set_flashdata('msg','dosen sucessfully updated !');		
			}else {
				$this->session->set_flashdata('msg','dosen gagal updated !');		
			}
			redirect('dosen/');
		}

		// $this->load->model('Dosen_model');
		$data['dosens']=$this->Dosen_model->read_by($id);
		$this->load->view('dosen/dosen_form',$data);
	}
	public function delete($id){
		$this->Dosen_model->delete($id);
		if ($this->db->affected_rows()>0) {
			$this->session->set_flashdata('msg','dosen sucessfully deleted !');		
		}else {
			$this->session->set_flashdata('msg','dosen gagal deleted !');		
		}
		redirect('dosen/');
	}
}
