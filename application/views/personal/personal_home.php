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

		<!-- personal_dashboard bxSlider -->
		<script type="text/javascript" src="<?= base_url(); ?>assets/js/personal/personal_dashboard_bxslider.js"></script>

		<!-- 年間推移グラフ -->
		<script type="text/javascript" src="<?= base_url(); ?>assets/js/personal/personal_dashboard_yearly_transition.js"></script>

		<!-- pagepiling core -->
		<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/bower_components/pagePiling.js/jquery.pagepiling.css" />
		<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/personal/app_home.css" />
		<script type="text/javascript" src="<?= base_url(); ?>assets/bower_components/pagePiling.js/jquery.pagepiling.min.js"></script>
		<script type="text/javascript" src="<?= base_url(); ?>assets/js/personal/home_control.js"></script>

		<!-- グラフ描画 病院用を流用 -->
		<script type="text/javascript" src="<?= base_url(); ?>assets/js/hospital/hospital_dashboard.js"></script>

		<!-- 暈し -->
		<script type="text/javascript" src="<?= base_url(); ?>assets/bower_components/Blur.js/blur.js"></script>
		<!-- <script type="text/javascript" src="<?= base_url(); ?>assets/bower_components/background-blur/src/background-blur.js"></script> -->

		<style>
    /* Section 1
		 * --------------------------------------- */
		#section1 h1{
			color: #444;
		}
		#section1 p{
			color: #333;
			color: rgba(0,0,0,0.3);
		}
		#section1 img{
			margin: 20px 0;
			opacity: 0.7;
		}
		/*アイコンレイアウト　用調整*/
		#home_top{
			margin: 0 auto;
		}
		#home_top tr{

		}
		#home_top td{
			padding: 10px 50px 10px  50px;
		}

		/* Section 2
		 * --------------------------------------- */
		#section2 h1,
		#section2 p{
			z-index: 3;
		}
		#section2 p{
			opacity: 0.8;
		}

		#section2 #colors{
			right: 60px;
			bottom: 0;
			position: absolute;
			height: 413px;
			width: 258px;
			background-image: url(<?= base_url(); ?>assets/bower_components/pagePiling.js/examples/imgs/colors.gif);
			background-repeat: no-repeat;
		}

		/* Section 3
		 * --------------------------------------- */
		#section3 #colors{
			left: 60px;
			bottom: 0;
		}
		#section3 p{
			color: #757575;
		}

		#colors2,
		#colors3{
			position: absolute;
			height: 163px;
			width: 362px;
			z-index: 1;
			background-repeat: no-repeat;
			left: 0;
			margin: 0 auto;
			right: 0;
		}
		#colors2{
			/*background-image: url(<?= base_url(); ?>assets/bower_components/pagePiling.js/examples/imgs/colors2.gif);*/
			top:0;
		}
		#colors3{
			/*background-image: url(<?= base_url(); ?>assets/bower_components/pagePiling.js/examples/imgs/colors3.gif);*/
			bottom:0;
		}

		/* Section 4
		 * --------------------------------------- */
		#section4 p{
			opacity: 0.6;
		}

		/* Section 5
		 * --------------------------------------- */
		#section5 p{
			opacity: 0.6;
			/*background-color: red;*/
		}

		/* Overwriting fullPage.js tooltip color
		* --------------------------------------- */
		#pp-nav.custom .pp-tooltip{
			color: #AAA;
		}
		#markup{
			display: block;
			width: 450px;
			margin: 20px auto;
			text-align: left;
		}

		/* 緊急点滅
		* ----------------------------------------- */
		#emergency{
			width: 100%;
			height: 100%;
			background-color: red;
			opacity: 0.3;
			position: absolute;
			z-index: 1000;
		}

		/* 通知エリア
		   とりあえずテーブルにしています。
			 レイアウト・アイコンは適宜変更をお願いします。
		 ------------------------------------------*/
		 #notification_area{
			 width: 100%;
			 height: 100%;
			 background-color: #444;
			 opacity: 1.0;
			 position: absolute;
			 z-index: 1100;
			 margin-top: -5%;
			 padding:10% 20% 10% 20%;
		 }

	</style>
	</head>
	<body>
		<!-- menuはリリース時、消して下さい -->
		<!-- <ul id="menu">
			<li data-menuanchor="page1" class="active"><a href="#page1">Page 1</a></li>
			<li data-menuanchor="page2"><a href="#page2">Page 2</a></li>
			<li data-menuanchor="page3"><a href="#page3">Page 3</a></li>
			<li data-menuanchor="page4"><a href="#page4">Page 4</a></li>
			<li data-menuanchor="page5"><a href="#page5">Page 5</a></li>
		</ul> -->

		<div id="pagepiling">
		    <div class="section" id="section1">
					<!-- とりあえずテーブルにしています。レイアウト・アイコンは適宜変更して下さい -->
		    	<table id="home_top"><!-- home_top S -->
						<tr>
							<td><a href="#page2"><img width="200px" src="<?= base_url(); ?>assets/img/ic_health.png"><!--ヘルス --></a></td>
							<td><a href="#page3"><img width="200px" src="<?= base_url(); ?>assets/img/ic_tips.png"><!-- アドバイス --></a></td>
						</tr>
						<tr>
							<td><a href="#page5"><img width="200px" src="<?= base_url(); ?>assets/img/ic_clock_fix.png"><!-- 時計  --></a></td>
							<td><a href="#page4"><img width="200px" src="<?= base_url(); ?>assets/img/ic_find_friends.png"><!-- お薬手帳 --></a></td>
						</tr>
					</table><!-- home_top E -->
					<!-- <ul>
						<li><a href="#page2"><img width="100px" src="<?= base_url(); ?>assets/img/ic_health.png">ヘルス</a></li>
						<li><a href="#page3"><img width="100px" src="<?= base_url(); ?>assets/img/ic_tips.png">アドバイス</a></li>
						<li><a href="#page5"><img width="100px" src="<?= base_url(); ?>assets/img/ic_safari.png">時計</a></li>
						<li><a href="#page4"><img width="100px" src="<?= base_url(); ?>assets/img/ic_find_friends.png">お薬手帳</a></li>
					</ul> -->
		    </div>
		    <div class="section" id="section2">
					<!-- 緊急時点滅エリア -->
					<div id="emergency"></div>
					<!-- チャート描画エリア -->
					<div id="container" style="min-width: 100%; height: 100%; margin: 0 auto"></div>
		    </div>
		    <div class="section" id="section3">
					<!-- アドバイス通知エリア -->
					<div id="notification_area" width="200px" height="200px"><!-- notification_area S -->
						<table id="notification_detail"><!-- notification_detail S -->
							<tr>
								<th><img width="40px" src="<?= base_url(); ?>assets/img/ic_tips.png"></th>
								<td>アドバイス</td>
							</tr>
							<tr>
								<td colspan="2" id="advice_message">あなたへのアドバイス</td>
							</tr>
							<tr>
								<td colspan="2"><button id="ok" class="btn btn-info">了解</button></td>
							</tr>
						</table><!-- notification_detail E -->
					</div><!-- notification_area E -->

		    	<!-- <div class="intro">
		    		<h1>アドバイス</h1>
		    	</div> -->
					<!-- iframeにアドバイスページを挿入予定 -->
					<iframe src="<?= base_url() ?>health_check/index"
									frameborder="0"　scrolling="no"
									seamless="seamless"　
									width="80%" height="80%" >ここにアドバイスページを挿入</iframe>
		    </div>
		    <div class="section" id="section4">
					<!-- お薬手帳ページを挿入予定 -->
					<div class="intro">
		    		<!-- <h1>お薬手帳</h1> -->
						<div id="patient_info"><!-- patient_info S -->
							<table>
								<?php foreach($patient_info as $info){ ?>
								<tr>
									<th>現在服用している薬</th>
									<td><?= $info->medicine ?></td>
								</tr>
								<?php } ?>
							</table>
						</div><!-- patient_info E -->
		    	</div>
		    </div>
				<div class="section" id="section5">
					<!-- 時計アプリ　背景色は要変更 -->
					<div id="clock">
				    <p class="circle"></p>
				    <p class="second"><b></b></p>
				    <p class="minute"><b></b></p>
				    <p class="hour"><b></b></p>
					</div>
					<script type="text/javascript" src="<?= base_url(); ?>assets/js/personal/app_time.js"></script>
					<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/personal/app_time.css" >
		    </div>
		</div>
	</body>
</html>
