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
<script type="text/javascript" src="<?= base_url(); ?>assets/js/hospital/hospital_dashboard_dummy_user_1.js"></script>


<style type="text/css">
.table1 {
	width:1420px;
	margin:auto 10px;
}

.table1 th{
	font-size: 24px;
	padding-bottom:5px;
	text-align: left;
}

.table1 td{
	padding-top:3px;
	padding-bottom:3px;
	padding-left: 5px;
	border-top:1px dotted #6E6E6E;
	font-size: 18px;
}

.serch{
	margin-left: 0px;
}

.btn1{
	margin: -11px 0 0 5px;
	display: inline-block;
    padding: 4px 12px;
    margin-bottom: 0;
    font-size: 14px;
    line-height: 20px;
    color: #333;
    text-align: center;
    text-shadow: 0 1px 1px rgba(255,255,255,0.75);
    vertical-align: middle;
    cursor: pointer;
    background-color: #f5f5f5;
    background-image: -moz-linear-gradient(top,#fff,#e6e6e6);
    background-image: -webkit-gradient(linear,0 0,0 100%,from(#fff),to(#e6e6e6));
    background-image: -webkit-linear-gradient(top,#fff,#e6e6e6);
    background-image: -o-linear-gradient(top,#fff,#e6e6e6);
    background-image: linear-gradient(to bottom,#fff,#e6e6e6);
    background-repeat: repeat-x;
    border: 1px solid #ccc;
    border-color: #e6e6e6 #e6e6e6 #bfbfbf;
    border-color: rgba(0,0,0,0.1) rgba(0,0,0,0.1) rgba(0,0,0,0.25);
    border-bottom-color: #b3b3b3;
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    border-radius: 4px;

}

.table2 tr{
	float:left;
	padding-left: 10px;
	font-size: 18px;


}


#search {
	margin-left:10px;
}

#search_patient {
	width:120px;
	height:17px;
	margin-top:10px;
}

#search_disease {
	width:120px;
	height:17px;
	margin-top:10px;
}

#search_area {
	width:120px;
	height:17px;
	margin-top:10px;
}

#search_medicine {
	width:120px;
	height:17px;
	margin-top:10px;
}

#search_age {
	width:30px;
	height:17px;
	margin-top:10px;
}

#search_submit {
	margin-top:8px;
	width:80px;
}

</style>

<div id="wrapper"><!-- wrapper S -->
	<div id="search"><!-- search_area S -->
		<?php
			$param_search_patient = array(
				'id' => 'search_patient',
				'class' => '',
				'name'  => 'search_patient',
				'value' => $search_key['search_patient'] ?: '',
			);
			$param_search_disease = array(
				'id' => 'search_disease',
				'class' => '',
				'name'  => 'search_disease',
				'value' => $search_key['search_disease'] ?: '',
			);
			$param_search_medicine = array(
				'id' => 'search_medicine',
				'class' => '',
				'name'  => 'search_medicine',
				'value' => $search_key['search_medicine'] ?: '',
			);
			$param_search_area = array(
				'id' => 'search_area',
				'class' => '',
				'name'  => 'search_area',
				'value' => $search_key['search_area'] ?: '',
			);
			$param_search_age = array(
				'id' => 'search_age',
				'class' => '',
				'name'  => 'search_age',
				'value' => $search_key['search_age'] ?: '',
			);
			$param_search_submit = array(
				'id' => 'search_submit',
				'class' => 'btn btn-success',
				'name'  => 'search_submit',
        'value' => '検索',
			);
		?>
		<?= form_open('hospital/patient_list/'); ?>
		<h3 class="h3 text-success">検索キー</h3>
		<table class="table2">
			<tr>
				<th>患者名</th>
				<td><?= form_input($param_search_patient); ?></td>
			</tr>
			<tr>
				<th>病名</th>
				<td><?= form_input($param_search_disease); ?></td>
			</tr>
			<tr>
				<th>薬剤名</th>
				<td><?= form_input($param_search_medicine); ?></td>
			</tr>
			<tr>
				<th>地域</th>
				<td><?= form_input($param_search_area); ?></td>
			</tr>
			<tr>
				<th>年齢</th>
				<td><?= form_input($param_search_age); ?></td>
			</tr>
			<tr>
				<td><div class="serch"><?= form_submit($param_search_submit); ?></div>
					<?= form_close(); ?>
				</td>
			</tr>
		</table>

	</div><!-- search_area E -->
	<div id="list_area"><!-- list_area S -->
		<table class="table1">
			<thead>
				<th style="width:120px;">患者画像</th>
				<th style="width:90px;">患者名</th>
				<th style="width:140px;">患者名(カナ)</th>
				<th style="width:60px;">年齢</th>
				<th style="width:120px;">地域</th>
				<th style="width:200px;">病名</th>
				<th style="width:200px;">処方薬</th>
				<th style="width:400px;">注意事項</th>
				<th>詳細</th>
			</thead>
			<tbody>
			<?php foreach ($patient_list as $patient) { ?>
				<?php
					$param_submit = array(
						'id' => 'sub_'.$patient->id,
						'class' => 'btn btn-info',
						'name'  => 'sub',
		        'value' => '詳細',
					);
				?>
				<?= form_open('hospital/patient_details/'.$patient->id); ?>
				<tr>
					<td><img style="margin-left:25px;" width="50px" src="<?= base_url(); ?>assets/img/<?= $patient->image; ?>"></td>
					<td><?= str_replace(',', ' ', $patient->name); ?></td>
					<td><?= str_replace(',', ' ', $patient->name_kana); ?></td>
					<td><?= $year = (int) ((date('Ymd')-$patient->age)/10000); ?>歳</td>
					<td><?= str_replace(',', '', $patient->area); ?></td>
					<td><?= $patient->disease; ?></td>
					<td><?= $patient->medicine; ?></td>
					<td><?= $patient->caution; ?></td>
					<td><?= form_submit($param_submit); ?></td>
				</tr>
				<?= form_close(); ?>
			<?php } ?>
			</tbody>
		</table>
	</div><!-- list_area E -->
</div><!-- wrapper E -->
