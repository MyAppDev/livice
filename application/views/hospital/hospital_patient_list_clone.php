<!-- jQuery -->
<!--script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script-->
<script type="text/javascript" src="<?= base_url(); ?>assets/js/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/bower_components/jquery-color-2.1.1/jquery.color.js"></script>

<!-- bxSlider -->
<link type="text/css"  href="<?= base_url(); ?>assets/css/jquery.bxslider.css" rel="stylesheet">
<script type="text/javascript" src="<?= base_url(); ?>assets/js/jquery.bxslider.js"></script>

<!-- highcharts -->
<!-- <script type="text/javascript" src="<?= base_url(); ?>assets/js/highcharts.js"></script> -->
<!-- <script type="text/javascript" src="<?= base_url(); ?>assets/js/modules/exporting.js"></script> -->

<!-- bootstrap -->
<!--<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/bootstrap.min.css" > -->
<script type="text/javascript" src="<?= base_url(); ?>assets/js/bootstrap.min.js"></script>

<!--hospital_dashboard -->
<script type="text/javascript" src="<?= base_url(); ?>assets/js/hospital/hospital_dashboard.js"></script>

<!--hospital_dashboard_dummy_user -->
<script type="text/javascript" src="<?= base_url(); ?>assets/js/hospital/hospital_dashboard_dummy_user_1.js"></script>

<!--hospital_patient_list -->
<script type="text/javascript" src="<?= base_url(); ?>assets/js/hospital/hospital_patient_list.js"></script>

<style type="text/css">
.table1 {
    width:100%;
    margin: 15px auto 10px;
}

.table1 th{
    font-size: 18px;
    padding-bottom:5px;
    text-align: left;
    font-weight: bold;
}

.table1 td{
    padding:3px 0 3px 0;
    margin:0px;
    border-top:1px dotted #6E6E6E;
    font-size: 18px;
    text-align: left;
}

#list_area {
	margin:5px 0 0 0;
	padding-top:30px;
	border-top:1px solid #E6E6E6;
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
	padding-left: 5px;
	font-size: 18px;
	margin-bottom: 20px;
}

#search {
	margin-left:10px;
}

#search input[type="text"] {
  /*font-weight: bold;*/
  /*color: red;*/
  /*font-size: 13px;*/
  font-size: 0.8em;
}
#search input[type="number"] {
  font-size: 0.8em;
}

#search_patient {
	width:120px;
	height:25px;
	margin-left:5px;
}

#search_disease {
	width:120px;
	height:25px;
	margin-left:10px;
}

#search_area {
	width:120px;
	height:25px;
	margin-left:10px;
}

#search_medicine {
	width:120px;
	height:25px;
	margin-left:10px;
}

#search_age {
	width:60px;
	height:25px;
	margin-left:10px;
}

#search_submit {
	width:80px;
	margin-left:20px;
	margin-top:-5px;
}

.text-success {
    background:#2E8B57;
    color:#fff;
    width:115px;
    padding:6px 6px 6px 9px;
}

/*緊急用点滅*/
.emergency{
	/*background-color: red;	*/
	/*width: 100%;*/
	/*height: 400px;*/
	/*background-color: red;*/
	/*opacity: 0.3;*/
	/*position: absolute;*/
	/*z-index: 1000;*/
}
</style>

<div id="wrapper"><!-- wrapper S -->
	<div id="search"><!-- search_area S -->
		<?php
			$param_search_patient = array(
				'id' => 'search_patient',
				'class' => '',
				'name'  => 'search_patient',
        'autocomplete'=>'on',
        'list'=>'data_patient',
				'value' => set_value('search_patient'),
			);
			$param_search_disease = array(
				'id' => 'search_disease',
				'class' => '',
				'name'  => 'search_disease',
        'autocomplete'=>'on',
        'list'=>'data_disease',
				'value' => set_value('search_disease'),
			);
			$param_search_medicine = array(
				'id' => 'search_medicine',
				'class' => '',
				'name'  => 'search_medicine',
        'autocomplete'=>'on',
        'list'=>'data_medicine',
				'value' => set_value('search_medicine'),
			);
			$param_search_area = array(
				'id' => 'search_area',
				'class' => '',
				'name'  => 'search_area',
        'autocomplete'=>'on',
        'list'=>'data_area',
				'value' => set_value('search_area'),
			);
			$param_search_age = array(
				'id' => 'search_age',
				'class' => '',
				'name'  => 'search_age',
        'autocomplete'=>'on',
        'list'=>'data_age',
        'type'=> 'number',
				'value' => set_value('search_age'),
			);
			$param_search_submit = array(
				'id' => 'search_submit',
				'class' => 'btn btn-success',
				'name'  => 'search_submit',
        'value' => '検索',
			);
		?>
    <!-- 検索フォーム用データ -->
    <datalist id="data_patient">
      <?php foreach ($search_keywords as $keyword) { ?>
        <option value="<?= str_replace(',', ' ', $keyword->name); ?>">
          <?= str_replace(',', ' ', $keyword->name_kana); ?>
        </option>
      <?php } ?>
    </datalist>
    <datalist id="data_disease">
      <?php foreach ($search_keywords as $keyword) { ?>
        <option value="<?= str_replace(',', ' ', $keyword->disease); ?>"></option>
      <?php } ?>
    </datalist>
    <datalist id="data_medicine">
      <?php foreach ($search_keywords as $keyword) { ?>
        <option value="<?= str_replace(',', ' ', $keyword->medicine); ?>"></option>
      <?php } ?>
    </datalist>
    <datalist id="data_area">
      <?php foreach ($search_keywords as $keyword) { ?>
        <option value="<?= str_replace(',', ' ', $keyword->area); ?>"></option>
      <?php } ?>
    </datalist>
    <datalist id="data_age">
      <?php
      foreach ($search_keywords as $keyword) {
        $age_list[] = (int) ((date('Ymd')-$keyword->age)/10000);
      }
      asort($age_list);
      ?>
      <?php foreach ($age_list as $age) { ?>
        <option value="<?= $age ?>"></option>
      <?php } ?>
    </datalist>

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
		<table id="patient_list" class="table1">
			<thead>
                <th style="width:80px;">患者画像</th>
                <th style="width:130px;">患者名</th>
                <th style="width:160px;">患者名(カナ)</th>
				<th style="width:60px;">年齢</th>
				<th style="width:120px;">地域</th>
				<th style="width:140px;">病名</th>
				<th style="width:170px;">処方薬</th>
				<th style="width:250px;">注意事項</th>
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
					                    <td><img style="margin-left:12px;" width="50px" src="<?= base_url(); ?>assets/img/<?= $patient->image; ?>"></td>

					<td><var class="notflash"><?= str_replace(',', ' ', $patient->name); ?></var></td>
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
