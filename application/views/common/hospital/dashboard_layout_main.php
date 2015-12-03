<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE HTML>
<html>
	<head>
		<!-- jQuery -->
		<!--script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script-->
		<!-- <script type="text/javascript" src="<?= base_url(); ?>assets/js/jquery-1.11.3.min.js"></script> -->

		<!-- bxSlider -->
		<!-- <link type="text/css"  href="<?= base_url(); ?>assets/css/jquery.bxslider.css" rel="stylesheet"> -->
		<!-- <script type="text/javascript" src="<?= base_url(); ?>assets/js/jquery.bxslider.js"></script> -->

		<!-- highcharts -->
		<!-- <script type="text/javascript" src="<?= base_url(); ?>assets/js/highcharts.js"></script> -->
		<!-- <script type="text/javascript" src="<?= base_url(); ?>assets/js/modules/exporting.js"></script> -->

		<!-- bootstrap -->
		<!-- <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/bootstrap.min.css" > -->
		<!-- <script type="text/javascript" src="<?= base_url(); ?>assets/js/bootstrap.min.js"></script> -->

		<!-- SB Admin 2 Begin -->
		<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Livice <?php if(isset($meta_title)){echo $meta_title;} ?></title>

    <!-- Bootstrap Core CSS -->
    <link href="<?= base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

		<!-- font-awesome
	 				オフラインでのアイコン表示-->
		<link href="<?= base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.css" rel="stylesheet">

		<!-- MetisMenu CSS -->
    <link href="<?= base_url(); ?>assets/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="<?= base_url(); ?>assets/dist/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?= base_url(); ?>assets/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?= base_url(); ?>assets/bower_components/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?= base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
		<!-- SB Admin 2 End -->
	</head>
	<body>

		    <div id="wrapper">

		        <!-- Navigation -->
		        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
		            <div class="navbar-header">
		                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
		                    <span class="sr-only">ああああああああ</span>
		                    <span class="icon-bar"></span>
		                    <span class="icon-bar"></span>
		                    <span class="icon-bar"></span>
		                </button>
		                <a class="navbar-brand" href="#" style="font-size:35px; padding-top:8px;">LIVICE <p style="font-size:20px; padding-top:2px;">-living innovation device-</p></a>
		            </div>
		            <!-- /.navbar-header -->

		            <ul class="nav navbar-top-links navbar-right">

		                <li class="dropdown">
		                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
		                        <i class="fa fa-user fa-fw"></i>坂本和雅　<i class="fa fa-caret-down"></i>
		                    </a>
		                    <ul class="dropdown-menu dropdown-user">
		                        <li><a href="#"><i class="fa fa-user fa-fw"></i>プロフィール情報</a>
		                        </li>
		                        <li><a href="#"><i class="fa fa-gear fa-fw"></i>設定</a>
		                        </li>
		                        <li class="divider"></li>
		                        <li><a href="#"><i class="fa fa-sign-out fa-fw"></i>ログアウト</a>
		                        </li>
		                    </ul>
		                    <!-- /.dropdown-user -->
		                </li>
		                <!-- /.dropdown -->
		            </ul>
		            <!-- /.navbar-top-links -->

		            <div class="navbar-default sidebar" role="navigation">
		                <div class="sidebar-nav navbar-collapse">
		                    <ul class="nav" id="side-menu">
		                        <li>
		                            <a href="<?= base_url('hospital/patient_list'); ?>"><i class="fa fa-dashboard fa-fw"></i>患者リスト</a>
		                        </li>

		                    </ul>
		                </div>
		                <!-- /.sidebar-collapse -->
		            </div>
		            <!-- /.navbar-static-side -->
		        </nav>

		        <div id="page-wrapper">
		            <div class="row">
		                <div class="col-lg-12">
		                    <h1 class="page-header"><?php if(isset($page_title)){echo $page_title;} ?></h1>
<!--************************************** 要素　**************************************-->

												<?= $content_body; ?>

<!--************************************** 要素　**************************************-->
		                </div>
		                <!-- /.col-lg-12 -->
		            </div>
		            <!-- /.row -->

		        </div>
		        <!-- /#page-wrapper -->

		    </div>
		    <!-- /#wrapper -->

		    <!-- jQuery -->
		    <script src="<?= base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
				<script type="text/javascript" src="<?= base_url(); ?>assets/bower_components/jquery-color-2.1.1/jquery.color.js"></script>

		    <!-- Bootstrap Core JavaScript -->
		    <script src="<?= base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

		    <!-- Metis Menu Plugin JavaScript -->
		    <script src="<?= base_url(); ?>assets/bower_components/metisMenu/dist/metisMenu.min.js"></script>

		    <!-- Custom Theme JavaScript -->
		    <script src="<?= base_url(); ?>assets/dist/js/sb-admin-2.js"></script>

				<!-- bxSlider -->
				<link type="text/css"  href="<?= base_url(); ?>assets/css/jquery.bxslider.css" rel="stylesheet">
				<script type="text/javascript" src="<?= base_url(); ?>assets/js/jquery.bxslider.js"></script>

				<!-- highcharts -->
				<script type="text/javascript" src="<?= base_url(); ?>assets/js/highcharts.js"></script>
				<script type="text/javascript" src="<?= base_url(); ?>assets/js/modules/exporting.js"></script>

				<!-- toastr -->
				<link type="text/css"  href="<?= base_url(); ?>assets/bower_components/toastr/build/toastr.min.css" rel="stylesheet">
				<script type="text/javascript" src="<?= base_url(); ?>assets/bower_components/toastr/build/toastr.min.js"></script>

				<!-- Morris Charts JavaScript -->
		    <!-- <script src="<?= base_url(); ?>assets/bower_components/raphael/raphael-min.js"></script>
		    <script src="<?= base_url(); ?>assets/bower_components/morrisjs/morris.min.js"></script>
		    <script src="<?= base_url(); ?>assets/js/morris-data.js"></script> -->

	</body>
</html>
