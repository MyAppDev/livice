<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Personal extends CI_Controller {

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
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		 parent::__construct();
		 $this->load->library('dummy');
	}

	public function index()
	{
		$this->load->view('welcome_message');
	}

	/**
	 * ウェアラブルデバイス　ホーム画面
	 */
	public function home(){
		$this->load->view('personal/personal_home');
	}

	/**
	 * ウェアラブルデバイス　時計
	 */
	public function app_time(){
		$this->load->view('personal/personal_app_time');
	}

	/**
	 * ウェアラブルデバイス　アドバイス
	 */
	public function app_advice(){

	}

	/**
	 * ウェアラブルデバイス　ヘルス
	 */
	public function app_health(){

	}

	/**
	 * ウェアラブルデバイス　お薬手帳
	 */
	public function app_medicine_notebook(){

	}
}
