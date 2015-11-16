<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>hospital_patient_insert</title>

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
	</head>
	<body>
		<h1 class="h1 text-info	">患者登録</h1>
		<?php
			$param_form = array(
				'id' => '',
				'class' => ''
			);
			$param_patient_number = array(
				'id' => 'patient_number',
				'class' => '',
				'name'  => 'patient_number',
        'value' => '',
			);
			$param_image = array(
				'id' => 'image',
				'class' => '',
				'name'  => 'image',
        'value' => '',
			);
			$param_age = array(
				'id' => 'age',
				'class' => '',
				'name'  => 'age',
        'value' => '',
			);
			$param_name = array(
				'id' => 'name',
				'class' => '',
				'name'  => 'name',
        'value' => '',
			);
			$param_name_kana = array(
				'id' => 'name_kana',
				'class' => '',
				'name'  => 'name_kana',
        'value' => '',
			);
			$param_area = array(
				'id' => 'area',
				'class' => '',
				'name'  => 'area',
        'value' => '',
			);
			$param_disease = array(
				'id' => 'disease',
				'class' => '',
				'name'  => 'disease',
        'value' => '',
			);
			$param_medicine = array(
				'id' => 'medicine',
				'class' => '',
				'name'  => 'medicine',
        'value' => '',
			);
			$param_caution = array(
				'id' => 'caution',
				'class' => '',
				'name'  => 'caution',
        'value' => '',
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
						<td><?= form_input($param_patient_number); ?></td>
					</tr>
					<tr>
						<th>患者画像</th>
						<td><?= form_input($param_image); ?></td>
					</tr>
					<tr>
						<th>患者名(姓, 名)</th>
						<td><?= form_input($param_name); ?></td>
					</tr>
					<tr>
						<th>患者名カナ(セイ, メイ)</th>
						<td><?= form_input($param_name_kana); ?></td>
					</tr>
					<tr>
						<th>生年月日(yyyyMMdd)</th>
						<td><?= form_input($param_age); ?></td>
					</tr>
					<tr>
						<th>地域(大阪府,大阪市)</th>
						<td><?= form_input($param_area); ?></td>
					</tr>
					<tr>
						<th>病名(病名1,病名2,病名3・・・・)</th>
						<td><?= form_input($param_disease); ?></td>
					</tr>
					<tr>
						<th>処方薬(薬名1,薬名2,薬名3・・・・)</th>
						<td><?= form_input($param_medicine); ?></td>
					</tr>
					<tr>
						<th>注意(事項1,事項2,事項3・・・・)</th>
						<td><?= form_input($param_caution); ?></td>
					</tr>
				</table>
				<div class="btn1"><?= form_submit($param_submit); ?></div>
			<?= form_close(); ?>
		</div><!-- wrapper E -->

	</body>
</html>
