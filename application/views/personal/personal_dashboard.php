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

		<!-- bxSlider -->
		<link type="text/css"  href="<?= base_url(); ?>assets/css/jquery.bxslider.css" rel="stylesheet">
		<script type="text/javascript" src="<?= base_url(); ?>assets/js/jquery.bxslider.js"></script>

		<!-- highcharts -->
		<script type="text/javascript" src="<?= base_url(); ?>assets/js/highcharts.js"></script>
		<script type="text/javascript" src="<?= base_url(); ?>assets/js/modules/exporting.js"></script>

		<!-- bootstrap -->
		<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/bootstrap.min.css" >
		<script type="text/javascript" src="<?= base_url(); ?>assets/js/bootstrap.min.js"></script>

		<!-- personal_dashboard -->
		<script type="text/javascript" src="<?= base_url(); ?>assets/js/personal/personal_dashboard.js"></script>

		<!-- personal_dashboard bxSlider -->
		<script type="text/javascript" src="<?= base_url(); ?>assets/js/personal/personal_dashboard_bxslider.js"></script>

		<!-- 年間推移グラフ -->
		<script type="text/javascript" src="<?= base_url(); ?>assets/js/personal/personal_dashboard_yearly_transition.js"></script>

		<style type="text/css">

			/* 病気表　*/
			table.company {
			    width: 620px;
			    margin: 20px 0 0 20px;
			    border-collapse: separate;
			    border-spacing: 0px 15px;
			    font-size: 12px;
			}
			 
			table.company th,
			table.company td {
			    padding: 10px;
			}
			 
			table.company th {
			    background: #295890;
			    vertical-align: middle;
			    text-align: left;
			    width: 330px;
			    overflow: visible;
			    position: relative;
			    color: #fff;
			    font-weight: normal;
			    font-size: 15px;
			}
			 
			table.company th:after {
			    left: 100%;
			    top: 50%;
			    border: solid transparent;
			    content: " ";
			    height: 0;
			    width: 0;
			    position: absolute;
			    pointer-events: none;
			    border-color: rgba(136, 183, 213, 0);
			    border-left-color: #295890;
			    border-width: 10px;
			    margin-top: -10px;
			}
			/* firefox用 */
			@-moz-document url-prefix() {
			    table.company th::after {
			        float: right;
			        padding: 0;
			        left: 30px;
			        top: 10px;
			        content: " ";
			        height: 0;
			        width: 0;
			        position: relative;
			        pointer-events: none;
			        border: 10px solid transparent;
			        border-left: #295890 10px solid;
			        margin-top: -10px;
			    }
			}
			 
			table.company td {
			    background: #E6E6E6;
			    width: 560px;
			    padding-left: 20px;
			}


			/* 緊急点滅 */
			#emergency{
				width: 100%;
				height: 400px;
				background-color: red;
				opacity: 0.3;
				position: absolute;
				z-index: 1000;
			}

			/* bxSlider */
			.frameLine {
				border: solid 1px #CCC;
				padding: 20px;
			}
			.bx-wrapper {
				/*width: 330px;*/
				width: auto;
				margin: 0 auto;
				position: relative;
			}
			.bx-wrapper .bx-pager {
				text-align: center;
				margin-top: 5px;
			}
			.bx-wrapper .bx-pager .bx-pager-item {
				display: inline-block;
				*zoom: 1;
				*display: inline;
			}
			.bx-wrapper .bx-controls-direction a {
				position: absolute;
				z-index: 9999;
			}
			.bx-prev {
				left: 10px;
			}
			.bx-wrapper .bx-next {
				right: 10px;
			}

			${demo.css}
		</style>
	</head>
	<body>
		<h1 class="h1 text-warning">個人側</h1>

		<div id="wrapper"><!-- wrapper S -->
			<div id="slider"><!-- slider S -->
			  <div><!-- content_1 S -->
					<!-- 緊急時点滅エリア -->
					<div id="emergency"></div>
					<!-- チャート描画エリア -->
					<div id="container" class="emergency" style="min-width: 310px; height: 400px; margin: 0 auto"></div> 
					<?= br(1) ?>
					<button id="emergency_button" type="button" class="btn btn-default">緊急</button>
					<?= br(1); ?>
					<div id="container_year" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
				</div><!-- content_1 E -->
				<div><!-- content_2 S -->
					<p class="text-info">ここにコンテンツ</p>
				</div><!-- content_2 E -->
				<div><!-- content_3 S -->
					<p class="text-info">ここにコンテンツ</p>
				</div><!-- content_3 E -->
			</div><!-- slider E -->
		</div><!-- wrapper E -->

		<table class="company">
		    <tbody>
		        <tr>
		            <th class="arrow_box">今までどのような病気になったか</div></th>
		            <td>糖尿病・骨粗しょう症</td>
		        </tr>
		        		        <tr>
		        <th class="arrow_box">服用中の薬</th>
		            <td>活性型ビタミンD3製剤　※骨粗しょう症用</td>
		        </tr>
		        <tr>
		            <th class="arrow_box">服用したことがある薬</th>
		            <td>経口血糖降下薬　※糖尿病</td>
		        </tr>
		        <tr>
		            <th>どのような治療を受けたか</th>
		            <td>薬の服用</td>
		        </tr>

		    </tbody>
		</table>
	</body>
</html>
