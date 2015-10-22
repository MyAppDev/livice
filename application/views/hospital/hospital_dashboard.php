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

		<!--style type="text/css">
			${demo.css}
		</style-->

		<!-- personal_dashboard -->
		<script type="text/javascript" src="<?= base_url(); ?>assets/js/hospital/hospital_dashboard.js"></script>
	</head>
	<body>
		<!-- highcharts -->
		<script src="<?= base_url(); ?>assets/js/highcharts.js"></script>
		<script src="<?= base_url(); ?>assets/js/modules/exporting.js"></script>

		<h1>病院側</h1>

		<!-- チャート描画エリア -->
		<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
	</body>
</html>
