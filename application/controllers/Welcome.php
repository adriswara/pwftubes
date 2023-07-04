<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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

	/**
	* 
	* @deprecated
	* 
	*/
	 public function __construct()
	 {
			 parent::__construct();
			 $this->load->library('form_validation');
			 $this->load->model('Mahasiswa_model');
			 $this->load->model('Matkul_model');
			 // Your own constructor code
	 }

	public function index()
	{
		// $this->load->view('welcome_message');
		// $this->load->model('Cats_model');
		//$data['cats']=$this->Cats_model->read();
		if(! $this->session->userdata('username')) redirect('auth/login');
		$this->load->view('home');


	}
	public function add()
	{
		if ($this->input->post('submit')) {
			$this->load->model('Mahasiswa_model');
			$this->Mahasiswa_model->create();
			if ($this->db->affected_rows()>0) {
				$this->session->set_flashdata('msg','Mahasiswa sucessfully added !');		
			}else {
				$this->session->set_flashdata('msg','Mahasiswa gagal added !');		
			}
			redirect('');
		}
		// $this->load->model('Cats_model');
		// $data['categori'] = $this->Categori_model->read();
		$this->load->view('cats/cat_form');
	}
	public function edit($id){
		if ($this->input->post('submit')) {
			$this->Mahasiswa_model->update($id);
			if ($this->db->affected_rows()>0) {
				$this->session->set_flashdata('msg','Mahasiswa sucessfully updated !');		
			}else {
				$this->session->set_flashdata('msg','Mahasiswa gagal updated !');		
			}
			redirect('');
		}

		// $this->load->model('Cats_model');
		$data['mahasiswa']=$this->Mahasiswa_model->read_by($id);
		// $data['categori'] = $this->Categori_model->read();
		$this->load->view('cats/cat_form',$data);
	}
	public function delete($id){
	// $this->Cats_model->delete($id);
	$this->db->set('mahasiswa_delete', 1);
	$this->db->where('id_mahasiswa', $id);
	$this->db->update('mahasiswa');
		if ($this->db->affected_rows()>0) {
			$this->session->set_flashdata('msg','Mahasiswa sucessfully deleted !');		
		}else {
			$this->session->set_flashdata('msg','Mahasiswa gagal deleted !');		
		}
		redirect('');
	}

	
	public function sale($id){

		if ($this->input->post('submit')) {
			$this->Mahasiswa_model->sale($id);
			if ($this->db->affected_rows()>0) {
				$this->session->set_flashdata('msg','Mahasiswa Sold Sucess');
			}else {
				$this->session->set_flashdata('msg','Mahasiswa Sold Failed');
			}
			redirect('');
		}

		$data['mahasiswa']=$this->Mahasiswa_model->read_by($id);
		$this->load->view('cats/cat_sales',$data);
	}

	public function sales(){
		$data['sales']=$this->mahasiswa_model->sales();
		$this->load->view('cats/sale_list',$data);
	}

}
