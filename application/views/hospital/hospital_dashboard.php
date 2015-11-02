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
		<script type="text/javascript" src="<?= base_url(); ?>assets/js/bootstrap.min.js"></script>

		<!--hospital_dashboard -->
		<script type="text/javascript" src="<?= base_url(); ?>assets/js/hospital/hospital_dashboard.js"></script>

		<!--hospital_dashboard_dummy_user -->
		<script type="text/javascript" src="<?= base_url(); ?>assets/js/hospital/hospital_dashboard_dummy_user.js"></script>

	</head>
	<body>
		<h1 class="h1 text-info	">病院側</h1>


		<div id="wrapper"><!-- wrapper S -->
			<div id="top_area" class="row-fluid"><!-- top_area S -->
			   <div class="span6">
					<!-- チャート描画エリア -->
			 		<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
				 </div>
			   <div class="span6">
					<!-- チャート描画エリア -->
 			 		<div class="container_dummy" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
				 </div>
			</div><!-- top_area E -->
			<div id="buttom_area" class="row-fluid"><!-- buttom_area S -->
			   <div class="span6">
					<!-- チャート描画エリア -->
 			 		<!--div class="container_dummy" style="min-width: 310px; height: 400px; margin: 0 auto"></div-->
				 </div>
			   <div class="span6">
					<!-- チャート描画エリア -->
 			 		<!--div class="container_dummy" style="min-width: 310px; height: 400px; margin: 0 auto"></div-->
				 </div>
			</div><!-- buttom_area E -->

		</div><!-- wrapper E -->

	</body>
</html>
