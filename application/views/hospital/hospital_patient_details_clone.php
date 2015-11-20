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
<!-- <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/bootstrap-glyphicons.css" > -->
<script type="text/javascript" src="<?= base_url(); ?>assets/js/bootstrap.min.js"></script>

<link href="<?= base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- font-awesome
				オフラインでのアイコン表示-->
<!-- <link href="<?= base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.css" rel="stylesheet"> -->
<!-- Custom Fonts -->
<link href="<?= base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


<!--link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet"-->

<!--hospital_dashboard -->
<script type="text/javascript" src="<?= base_url(); ?>assets/js/hospital/hospital_dashboard.js"></script>

<!--hospital_dashboard_dummy_user -->
<script type="text/javascript" src="<?= base_url(); ?>assets/js/hospital/hospital_dashboard_dummy_user_1.js"></script>

<style type="text/css">

.table1 {
	border-collapse: collapse;
	width:800px;
	margin: 10px 0 0 10px;
}
th.t_top {
    border-top: #be1309 4px solid;
}
th {
	border-bottom: #e3e3e3 1px dotted;
	text-align: left;
	font-size:20px;
	font-weight:900;
	padding: 10px;
	font-weight: normal;
	background: skyblue;
}
td.t_top {
	border-top: #b3b3b3 4px solid;
}
td {
	border-bottom: #e3e3e3 1px dotted;
	font-size:20px;
	border-right: #e3e3e3 1px solid;
	text-align: left;
	padding: 10px;

}

</style>

<div id="wrapper"><!-- wrapper S -->
	<a href="<?= base_url(); ?>Hospital/patient_list">
		<button type="button" class="btn btn-info" style="margin-left:10px;">
		  <span class="glyphicon glyphicon-chevron-left"></span>
			患者リストへ
		</button>
	</a>

	<table class="table1">
	<?php	foreach ($patient_info as $patient) {	?>
		<tr>
			<th class="t_top" width="150px"  style="font-weight:bold;">患者画像</th>
			<td class="t_top"><img width="50px" src="<?= base_url(); ?>assets/img/<?= $patient->image; ?>"></td>
		</tr>
		<tr>
			<th style="font-weight:bold;">患者名</th>
			<td><?= $patient->name ?></td>
		</tr>
		<tr>
			<th style="font-weight:bold;">患者名カナ</th>
			<td><?= $patient->name_kana ?></td>
		</tr>
		<tr>
			<th style="font-weight:bold;">生年月日</th>
			<td><?= $patient->age ?></td>
		</tr>
		<tr>
			<th style="font-weight:bold;">地域</th>
			<td><?= $patient->area ?></td>
		</tr>
		<tr>
			<th style="font-weight:bold;">病名</th>
			<td><?= $patient->disease ?></td>
		</tr>
		<tr>
			<th style="font-weight:bold;">処方薬</th>
			<td><?= $patient->medicine ?></td>
		</tr>
		<tr>
			<th style="font-weight:bold;">注意事項</th>
			<td><?= $patient->caution ?></td>
		</tr>
	<?php	}	?>
	</table>
</div><!-- wrapper E -->
