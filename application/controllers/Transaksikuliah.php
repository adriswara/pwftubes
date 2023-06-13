<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class transaksikuliah extends CI_Controller {

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
			 $this->load->model('Transaksi_model');
			 $this->load->model('Categori_model');
			 $this->load->model('Cats_model');
			 $this->load->model('Jadwal_model');

			 // Your own constructor code
	 }

	public function index()
	{
		// $this->load->view('welcome_message');
		// $this->load->model('Transaksi_model');
		$data['transaksi']=$this->Transaksi_model->read();
		$this->load->view('transaksikuliah/transaksi_list',$data);


	}
	public function add()
	{
		if ($this->input->post('submit')) {
			$this->load->model('Transaksi_model');
			$this->Transaksi_model->create();
			redirect('Transaksikuliah/');
		}
		// $this->load->model('Transaksi_model');
		$data['mahasiswa']=$this->Cats_model->read();
		$data['kuliah']=$this->Categori_model->read();
		$data['jadwal']=$this->Jadwal_model->read();
		$this->load->view('Transaksikuliah/transaksi_form',$data);
	}
	public function edit($id){
		if ($this->input->post('submit')) {
			$this->Transaksi_model->update($id);
			redirect('Transaksikuliah/');
		}

		// $this->load->model('Transaksi_model');

		$data['transaksi']=$this->Transaksi_model->read_by($id);
		$data['mahasiswa']=$this->Cats_model->read();
		$data['kuliah']=$this->Categori_model->read();
		$this->load->view('Transaksikuliah/transaksi_form',$data);
	}
	public function delete($id){
		$this->Transaksi_model->delete($id);
		redirect('');
	}
}
