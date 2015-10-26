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
	public function make_dummy_log($param = array()){
		// http://localhost/livice/Logger/make_dummy_log?bias_heartbeat_min=30&bias_heartbeat_max=30
		// バイアスの初期値は0
		$bias = array(
				'heartbeat_min' => $this->input->get('bias_heartbeat_min', TRUE) ?: 0,
				'heartbeat_max' => $this->input->get('bias_heartbeat_max', TRUE) ?: 0,
				'calories_min' => $this->input->get('bias_calories_min', TRUE) ?: 0,
				'calories_max' => $this->input->get('bias_calories_max', TRUE) ?: 0,
				'elevation_min' => $this->input->get('bias_elevation_min', TRUE) ?: 0,
				'elevation_max' => $this->input->get('bias_elevation_max', TRUE) ?: 0,
				'blood_min' => $this->input->get('bias_blood_min', TRUE) ?: 0,
				'blood_max' => $this->input->get('bias_blood_max', TRUE) ?: 0,
				'speed_min' => $this->input->get('bias_speed_min', TRUE) ?: 0,
				'speed_max' => $this->input->get('bias_speed_max', TRUE) ?: 0,
		);
		// var_dump($bias);
		$dummy = new Dummy();
		$dummy_logs = array(
			'heartbeat' => $dummy->heartbeat($bias['heartbeat_min'], $bias['heartbeat_max']),	// 心拍
			'calories' => $dummy->calories($bias['calories_min'], $bias['calories_max']),		// カロリー
			'elevation' => $dummy->elevation($bias['elevation_min'], $bias['elevation_max']),	// 高度
			'blood' => $dummy->blood($bias['blood_min'], $bias['blood_max']),					// 血中濃度
			'speed' => $dummy->speed($bias['speed_min'], $bias['speed_max']),					// 速度
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

	/** 1年分のデータを生成する
	 		2016 1/10 までの　1年分
			2015-01-01　
			http://localhost/livice/Logger/dummy_log_generator/2015-02-09/2021-12-04 */
	public function dummy_log_generator($pram_start, $pram_end){
				$start = explode("-", $pram_start);
				$end = explode("-", $pram_end);
				var_dump($start);
				var_dump($end);
				$start_year = $start[0];
				$start_month = $start[1];
				$start_day = $start[2];
				$end_year = $end[0];
				$end_month = $end[1];
				$end_day = $end[2];

				for($cnt_y=$start_year; $cnt_y<=$end_year; $cnt_y++){
					switch ($cnt_y) {
						case $start_year:// 開始年
							for($cnt_m=$start_month; $cnt_m<=12; $cnt_m++){
									echo	date('Y-m-d', mktime(0, 0, 0, $cnt_m+1, 0, $cnt_y));
									echo br(1);
							}
							break;
						case $end_year:// 終了年
							for($cnt_m=1; $cnt_m<=$end_month; $cnt_m++){
									echo	date('Y-m-d', mktime(0, 0, 0, $cnt_m+1, 0, $cnt_y));
									echo br(1);
							}
							break;
						default:// 間の年
							for($cnt_m=1; $cnt_m<=12; $cnt_m++){
									$tmp_date = date('Y-m-d', mktime(0, 0, 0, $cnt_m+1, 0, $cnt_y));
									echo	$tmp_date;
									echo br(1);
									$tmp_end = explode("-", $tmp_date);
									echo $tmp_end[2];
									echo br(1);
									// Todo・・・・・・
							}
							break;
					}
					echo br(1);

				}




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
