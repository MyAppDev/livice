<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>hospital_patient_list</title>

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

	</head>
	<body>
		<h1 class="h1 text-info	">患者リスト</h1>

		<div id="wrapper"><!-- wrapper S -->
			<div id="search_area"><!-- search_area S -->
				<?php
					$param_search_patient = array(
						'id' => 'search_patient',
						'class' => '',
						'name'  => 'search_patient',
						'value' => $search_key['search_patient'] ?: '',
					);
					$param_search_disease = array(
						'id' => 'search_disease',
						'class' => '',
						'name'  => 'search_disease',
						'value' => $search_key['search_disease'] ?: '',
					);
					$param_search_medicine = array(
						'id' => 'search_medicine',
						'class' => '',
						'name'  => 'search_medicine',
						'value' => $search_key['search_medicine'] ?: '',
					);
					$param_search_area = array(
						'id' => 'search_area',
						'class' => '',
						'name'  => 'search_area',
						'value' => $search_key['search_area'] ?: '',
					);
					$param_search_age = array(
						'id' => 'search_age',
						'class' => '',
						'name'  => 'search_age',
						'value' => $search_key['search_age'] ?: '',
					);
					$param_search_submit = array(
						'id' => 'search_submit',
						'class' => 'btn btn-success',
						'name'  => 'search_submit',
		        'value' => '検索',
					);
				?>
				<?= form_open('hospital/patient_list/'); ?>
				<h3 class="h3 text-success">検索キー</h3>
				<table class="table">
					<tr>
						<th>患者名</th>
						<td><?= form_input($param_search_patient); ?></td>
					</tr>
					<tr>
						<th>病名</th>
						<td><?= form_input($param_search_disease); ?></td>
					</tr>
					<tr>
						<th>薬剤名</th>
						<td><?= form_input($param_search_medicine); ?></td>
					</tr>
					<tr>
						<th>地域</th>
						<td><?= form_input($param_search_area); ?></td>
					</tr>
					<tr>
						<th>年齢</th>
						<td><?= form_input($param_search_age); ?></td>
					</tr>
				</table>
				<?= form_submit($param_search_submit); ?>
				<?= form_close(); ?>
			</div><!-- search_area E -->
			<div id="list_area"><!-- list_area S -->
				<table class="table">
					<thead>
						<th>患者画像</th>
						<th>患者名</th>
						<th>患者名カナ</th>
						<th>生年月日</th>
						<th>地域</th>
						<th>病名</th>
						<th>処方薬</th>
						<th>注意事項</th>
						<th>詳細</th>
					</thead>
					<tbody>
					<?php foreach ($patient_list as $patient) { ?>
						<?php
							$param_submit = array(
								'id' => 'sub_'.$patient->id,
								'class' => 'btn btn-info',
								'name'  => 'sub',
				        'value' => '詳細',
							);
						?>
						<?= form_open('hospital/patient_details/'.$patient->id); ?>
						<tr>
							<td><img width="50px" src="<?= base_url(); ?>assets/img/<?= $patient->image; ?>"></td>
							<td><?= $patient->name; ?></td>
							<td><?= $patient->name_kana; ?></td>
							<td><?= $patient->age; ?></td>
							<td><?= $patient->area; ?></td>
							<td><?= $patient->disease; ?></td>
							<td><?= $patient->medicine; ?></td>
							<td><?= $patient->caution; ?></td>
							<td><?= form_submit($param_submit); ?></td>
						</tr>
						<?= form_close(); ?>
					<?php } ?>
					</tbody>
				</table>
			</div><!-- list_area E -->
		</div><!-- wrapper E -->

	</body>
</html>
