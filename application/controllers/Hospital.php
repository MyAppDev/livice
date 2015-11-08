<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hospital extends CI_Controller {

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
	 *  患者リスト
	 *	・上部に緊急な患者を表示
	 *	・患者検索
	 *		患者名、患者カナ、患者病名、薬剤名
	 *
	 */
	public function patient_list(){
		



		$this->load->view('hospital/hospital_patient_list');
	}

	/**
	 *	患者詳細
	 *		患者名、患者カナ、患者生年月日、病名、薬剤名、病歴、
	 *		心拍、体温、消費カロリー、
	 *		複数データはカンマ区切りで保存
	 *
	 */
	public function patient_details(){
		$this->load->view('hospital/hospital_patient_details');
	}
}
