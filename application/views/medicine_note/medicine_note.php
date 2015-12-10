<?php
?>
<html>
<head>
<title>お薬手帳</title>

<!-- Bootstrap Core CSS -->
<link href="<?= base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="<?= base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.css" rel="stylesheet">

<style>
body{
	background-color: #111;
	/*background-color: #333;*/
	/*overflow: hidden;*/
	/*color: #DDD;*/
	/*color:#DDD;
	padding:0px;
	margin:0px;
	height:200px;
	overflow: hidden;*/
	padding: 50px;
	/*height: 500px;*/
}

#wrapper{
	/*height: 500px;*/
	margin-left: 10%;
}

#wrapper strong{
	font-size: 2em;
	color: #aaa;
}

#wrapper em{
	font-size: 3em;
	color: #ddd;
}

#wrapper .row{
	border-style: solid;
	border-width: 1px;
	border-radius: 10px;
	border-color: #777;
	background-color: #555;
	margin-bottom: 10px;
	padding: 10px;
}

tbody{
	vertical-align: top;
	padding:0px;
	margin:0px;
}

table{
	padding:0px;
	margin:0px;
	vertical-align: top;
	text-align: left;
	font-size:20px;

}

table th{
	margin:0 20px 0 20px;
	padding-right:20px;
	padding-top:5px;
}

td{
	padding-top:5px;

}

</style>
</head>
<body>
	<div id="wrapper"><!-- wrapper S -->
		<div id="disease" class="row"><!-- disease S -->
			<strong>病名</strong>
			<br>
			<em>肺炎</em>
		</div><!-- disease E -->
		<div id="symptom" class="row"><!-- symptom S -->
			<strong>症状</strong>
			<br>
			<em>発熱、痰がらみ</em>
		</div><!-- symptom E -->
		<div id="medicine" class="row"><!-- medicine S -->
			<strong>処方薬</strong>
			<br>
			<em>アストミン散10％</em>
		</div><!-- medicine E -->
		<div id="caution" class="row"><!-- caution S -->
			<strong>注意事項</strong>
			<br>
			<em>水分補給を心がける<br/>かぜやインフルエンザに注意</em>
		</div><!-- caution E -->
	</div><!-- wrapper E -->

	<!-- <table>
		<tr>
			<th style="margin-left:20px;">病名</th>
			<td>肺炎</td>
		</tr>
		<tr>
			<th>症状</th>
			<td>発熱、痰がらみ</td>
		</tr>
		<tr>
			<th>処方薬</th>
			<td>アストミン散10％</td>
		</tr>
		<tr>
			<th>注意事項</th>
			<td>水分補給を心がける<br/>かぜやインフルエンザに注意</td>
		</tr>
	</table> -->

	<!-- jQuery -->
	<script src="<?= base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
	<script type="text/javascript" src="<?= base_url(); ?>assets/bower_components/jquery-color-2.1.1/jquery.color.js"></script>

	<!-- Bootstrap Core JavaScript -->
	<script src="<?= base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>
