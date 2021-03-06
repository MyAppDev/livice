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
			'search_keywords' => $this->Patient->get_all_data(),
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

			$search_patient = '';
			$search_area = '';
			$search_age = '';

			// 名前　スペースをカンマへ変換
			if(isset($_POST['search_patient']) && !empty($_POST['search_patient'])){
				if (strstr($_POST['search_patient'], ' ')) {
				  $search_patient = str_replace(' ', ',', $_POST['search_patient']);
				} else {
				  $search_patient = $_POST['search_patient'];
				}
			}

			// 地域　スペースをカンマへ変換
			if(isset($_POST['search_area']) && !empty($_POST['search_area'])){
				if (strstr($_POST['search_area'], ' ')) {
				  $search_area = str_replace(' ', ',', $_POST['search_area']);
				} else {
				  $search_area = $_POST['search_area'];
				}
			}

			// 年齢計算は要再考のこと
			if(isset($_POST['search_age']) && !empty($_POST['search_age'])){
				$search_age = (date('Ymd') - 10000 * (int)$this->input->post('search_age'));
				$search_age = mb_substr($search_age, 0, 4);
			}

			$conditions = array(
				'search_patient' => $search_patient,
				'search_disease' => $this->input->post('search_disease'),
				'search_medicine' => $this->input->post('search_medicine'),
				'search_area' => $search_area,
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

		 // バリデーション設定
		 $this->form_validation->set_rules('patient_number', '患者番号', 'required');
		 $this->form_validation->set_rules('image', '患者画像', 'required');
		 $this->form_validation->set_rules('age', '生年月日', 'required');
		 $this->form_validation->set_rules('name', '患者氏名', 'required');
		 $this->form_validation->set_rules('name_kana', '患者名カナ', 'required');
		 $this->form_validation->set_rules('area', '地域', 'required');
		 $this->form_validation->set_rules('disease', '病名', 'required');
		 $this->form_validation->set_rules('medicine', '処方薬', 'required');
		 $this->form_validation->set_rules('caution', '注意', 'required');
		 $this->form_validation->set_rules('advice', 'アドバイス', 'required');
		 $this->form_validation->set_rules('generic_drug', 'ジェネリック医薬品', 'required');
		 $this->form_validation->set_rules('health_food', '健康食品', 'required');
		 $this->form_validation->set_rules('data_heartbeat', '1年間の心拍データ', 'required');
		 $this->form_validation->set_rules('data_blood', '1年間の血圧データ', 'required');
		 $this->form_validation->set_rules('data_body_temperature', '1年間の体温データ', 'required');

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
						'advice' => $this->input->post('advice'),
						'generic_drug' => $this->input->post('generic_drug'),
						'health_food' => $this->input->post('health_food'),
						'data_heartbeat' => $this->input->post('data_heartbeat'),
						'data_blood' => $this->input->post('data_blood'),
						'data_body_temperature' => $this->input->post('data_body_temperature'),
					);
					if ($this->form_validation->run() == FALSE){
						hospital_common_view('hospital/hospital_patient_insert_clone', $data);
					}	else {
						$this->load->model('Patient_model', 'Patient');
						$this->Patient->insert_data($data);
						redirect( 'hospital/patient_list' );
					}
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

		$data['page_title'] = str_replace(',', ' ', $data['patient_info'][0]->name)
												.'('.str_replace(',', ' ', $data['patient_info'][0]->name_kana).')';

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
		redirect( 'hospital/patient_details/'
				.$this->input->post('id')
				.'?advice_add=1&date='.date("YmdHis") );
	}

	/**
	 * Ajaxで医師が記入したアドバイスを登録する（実験用）
	 */
	public function async_advice_add($advice){

	}

	/**
	 * Ajaxでアドバイスを読み込む(実験用)
	 */
	public function async_advice_list(){
		$this->load->model('Advice_model', 'Advice');

		$this->Advice->insert_data();
	}

	/**
	 * Ajaxで最新のアドバイスを読み込む
	 * async_get_latest_advice/912345678901
	 */
	public function async_get_latest_advice($patient_number){
		$this->load->model('Advice_model', 'Advice');
		$latest_advice = $this->Advice->get_latest_data($patient_number);
		echo json_encode($latest_advice);
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
