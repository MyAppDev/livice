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
		<!-- <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/bootstrap.min.css" > -->
		<!-- <script type="text/javascript" src="<?= base_url(); ?>assets/js/bootstrap.min.js"></script> -->
		<!-- Bootstrap Core CSS -->
    <link href="<?= base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

		<!-- font-awesome
	 				オフラインでのアイコン表示-->
		<link href="<?= base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.css" rel="stylesheet">
		<!-- <link href="<?= base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.css" rel="stylesheet"> -->

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
		 #section2{
			 /*background-color: #000;*/
		 }
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
		/*アドバイス iframe*/
		#frame_advice{
			margin-left: 30%;
		}


		/* Section 4
		 * --------------------------------------- */
		#section4 p{
			opacity: 0.6;
		}
		/*お薬手帳*/
		#frame_book{
			margin-left:5%;
		}

		/* Section 5
		 * --------------------------------------- */
		#section5{
			/*position: fixed;*/
			/*padding-top: -40%;*/
			margin-top: -3%;
			background-color: #000;
		}

		#section5 p{
			opacity: 0.6;
			/*background-color: red;*/
			/*padding-bottom: 100px;*/
		}
		#clock{
			/*margin-top: -50px;*/
			/*margin-bottom: 10%;*/
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
			 width: 58%;
			 height: 70%;
			 background-color: #424242;
			 opacity: 1.0;
			 position: absolute;
			 z-index: 1300;
			 /*margin: -30px 0 0 10px;*/
			 margin: -30px 0 0 25%;
			 padding:10% 10% 10% 10%;
			 border-radius: 20px;
			 opacity: 0.98;
		 }
		 #section1 p
		 {
			color:#fff;
			font-size:24px;
			font-family: 'Roman';
			font-weight: bold;
			text-align: center;
		 }

		 tbody{
		 }

		 /** ホームボタン */
		 #home_2{
			 z-index: 9999999999;
			 position: fixed;
			 /*margin:0px 0px 0px 40px;*/
			 margin-left: 40%;
			 width: 300px;
		 }
		 #home_3{
			 z-index: 9999999999;
			 /*position: relative;*/
			 position: fixed;
			 margin:43% 0px 0px 40%;
			 /*margin-left: 40%;*/
			 width: 300px;
		 }
		 #home_4{
			 /*z-index: 9999999999;*/
			 /*position: fixed;*/
			 /*margin:20% 0 0 40%;*/
			 margin-top: -8%;
			 margin-left: 40%;
			 width: 300px;
		 }
		 #home_5{
			 z-index: 9999999999;
			 position: fixed;
			 margin:10px 0 0 40%;
			 /*margin-left: 40%;*/
			 width: 300px;
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
					<!-- <a href="#page1"><button class="btn-home btn btn-info"><span class="glyphicon glyphicon-home"></span> ホームへ</button></a> -->
					<!-- とりあえずテーブルにしています。レイアウト・アイコンは適宜変更して下さい -->
		    	<table id="home_top"><!-- home_top S -->
						<tr>
							<td><a href="#page2"><img width="200px" src="<?= base_url(); ?>assets/img/ic_health_fix.png"><!--ヘルス --></a><br><p>ヘルス</p></td>
							<td><a href="#page3"><img width="200px" src="<?= base_url(); ?>assets/img/ic_tips_fix_2.png"><!-- アドバイス --></a><br><p>アドバイス</p></td>
						</tr>
						<tr>
							<td><a href="#page5"><img width="200px" src="<?= base_url(); ?>assets/img/ic_clock_fix.png"><!-- 時計  --></a><br><p>時計</p></td>
							<td><a href="#page4"><img width="200px" src="<?= base_url(); ?>assets/img/ic_book_fix.png"><!-- お薬手帳 --></a><br><p>お薬手帳</p></td>
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
					<div id="container" style="min-width: 100%; height: 90%; margin: 0 auto"></div>
					<div><a href="#page1"><button id="home_2" class="btn-home btn btn-info"><span class="glyphicon glyphicon-home"></span> ホームへ</button></a></div>
		    </div>
		    <div class="section" id="section3">
					<!-- アドバイス通知エリア -->
					<div id="notification_area"><!-- notification_area S -->
						<table id="notification_detail"  style="width:110%; "><!-- notification_detail S -->
							<tr style="">
								<th style="width:50px;"><img width="100%" src="<?= base_url(); ?>assets/img/ic_tips_fix_2.png"></th>
								<td style="font-size:25px;font-weight:bold;">アドバイス</td>
							</tr>
							<tr style="font-size:20px; font-weight:bold;">
								<td colspan="2" id="advice_message" style="padding:10px 0 50px 50px;">あなたへのアドバイス</td>
							</tr>
							<tr>
								<td colspan="2"><button id="ok" class="btn btn-info"
								style="width:100%; height:100px; font-size:20px; font-weight:bold;">了解</button></td>
							</tr>
						</table><!-- notification_detail E -->
					</div><!-- notification_area E -->
					<a href="#page1"><button id="home_3" class="btn-home btn btn-info"><span class="glyphicon glyphicon-home"></span> ホームへ</button></a>

		    	<!-- <div class="intro">
		    		<h1>アドバイス</h1>
		    	</div> -->
					<!-- iframeにアドバイスページを挿入予定 -->
					<iframe src="<?= base_url() ?>health_check/index"
									frameborder="0"　scrolling="no"
									seamless="seamless"
									width="80%" height="80%"
									id="frame_advice" >ここにアドバイスページを挿入</iframe>
		    </div>
		    <div class="section" id="section4">
					<!-- お薬手帳ページを挿入予定 -->
					<div class="intro">
		    		<!-- <h1>お薬手帳</h1> -->
						<div id="patient_info"><!-- patient_info S -->
							<!-- iframeにお薬手帳ページを挿入予定 -->
							<iframe src="<?= base_url() ?>medicine_note/index"
											frameborder="0"　scrolling="no"
											seamless="seamless"　
											width="1000px" height="690px"
											id="frame_book">ここにお薬手帳を挿入</iframe>

							<!-- <table>
								<?php foreach($patient_info as $info){ ?>
								<tr>
									<th>現在服用している薬</th>
									<td><?= $info->medicine ?></td>
								</tr>
								<?php } ?>
							</table> -->
						</div><!-- patient_info E -->
		    	</div>
					<a href="#page1"><button id="home_4" class="btn-home btn btn-info"><span class="glyphicon glyphicon-home"></span> ホームへ</button></a>
		    </div>
				<div class="section" id="section5">
					<!-- 時計アプリ　背景色は要変更 -->
					<div id="clock">
				    <p class="circle"></p>
				    <p class="second"><b></b></p>
				    <p class="minute"><b></b></p>
				    <p class="hour"><b></b></p>
					</div>
					<div><a href="#page1"><button id="home_5" class="btn-home btn btn-info"><span class="glyphicon glyphicon-home"></span> ホームへ</button></a></div>
					<script type="text/javascript" src="<?= base_url(); ?>assets/js/personal/app_time.js"></script>
					<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/personal/app_time.css" >
		    </div>
		</div>

		<div id="footer"></div>
		<script src="<?= base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="<?= base_url(); ?>assets/js/personal/home_css_override.js"></script>

	</body>
</html>
