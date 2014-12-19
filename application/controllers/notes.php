<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Notes extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('note');  
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		date_default_timezone_set('America/Los_Angeles'); 
//		$this->output->enable_profiler();
	}

	public function index()
	{
		$notes['notes']=$this->note->get_all_notes();
		$this->load->view('note_page',$notes);

	}

	public function load(){
		$notes['notes']=$this->note->get_all_notes();
		$this->load->view('note_partial',$notes);		
	}

	public function add(){
		$note=$this->input->post();
		$this->note->add_note($note);
		$this->load();
	}

	public function delete(){
		$note=$this->input->post();
		$this->note->delete_note_by_id($note);
		$this->load();
	}

	public function edit(){
		$note=$this->input->post();
		$this->note->edit_note_by_id($note);
		$this->load();	
	}
}
