<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logger extends CI_Controller {

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

	/** ダミーログをDBへ保存しJSONで出力 */
	public function make_dummy_log(){
		$dummy = new Dummy();
		$dummy_logs = array(
			'heartbeat' => $dummy->heartbeat(),	// 心拍
			'calories' => $dummy->calories(),		// カロリー
			'elevation' => $dummy->elevation(),	// 高度
			'blood' => $dummy->blood(),					// 血中濃度
			'speed' => $dummy->speed(),					// 速度
		);
		//var_dump($dummy_logs);
		$this->load->model('dummy_log_model', 'DummyLog', TRUE);
		// SQLite3へ書き込み
		$this->DummyLog->insert_dummy_data($dummy_logs);

		echo json_encode($dummy_logs);
	}

	/** 指定された時刻のデータをJSONで出力 */
	public function curr_dummy_log(){
			$this->load->model('dummy_log_model', 'DummyLog', TRUE);
			$result = $this->DummyLog->get_latest_data();
			// var_dump($result);
			echo json_encode($result);
	}

	/** 初期用データ */
	public function init_dummy_log($num){
			$this->load->model('dummy_log_model', 'DummyLog', TRUE);
			$latest_data = $this->DummyLog->get_latest_data();
			// var_dump($latest_data);
			$target = (int)$latest_data[0]->id - $num;
			$result = $this->DummyLog->get_target_dummy_data($target);
			// var_dump($result);
			echo json_encode($result);
	}



	/** 動作テスト */
	public function test(){
		$dummy = new Dummy();
		echo $dummy->heartbeat();
		echo '<br>';
		echo base_url();
		echo '<br>';
		echo base_url().'css/bootstrap.css';
		echo '<br>';
		echo base_url('css/bootstrap.css');
		echo '<br>';
		echo base_url('assets/css/bootstrap.css');
		//echo br(1);
		echo '<br>';
		//echo link_tag('css/bootstrap.css');
		echo '<link href="/css/bootstrap.css" rel="stylesheet" type="text/css" />';
	}

	/** bootstrap 動作テスト */
	public function bootstrap_twitter(){
			echo APPPATH;
			echo '<br>';
			echo BASEPATH;
			echo '<br>';
			echo VIEWPATH;
			$this->load->view('bootstrap_twitter');
	}

	/** データベース　動作テストs */
	public function sqlites_test(){
			echo 'DBtest';

			$dummy = new Dummy();
			$dummy_logs = array(
				'heartbeat' => $dummy->heartbeat(),	// 心拍
				'calories' => $dummy->calories(),		// カロリー
				'elevation' => $dummy->elevation(),	// 高度
				'blood' => $dummy->blood(),					// 血中濃度
				'speed' => $dummy->speed(),					// 速度
			);
			//var_dump($dummy_logs);
			echo json_encode($dummy_logs);

			$this->load->model('dummy_log_model', 'DummyLog', TRUE);
			// 書き込み
			$this->DummyLog->insert_dummy_data($dummy_logs);

			// 表示
			$data = $this->DummyLog->get_all_data();
			var_dump($data);
	}


	/** Highcharts-4.1.8/examples/dynamic-update 動作テスト */
	public function hc_dynamic_update(){
		$this->load->view('dynamic-update');
	}

	/** 時刻テスト */
	public function time_test(){
		date_default_timezone_set('Asia/Tokyo');
		echo br();
		$datestring = "Year: %Y Month: %m Day: %d - %h:%i %a";
		$datestring = "%Y:%m:%d:%H:%i:%s";
		$time = time();

		echo mdate($datestring, $time);
	}

	/** 個人用ダッシュボード */
	public function personal_dashboard(){
		$this->load->view('personal/personal_dashboard');
	}

	/** 個人用ダッシュボード */
	public function hospital_dashboard(){
		$this->load->view('hospital/hospital_dashboard');
	}





}
