<?php
class health_check extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('health_check/health_check');
		
	}

}

?>