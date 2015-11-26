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
		$this->load->view('personal/personal_index');
	}

	/** 個人用ダッシュボード */
	public function personal_dashboard(){
		$this->load->view('personal/personal_dashboard');
	}

	/** 個人用ダッシュボード */
	public function hospital_dashboard(){
		$this->load->view('hospital/hospital_dashboard');
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
			http://localhost/livice/Logger/dummy_log_generator/2015-01-10/2016-01-10
			1465件/25.0960秒 				*/
	public function dummy_log_generator($pram_start, $pram_end){
				$this->benchmark->mark('start');
				$this->load->model('dummy_log_model', 'DummyLog', TRUE);
				$this->load->model('daily_dummy_log_model', 'DailyDummyLog', TRUE);
				$dummy = new Dummy();

				// log_generator()から吐き出される配列は以下の構造
				// array
				//   2015 =>
				//     array
				//       2 =>
				//         array
				//           0 => int 9
				//           1 => int 10
				//           2 => int 11
				//           3 => int 12
				//           4 => int 13
				//               ：
				// 							 ：
				// 							 ：
				$structure = $dummy->log_generator($pram_start, $pram_end);

				$counter = 1;
				foreach ($structure as $year => $month) {// 年ループ
					foreach ($month as $days_key => $days_value) {// 月ループ
						foreach ($days_value as $day) {// 日ループ
							for($cnt=1; $cnt<=4; $cnt++){// ユーザー分のループ
								$daily_dummy_logs = array(
									'user' => $cnt,
									'heartbeat' => $dummy->heartbeat(),	// 心拍
									'calories' => $dummy->calories(),		// カロリー
									'elevation' => $dummy->elevation(),	// 高度
									'blood' => $dummy->blood(),					// 血中濃度
									'speed' => $dummy->speed(),					// 速度
									'created' => date("Y:m:d", mktime(0, 0, 0, $days_key, $day, $year)),
								);
								// DBへ書き込み
								$this->DailyDummyLog->insert_daily_dummy_data($daily_dummy_logs);
								$counter++;
							}
						}
					}
				}
				//var_dump($structure);
				echo $counter.'件のデータ登録に成功しました';
				echo br(1);
				$this->benchmark->mark('end');
				echo $this->benchmark->elapsed_time('start', 'end').'秒で処理が完了しました';
	}

	/** 年間データを取得しJSONで返す
	 		期間を指定する
			http://localhost/livice/Logger/yearly_transition/2015:01:10/2016:01:10　　　　　*/
	public function yearly_transition($prm_start='', $prm_end=''){
		$this->load->model('dummy_log_model', 'DummyLog', TRUE);
		$this->load->model('daily_dummy_log_model', 'DailyDummyLog', TRUE);

		$result = $this->DailyDummyLog->get_yearly_transition(1, $prm_start, $prm_end);
		//var_dump($result);
		// $this->load->view('assets/js/personal/personal_dashboard_yearly_transition', $result);
		echo json_encode($result);
	}

	/** ーーーーーーーーー以下、動作テストーーーーーーーー */
	/** Highcharts-4.1.8/examples/dynamic-update 動作テスト */
	public function hc_dynamic_update(){
		$this->load->view('dynamic-update');
	}

	/** Highcharts-4.1.8/examples/combo 動作テスト */
	public function hc_combo(){
		$this->load->view('combo');
	}

	/** 動作テスト用メソッド */
	public function test(){
		$this->benchmark->mark('dog');
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
		echo br(1);
		echo APPPATH;
		echo '<br>';
		echo BASEPATH;
		echo '<br>';
		echo VIEWPATH;

		$this->benchmark->mark('cat');

		echo $this->benchmark->elapsed_time('dog', 'cat');
	}

	/** bootstrap 動作テスト */
	public function bootstrap_twitter(){
			$this->load->view('bootstrap_twitter');
	}

	/** データベース　動作テスト */
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

	/** 時刻テスト */
	public function time_test(){
		date_default_timezone_set('Asia/Tokyo');
		echo br();
		$datestring = "Year: %Y Month: %m Day: %d - %h:%i %a";
		$datestring = "%Y:%m:%d:%H:%i:%s";
		$time = time();

		echo mdate($datestring, $time);
	}







}
