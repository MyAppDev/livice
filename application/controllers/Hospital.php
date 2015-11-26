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
		 $this->load->library(array('dummy', 'hospitalanalysis'));
	}

	public function index()
	{
		$this->load->view('personal/personal_index');
	}

	/**
	 *  患者リスト
	 *	・上部に緊急な患者を表示
	 *	・患者検索
	 *		患者名、患者カナ、患者病名、薬剤名
	 *
	 */
	public function patient_list(){
		$this->load->model('Patient_model', 'Patient');
		// 共通レイアウトロード
		$this->load->helper(array('common_layout_helper'));
		// 共通レイアウトへ設定する値
		$data = array(
			'page_title' => '患者リスト',
			'meta_title'=> 'patient_list',
		);

		if(!isset($_POST['search_submit'])){// 全件
			$data['patient_list'] = $this->Patient->get_all_data();
			$conditions = array(
				'search_patient' => '',
				'search_disease' => '',
				'search_medicine' => '',
				'search_area' => '',
				'search_age' => '',
			);
			// $data['search_key'] = $conditions;
		} else {// 条件検索
			$conditions = null;
			$search_age = '';

			// 年齢計算は要再考のこと
			if(isset($_POST['search_age']) && !empty($_POST['search_age'])){
				$search_age = (date('Ymd') - 10000 * (int)$this->input->post('search_age'));
				$search_age = mb_substr($search_age, 0, 4);
			}

			$conditions = array(
				'search_patient' => $this->input->post('search_patient'),
				'search_disease' => $this->input->post('search_disease'),
				'search_medicine' => $this->input->post('search_medicine'),
				'search_area' => $this->input->post('search_area'),
				// 'search_age' => (int)(date('Ymd') - 10000 * $this->input->post('search_age')),
				'search_age' => $search_age,
			);

			$data['patient_list'] = $this->Patient->get_conditions_data($conditions);
		}
		hospital_common_view('hospital/hospital_patient_list_clone', $data);
	}

	/**
	 * 患者登録
	 * 登録後は患者リストへ遷移
	 */
	 public function patient_insert(){
		 // 共通レイアウトロード
		 $this->load->helper(array('common_layout_helper'));

		 // 共通レイアウトへ設定する値
		 $data = array(
			 'page_title' => '患者登録',
			 'meta_title'=> 'patient_insert',
		 );

			if ( ! isset($_POST['sub'])){// 入力フォーム表示
					// $this->load->view('hospital/hospital_patient_insert');
					hospital_common_view('hospital/hospital_patient_insert_clone', $data);
			} else {// 登録処理
					$data = array(
						'patient_number' => $this->input->post('patient_number'),
						'image' => $this->input->post('image'),
						'age' => $this->input->post('age'),
						'name' => $this->input->post('name'),
						'name_kana' => $this->input->post('name_kana'),
						'area' => $this->input->post('area'),
						'disease' => $this->input->post('disease'),
						'medicine' => $this->input->post('medicine'),
						'caution' => $this->input->post('caution'),
					);
					$this->load->model('Patient_model', 'Patient');
					$this->Patient->insert_data($data);
					redirect( 'hospital/patient_list' );
			}
	 }

	/**
	 *	患者詳細
	 *		患者名、患者カナ、患者生年月日、病名、薬剤名、病歴、
	 *		心拍、体温、消費カロリー、
	 *		複数データはカンマ区切りで保存
	 *
	 */
	public function patient_details($id){
		$this->load->model('Patient_model', 'Patient');
		$this->load->model('Advice_model', 'Advice');
		// 共通レイアウトロード
		$this->load->helper(array('common_layout_helper'));
		// 共通レイアウトへ設定する値
		$data = array(
			'page_title' => '患者詳細',
			'meta_title'=> 'patient_details',
		);

		// 患者プロフィール
		$data['patient_info'] = $this->Patient->get_target_data($id);

		// 分析処理
		$ha = new HospitalAnalysis();
		$biological_information = array(
			'heartbeat' => $data['patient_info'][0]->data_heartbeat,
			'body_temperature' => $data['patient_info'][0]->data_body_temperature,
			'blood_pressure' => $data['patient_info'][0]->data_blood,
		);
		$data['analysis_message'] = $ha->diseaseSignsPrediction($biological_information);

		// 医師からのアドバイス
		$data['advice'] = $this->Advice->find_by_patient_number($data['patient_info'][0]->patient_number);

		hospital_common_view('hospital/hospital_patient_details_clone', $data);
	}

	/**
	 * 医師からのアドバイスを登録する
	 */
	public function advice_add(){
		$this->load->model('Advice_model', 'Advice');
		$data = array(
			'patient_number' => $this->input->post('patient_number'),
      'advice' => $this->input->post('advice'),
      'doctor' => '',
      'generic_drug' => '',
      'health_food' => '',
      'checked' => 0,
      'created' => date("YmdHis"),
      'modified' => date("YmdHis"),
		);
		$this->Advice->insert_data($data);
		redirect( 'hospital/patient_details/'.$this->input->post('id') );
	}

	/**
	 * Ajaxで医師が記入したアドバイスを登録する（実験用）
	 */
	public function async_advice_add($advice){

	}

	/**
	 * Ajaxでアドバイスを読み込む(実験用)
	 *
	 */
	public function async_advice_list(){
		$this->load->model('Advice_model', 'Advice');

		$this->Advice->insert_data();
	}



	/**
	 *  病院用ダッシュボードのレイアウトテスト
	 *
	 */
	 public function hospital_layout_test(){
		 $this->load->view('hospital/hospital_dashboard_layout_test');
	 }

	 /**
	  *  レイアウトヘルパーテスト
		*/
		public function layout_helper_test(){
				// 共通レイアウトロード
				$this->load->helper(array('common_layout_helper'));

				// 画面表示
				$data['items'] = array(
					'root' => 'ROOT',
					'hoge' => 'HOGE'
				);
				$data['page_title'] = "ページタイトル";
				hospital_common_view('hospital/hospital_index', $data);
		}

}
