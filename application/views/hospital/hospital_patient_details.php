<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>hospital_dashboard</title>

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
		<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/bootstrap-glyphicons.css" >
		<script type="text/javascript" src="<?= base_url(); ?>assets/js/bootstrap.min.js"></script>
		<!--link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet"-->

		<!--hospital_dashboard -->
		<script type="text/javascript" src="<?= base_url(); ?>assets/js/hospital/hospital_dashboard.js"></script>

		<!--hospital_dashboard_dummy_user -->
		<script type="text/javascript" src="<?= base_url(); ?>assets/js/hospital/hospital_dashboard_dummy_user_1.js"></script>

	</head>
	<body>
		<h1 class="h1 text-info	">患者詳細</h1>

		<div id="wrapper"><!-- wrapper S -->
			<a href="<?= base_url(); ?>Hospital/patient_list">
				<button type="button" class="btn btn-info btn-lg">
				  <span class="glyphicon glyphicon-chevron-left"></span>
					患者リストへ
				</button>
			</a>

			<table class="table">
			<?php	foreach ($patient_info as $patient) {	?>
				<tr>
					<th>患者画像</th>
					<td><img width="50px" src="<?= base_url(); ?>assets/img/<?= $patient->image; ?>"></td>
				</tr>
				<tr>
					<th>患者名</th>
					<td><?= $patient->name ?></td>
				</tr>
				<tr>
					<th>患者名カナ</th>
					<td><?= $patient->name_kana ?></td>
				</tr>
				<tr>
					<th>生年月日</th>
					<td><?= $patient->age ?></td>
				</tr>
				<tr>
					<th>地域</th>
					<td><?= $patient->area ?></td>
				</tr>
				<tr>
					<th>病名</th>
					<td><?= $patient->disease ?></td>
				</tr>
				<tr>
					<th>処方薬</th>
					<td><?= $patient->medicine ?></td>
				</tr>
				<tr>
					<th>注意事項</th>
					<td><?= $patient->caution ?></td>
				</tr>
			<?php	}	?>
			</table>
		</div><!-- wrapper E -->

	</body>
</html>
