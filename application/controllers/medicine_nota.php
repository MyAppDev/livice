<?php
class medicine_note extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('medicine_note/medicine_note');
		
	}

}

?>