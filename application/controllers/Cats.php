<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cats extends CI_Controller {

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
			 $this->load->model('Cats_model');
			 // Your own constructor code
	 }

	public function index()
	{
		// $this->load->view('welcome_message');
		// $this->load->model('Cats_model');
		$data['cats']=$this->Cats_model->read();
		$this->load->view('cats/cat_list',$data);


	}
	public function add()
	{
		if ($this->input->post('submit')) {
			$this->load->model('Cats_model');
			$this->Cats_model->create();
			if ($this->db->affected_rows()>0) {
				$this->session->set_flashdata('msg','Cat sucessfully added !');		
			}else {
				$this->session->set_flashdata('msg','Cat gagal added !');		
			}
			redirect('Cats/');
		}
		// $this->load->model('Cats_model');
		$this->load->view('cats/cat_form');
	}
	public function edit($id){
		if ($this->input->post('submit')) {
			$this->Cats_model->update($id);
			if ($this->db->affected_rows()>0) {
				$this->session->set_flashdata('msg','Cat sucessfully updated !');		
			}else {
				$this->session->set_flashdata('msg','Cat gagal updated !');		
			}
			redirect('Cats/');
		}

		// $this->load->model('Cats_model');
		$data['cat']=$this->Cats_model->read_by($id);
		$this->load->view('cats/cat_form',$data);
	}
	public function delete($id){
		// $this->Cats_model->delete($id);
		$this->db->set('mahasiswa_delete', 1);
		$this->db->where('id_mahasiswa', $id);
		$this->db->update('mahasiswa');
		if ($this->db->affected_rows()>0) {
			$this->session->set_flashdata('msg','Cat sucessfully deleted !');		
		}else {
			$this->session->set_flashdata('msg','Cat gagal deleted !');		
		}
		redirect('Cats/');
	}

	public function reset($userid){
        $user = $this->Cats_model->read_by($userid);
        $this->Cats_model->reset($userid,$user);
        if($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('msg','<p style="color:green">Password Successfully Reset !</p>');
        } else {
            $this->session->set_flashdata('msg','<p style="color:red">Password Reset Failed !</p>');
        }
        redirect('Cats/');
    }


}
