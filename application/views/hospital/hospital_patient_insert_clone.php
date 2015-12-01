<!------------------------------------------------------
		head,bodyは必要ありません
		必要なjavascriptとcssをロードを先頭に記述して下さい
---------------------------------------------------------->
<!-- jQuery -->
<!--script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script-->
<script type="text/javascript" src="<?= base_url(); ?>assets/js/jquery-1.11.3.min.js"></script>

<!-- bxSlider -->
<link type="text/css"  href="<?= base_url(); ?>assets/css/jquery.bxslider.css" rel="stylesheet">
<script type="text/javascript" src="<?= base_url(); ?>assets/js/jquery.bxslider.js"></script>

<!-- highcharts -->
<script type="text/javascript" src="<?= base_url(); ?>assets/js/highcharts.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/js/modules/exporting.js"></script>

<!-- bootstrap -->
<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/bootstrap.min.css" >
<script type="text/javascript" src="<?= base_url(); ?>assets/js/bootstrap.min.js"></script>

<!--hospital_dashboard -->
<script type="text/javascript" src="<?= base_url(); ?>assets/js/hospital/hospital_dashboard.js"></script>

<!--hospital_dashboard_dummy_user -->
<script type="text/javascript" src="<?= base_url(); ?>assets/js/hospital/hospital_dashboard_dummy_user_1.js"></script>

<style type="text/css">
		table {
			margin-left:5px;
		}

	th {
		font-size: 18px;
		text-align: left;
	}

	td {
		padding-top:10px;
		padding-left:30px;
	}

	.btn1 {
		margin-top:10px;
		margin-left:455px;
	}

</style>

<?php
	/** フォーム用パラメータ */
	$param_form = array(
		'id' => '',
		'class' => ''
	);
	$param_patient_number = array(
		'id' => 'patient_number',
		'class' => '',
		'name'  => 'patient_number',
    'value' => set_value('patient_number'),
	);
	$param_image = array(
		'id' => 'image',
		'class' => '',
		'name'  => 'image',
    'value' => set_value('image'),
	);
	$param_age = array(
		'id' => 'age',
		'class' => '',
		'name'  => 'age',
    'value' => set_value('age'),
	);
	$param_name = array(
		'id' => 'name',
		'class' => '',
		'name'  => 'name',
    'value' => set_value('name'),
	);
	$param_name_kana = array(
		'id' => 'name_kana',
		'class' => '',
		'name'  => 'name_kana',
    'value' => set_value('name_kana'),
	);
	$param_area = array(
		'id' => 'area',
		'class' => '',
		'name'  => 'area',
    'value' => set_value('area'),
	);
	$param_disease = array(
		'id' => 'disease',
		'class' => '',
		'name'  => 'disease',
    'value' => set_value('disease'),
	);
	$param_medicine = array(
		'id' => 'medicine',
		'class' => '',
		'name'  => 'medicine',
    'value' => set_value('medicine'),
	);
	$param_caution = array(
		'id' => 'caution',
		'class' => '',
		'name'  => 'caution',
    'value' => set_value('caution'),
	);
	$param_advice = array(
		'id' => 'advice',
		'class' => '',
		'name'  => 'advice',
    'value' => set_value('advice'),
	);
	$param_generic_drug = array(
		'id' => 'generic_drug',
		'class' => '',
		'name'  => 'generic_drug',
    'value' => set_value('generic_drug'),
	);
	$param_health_food = array(
		'id' => 'health_food',
		'class' => '',
		'name'  => 'health_food',
    'value' => set_value('health_food'),
	);
	$param_data_heartbeat = array(
		'id' => 'data_heartbeat',
		'class' => '',
		'name'  => 'data_heartbeat',
    'value' => set_value('data_heartbeat'),
	);
	$param_data_blood = array(
		'id' => 'data_blood',
		'class' => '',
		'name'  => 'data_blood',
    'value' => set_value('data_blood'),
	);
	$param_data_body_temperature = array(
		'id' => 'data_body_temperature',
		'class' => '',
		'name'  => 'data_body_temperature',
    'value' => set_value('data_body_temperature'),
	);
	$param_submit = array(
		'id' => 'sub',
		'class' => 'btn btn-success',
		'name'  => 'sub',
    'value' => '登録',
	);
