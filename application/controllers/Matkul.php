<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Matkul extends CI_Controller {

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
			 $this->load->model('Matkul_model');
			 // Your own constructor code
	 }

	public function index()
	{
		// $this->load->view('welcome_message');
		// $this->load->model('Categori_model');
		$data['categories']=$this->Matkul_model->read();
		$this->load->view('categori/categori_list',$data);


	}
	public function add()
	{
		if ($this->input->post('submit')) {
			$this->load->model('Matkul_model');
			$this->Matkul_model->create();
			redirect('matkul');
		}
		// $this->load->model('Categori_model');
		$this->load->view('categori/categori_form');
	}
	public function edit($id){
		if ($this->input->post('submit')) {
			$this->Matkul_model->update($id);
			redirect('matkul');
		}

		// $this->load->model('Categori_model');
		$data['categori']=$this->Matkul_model->read_by($id);
		$this->load->view('categori/categori_form',$data);
	}
	public function delete($id){
		$this->db->set('matakuliah_delete', 1);
		$this->db->where('id_matakuliah', $id);
		$this->db->update('matakuliah');
		// $this->Categori_model->delete($id);
		redirect('');
	}
}
