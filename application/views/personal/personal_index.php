<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>personal_index</title>

		<!-- jQuery -->
		<!--script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script-->
		<script type="text/javascript" src="<?= base_url(); ?>assets/js/jquery-1.11.3.min.js"></script>

		<!-- bxSlider -->
		<!-- <link type="text/css"  href="<?= base_url(); ?>assets/css/jquery.bxslider.css" rel="stylesheet"> -->
		<!-- <script type="text/javascript" src="<?= base_url(); ?>assets/js/jquery.bxslider.js"></script> -->

		<!-- highcharts -->
		<!-- <script type="text/javascript" src="<?= base_url(); ?>assets/js/highcharts.js"></script> -->
		<!-- <script type="text/javascript" src="<?= base_url(); ?>assets/js/modules/exporting.js"></script> -->

		<!-- bootstrap -->
		<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/bootstrap.min.css" >
		<script type="text/javascript" src="<?= base_url(); ?>assets/js/bootstrap.min.js"></script>

		<!-- personal_dashboard bxSlider -->
		<!-- <script type="text/javascript" src="<?= base_url(); ?>assets/js/personal/personal_dashboard_bxslider.js"></script> -->

		<!-- 年間推移グラフ -->
		<!-- <script type="text/javascript" src="<?= base_url(); ?>assets/js/personal/personal_dashboard_yearly_transition.js"></script> -->

		<!-- pagepiling core -->
		<!-- <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/bower_components/pagePiling.js/jquery.pagepiling.css" /> -->
		<!-- <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/personal/app_home.css" /> -->
		<!-- <script type="text/javascript" src="<?= base_url(); ?>assets/bower_components/pagePiling.js/jquery.pagepiling.min.js"></script> -->
		<!-- <script type="text/javascript" src="<?= base_url(); ?>assets/js/personal/home_control.js"></script> -->

		<!-- グラフ描画 病院用を流用 -->
		<!-- <script type="text/javascript" src="<?= base_url(); ?>assets/js/hospital/hospital_dashboard.js"></script> -->

		<style type="text/css">

		::selection { background-color: #E13300; color: white; }
		::-moz-selection { background-color: #E13300; color: white; }

		body {
			background-color: #fff;
			margin: 40px;
			font: 13px/20px normal Helvetica, Arial, sans-serif;
			color: #4F5155;
		}

		a {
			color: #003399;
			background-color: transparent;
			font-weight: normal;
		}

		h1 {
			color: #444;
			background-color: transparent;
			border-bottom: 1px solid #D0D0D0;
			font-size: 19px;
			font-weight: normal;
			margin: 0 0 14px 0;
			padding: 14px 15px 10px 15px;
		}

		code {
			font-family: Consolas, Monaco, Courier New, Courier, monospace;
			font-size: 12px;
			background-color: #f9f9f9;
			border: 1px solid #D0D0D0;
			color: #002166;
			display: block;
			margin: 14px 0 14px 0;
			padding: 12px 10px 12px 10px;
		}

		#body {
			margin: 0 15px 0 15px;
		}

		p.footer {
			text-align: right;
			font-size: 11px;
			border-top: 1px solid #D0D0D0;
			line-height: 32px;
			padding: 0 10px 0 10px;
			margin: 20px 0 0 0;
		}

		#container {
			margin: 10px;
			border: 1px solid #D0D0D0;
			box-shadow: 0 0 8px #D0D0D0;
		}
		</style>
	</head>
	<body>
		<div id="container">
			<h1>Welcome to Livice!</h1>

			<div id="body">
				<a href="<?= base_url().'Personal/home' ?>"><button class="btn btn-success">ウェアラブル</button></a>
				<code>livice/Personal/home</code>
				<?= br(2) ?>
				<a href="<?= base_url().'hospital/patient_list' ?>"><button class="btn btn-info">病院</button></a>
				<code>livice/hospital/patient_list</code>
				<?= br(2) ?>
				<a href="<?= base_url().'hospital/patient_insert' ?>"><button class="btn btn-primary">患者登録</button></a>
				<code>livice/hospital/patient_insert</code>
				<?= br(2) ?>
				<a href="<?= base_url().'Logger/personal_dashboard' ?>"><button class="btn btn-warning">リアルタイムグラフ管理</button></a>
				<code>livice/Logger/personal_dashboard</code>
				<?= br(2) ?>
			</div>

			<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
		</div>
	</body>
</html>
