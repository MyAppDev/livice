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
						<td><?= $patient->image; ?></td>
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
		</div><!-- wrapper E -->

	</body>
</html>
