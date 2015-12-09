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
		$this->load->view('personal/personal_index');
	}

	/** 緊急状態管理 */
	public function emergency_operation(){
		$this->load->view('personal/personal_emergency_operation');
	}

	/**
	 * ウェアラブルデバイス　ホーム画面
	 */
	public function home(){
		$this->load->model('Patient_model', 'Patient');
		$this->load->model('Advice_model', 'Advice');

		// 患者ID
		$id = 1;
		// 患者プロフィール
		$data['patient_info'] = $this->Patient->get_target_data($id);

		$this->load->view('personal/personal_home', $data);
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

	/**
	 * iframe テスト　スタブ
	 */
	public function stub_iframe_test(){
		echo "iframe テスト用スタブ";
		echo br(3);
		echo '<a href="'.base_url().'Hospital/hospital_layout_test"> 病院ページへ </a>';
	}
}
