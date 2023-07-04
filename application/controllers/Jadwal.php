<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class jadwal extends CI_Controller {

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
			 $this->load->model('jadwal_model');
			 $this->load->model('Categori_model');
			 $this->load->model('Cats_model');
			 $this->load->model('Transaksi_model');
			 // Your own constructor code
	 }

	public function index()
	{
		$this->load->library('pagination');
		$config['base_url'] = site_url('jadwal/index');
		$config['total_rows'] = $this->db->count_all('jadwal');
		$config['per_page'] = 10;
		
		$config['full_tag_open'] = '<ul class="pagination ">';        
		$config['full_tag_close'] = '</ul>';        
		$config['first_link'] = 'First';        
		$config['last_link'] = 'Last';        
		$config['first_tag_open'] = '<li class="page-item"><span class="page-link">';        
		$config['first_tag_close'] = '</span></li>';        
		$config['prev_link'] = '&laquo';        
		$config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';        
		$config['prev_tag_close'] = '</span></li>';        
		$config['next_link'] = '&raquo';        
		$config['next_tag_open'] = '<li class="page-item"><span class="page-link">';        
		$config['next_tag_close'] = '</span></li>';        
		$config['last_tag_open'] = '<li class="page-item"><span class="page-link">';        
		$config['last_tag_close'] = '</span></li>';        
		$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';        
		$config['cur_tag_close'] = '</a></li>';        
		$config['num_tag_open'] = '<li class="page-item"><span class="page-link">';        
		$config['num_tag_close'] = '</span></li>';
		
		
		$this->pagination->initialize($config);

		$limit=$config['per_page'];
		$start=$this->uri->segment(3)?$this->uri->segment(3):0;
		$data["links"] = $this->pagination->create_links();
		$data['i']=$start+1;
		//$data['cats']=$this->Cats067_model->read($limit,$start);
		//$this->load->view('cats067/cat_list_067', $data);
		// $this->load->view('welcome_message');
		// $this->load->model('jadwal_model');
		$data['jadwals']=$this->jadwal_model->read($limit, $start);
		$this->load->view('jadwal/jadwal_list',$data);


	}
	public function add()
	{
		if ($this->input->post('submit')) {
			$this->load->model('jadwal_model');
			$this->jadwal_model->create();
			redirect('jadwal/');
		}
		// $this->load->model('jadwal_model');
		$data['mahasiswa']=$this->Cats_model->read();
		$data['kuliah']=$this->Categori_model->read();
		$this->load->view('jadwal/jadwal_form',$data);
	}
	public function edit($id){
		if ($this->input->post('submit')) {
			$this->jadwal_model->update($id);
			redirect('jadwal/');
		}

		// $this->load->model('jadwal_model');

		$data['jadwals']=$this->jadwal_model->read_by($id);
		$data['mahasiswa']=$this->Cats_model->read();
		$data['kuliah']=$this->Categori_model->read();
		$data['jadwal']=$this->Categori_model->read();
		$this->load->view('jadwal/jadwal_form',$data);
	}
	public function delete($id){
		// $this->jadwal_model->delete($id);
		$this->db->set('jadwal_delete', 1);
		$this->db->where('id_jadwal', $id);
		$this->db->update('jadwal');
		redirect('');
	}
}