?>
<div id="wrapper"><!-- wrapper S -->
	<?= form_open('hospital/patient_insert'); ?>
		<table>
			<tr>
				<th>患者番号</th>
				<td><?= form_input($param_patient_number); ?><?=  form_error('patient_number'); ?></td>
			</tr>
			<tr>
				<th>患者画像</th>
				<td><?= form_input($param_image); ?><?=  form_error('image'); ?></td>
			</tr>
			<tr>
				<th>患者名(姓, 名)</th>
				<td><?= form_input($param_name); ?><?=  form_error('name'); ?></td>
			</tr>
			<tr>
				<th>患者名カナ(セイ, メイ)</th>
				<td><?= form_input($param_name_kana); ?><?=  form_error('name_kana'); ?></td>
			</tr>
			<tr>
				<th>生年月日(yyyyMMdd)</th>
				<td><?= form_input($param_age); ?><?=  form_error('age'); ?></td>
			</tr>
			<tr>
				<th>地域(大阪府,大阪市)</th>
				<td><?= form_input($param_area); ?><?=  form_error('area'); ?></td>
			</tr>
			<tr>
				<th>病名(病名1,病名2,病名3・・・・)</th>
				<td><?= form_input($param_disease); ?><?=  form_error('disease'); ?></td>
			</tr>
			<tr>
				<th>処方薬(薬名1,薬名2,薬名3・・・・)</th>
				<td><?= form_input($param_medicine); ?><?=  form_error('medicine'); ?></td>
			</tr>
			<tr>
				<th>注意(事項1,事項2,事項3・・・・)</th>
				<td><?= form_input($param_caution); ?><?=  form_error('caution'); ?></td>
			</tr>
			<tr>
				<th>アドバイス</th>
				<td><?= form_input($param_advice); ?><?=  form_error('advice'); ?></td>
			</tr>
			<tr>
				<th>ジェネリック医薬品(薬名1,薬名2,薬名3・・・・)</th>
				<td><?= form_input($param_generic_drug); ?><?=  form_error('generic_drug'); ?></td>
			</tr>
			<tr>
				<th>健康食品(食品1,食品2,食品3・・・・)</th>
				<td><?= form_input($param_health_food); ?><?=  form_error('health_food'); ?></td>
			</tr>
			<tr>
				<th>1年間の心拍データ(値1,値2,値3・・・・,値12)</th>
				<td><?= form_input($param_data_heartbeat); ?><?=  form_error('data_heartbeat'); ?></td>
			</tr>
			<tr>
				<th>1年間の血圧データ(値1,値2,値3・・・・,値12)</th>
				<td><?= form_input($param_data_blood); ?><?=  form_error('data_blood'); ?></td>
			</tr>
			<tr>
				<th>1年間の体温データ(値1,値2,値3・・・・,値12)</th>
				<td><?= form_input($param_data_body_temperature); ?><?=  form_error('data_body_temperature'); ?></td>
			</tr>
		</table>
		<div class="btn1"><?= form_submit($param_submit); ?></div>
		<!-- エラーメッセージ表示エリア -->
		<!-- <div id="error_message_area"><?=  validation_errors(); ?></div> -->
	<?= form_close(); ?>

	<button id="default_set" class="btn btn-info">デフォルト値セット</button>

	<script type="text/javascript">
		console.log("hospital_patient_insert");
	  var DEF_VALS = {
			"patient_number" : Math.floor( Math.random() * 888888888889 ) + 111111111111,
			"image" : "ic_github.png",
			"age" : "19871203",
			"name" : "技徒,刃武",
			"name_kana" : "ギト,ハブ",
			"area" : "大阪府,大阪市",
			"disease" : "鬱病,心臓病",
			"medicine" : "ジェイゾロフト,レキソタン",
			"caution" : "働きすぎに注意,閉鎖空間を避ける事",
			"advice" : "適度に運動しましょう",
			"generic_drug" : "セラニン",
			"health_food" : "ラクテクト",
			"data_heartbeat" : "64, 67, 59, 60, 68, 69, 55, 66, 67.9, 68.3, 62, 67",
			"data_blood" : "125, 123, 120, 123, 124, 137, 129, 124, 124, 126, 125, 145",
			"data_body_temperature" : "36.4, 35.6, 36.6, 35.8, 34.7, 35.8, 34.2, 36.5, 38.6, 37.6, 36.1, 34.5",
		};

		$("#default_set").on("click", function(){
			console.log("hospital_patient_insert clicked");
			for(key in DEF_VALS){
				console.log("hospital_patient_insert key : " + key);
				$("#" + key).val(DEF_VALS[key]);
			}
		});

	</script>
</div><!-- wrapper E -->
