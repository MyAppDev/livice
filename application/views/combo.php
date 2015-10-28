<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>年間推移</title>

		<!--script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script-->
		<script type="text/javascript" src="<?= base_url(); ?>assets/js/jquery-1.11.3.min.js"></script>
		<style type="text/css">
${demo.css}
		</style>
		<!-- 年間推移グラフ -->
		<script type="text/javascript" src="<?= base_url(); ?>assets/js/personal/personal_dashboard_yearly_transition.js"></script>

	</head>
	<body>
		<script src="<?= base_url(); ?>assets/js/highcharts.js"></script>
		<script src="<?= base_url(); ?>assets/js/modules/exporting.js"></script>

		<div id="container_year" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
	</body>
</html>
