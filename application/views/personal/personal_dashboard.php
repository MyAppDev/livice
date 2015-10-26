<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>personal_dashboard</title>

		<!-- jQuery -->
		<!--script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script-->
		<script type="text/javascript" src="<?= base_url(); ?>assets/js/jquery-1.11.3.min.js"></script>

		<!-- bootstrap -->
		<link href="<?= base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
		<script src="<?= base_url(); ?>assets/js/bootstrap.min.js"></script>

		<style type="text/css">
			#emergency{
				width: 100%;
				height: 400px;
				background-color: red;
				opacity: 0.3;
				position: absolute;
				z-index: 1000;
			}
			${demo.css}
		</style>

		<!-- personal_dashboard -->
		<script type="text/javascript" src="<?= base_url(); ?>assets/js/personal/personal_dashboard.js"></script>
	</head>
	<body>
		<!-- highcharts -->
		<script src="<?= base_url(); ?>assets/js/highcharts.js"></script>
		<script src="<?= base_url(); ?>assets/js/modules/exporting.js"></script>

		<h1>個人側</h1>

		<!-- 緊急時点滅エリア -->
		<div id="emergency"></div>
		<!-- チャート描画エリア -->
		<div id="container" class="emergency" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

		<?= br(3) ?>
		<button id="emergency_button" type="button" class="btn btn-default">緊急</button>
	</body>
</html>
