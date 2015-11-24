<!-- jQuery -->
<!--script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script-->
<script type="text/javascript" src="<?= base_url(); ?>assets/js/jquery-1.11.3.min.js"></script>

<!-- bxSlider -->
<link type="text/css"  href="<?= base_url(); ?>assets/css/jquery.bxslider.css" rel="stylesheet">
<script type="text/javascript" src="<?= base_url(); ?>assets/js/jquery.bxslider.js"></script>

<!-- highcharts -->
<!-- <script type="text/javascript" src="<?= base_url(); ?>assets/js/highcharts.js"></script> -->
<!-- <script type="text/javascript" src="<?= base_url(); ?>assets/js/modules/exporting.js"></script> -->

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

<!--hospital_patient_details.js タブコントロールなど -->
<script type="text/javascript" src="<?= base_url(); ?>assets/js/hospital/hospital_patient_details.js"></script>

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

/* タブ用 デザインはおまかせします */
#tab_area > ul {
	padding: 8px;
	margin-bottom: -9px;
}
#tab_area li.tab_head { display: inline-block; }
#tab_area div.cont {
	border : 1px solid #888888;
	padding: 5px;
}
#tab_area > ul > li.tab_head {
		width: 100px;
		height: 40px;
		border-style: solid;
		border-width: 1px 1px 0px 1px;
	 	border-color: #888888;
}

</style>

<div id="wrapper"><!-- wrapper S -->
	<!-- <a href="<?= base_url(); ?>Hospital/patient_list">
		<button type="button" class="btn btn-info" style="margin-left:10px;">
		  <span class="glyphicon glyphicon-chevron-left"></span>
			患者リストへ
		</button>
	</a> -->

	<!-- ここにタブを構築 -->
	<div id="tab_area"><!-- tab_area S -->
		<ul>
		  <li id="tab1" class="tab_head"><a href="#cont1">プロフィール</a></li>
		  <li id="tab2" class="tab_head"><a href="#cont2">年間グラフ</a></li>
		  <li id="tab3" class="tab_head"><a href="#cont3">おすすめ</a></li>
		</ul>
		<div id="cont1" class="cont"><!-- cont1 S  -->
			<table class="table1">
			<?php	foreach ($patient_info as $patient) {	?>
				<tr>
					<th class="t_top" width="150px"  style="font-weight:bold;">患者画像</th>
					<td class="t_top"><img width="50px" src="<?= base_url(); ?>assets/img/<?= $patient->image; ?>"></td>
				</tr>
				<tr>
					<th style="font-weight:bold;">患者名</th>
					<td><?= str_replace(',', ' ', $patient->name); ?></td>
				</tr>
				<tr>
					<th style="font-weight:bold;">患者名カナ</th>
					<td><?= str_replace(',', ' ', $patient->name_kana); ?></td>
				</tr>
				<tr>
					<th style="font-weight:bold;">生年月日</th>
					<td>
						<?php
						 	$year = mb_substr($patient->age, 0, 4);
							$month = mb_substr($patient->age, 4, 2);
							$day = mb_substr($patient->age, 6, 2);
							echo $year.'年'.$month.'月'.$day.'日';
					 	?></td>
				</tr>
				<tr>
					<th style="font-weight:bold;">地域</th>
					<td><?= str_replace(',', '', $patient->area); ?></td>
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
		</div><!-- cont1 E  -->
		<div id="cont2" class="cont"><!-- cont2 S  -->
			<!-- 医師へのメッセージ表示コンテナ
						適宜デザインの変更をお願いします	-->
			<div id="container_message" style="min-width: 70%; height: 50%; margin: 0 auto"><!-- container_message S -->
				<?= $analysis_message['heartbeat'];// 心拍に関するメッセージ ?>
				<?= $analysis_message['blood_pressure'];// 血圧に関するメッセージ ?>
				<?= $analysis_message['body_temperature'];// 体温に関するメッセージ ?>
			</div><!-- container_message E -->

			<!-- 心拍年間グラフ -->
			<div id="container_heartbeat_year" style="min-width: 70%; height: 50%; margin: 0 auto"></div>
			<!-- 血圧年間グラフ -->
			<div id="container_blood_year" style="min-width: 70%; height: 50%; margin: 0 auto"></div>
			<!-- 体温年間グラフ -->
			<div id="container_body_temperature_year" style="min-width: 70%; height: 50%; margin: 0 auto"></div>

			<script type="text/javascript">
			$(function () {
			    var altThis = this;
			    /** 心拍用データ */
			    // var data_heartbeat = [3, 2, 1, 3, 4, 3, 7, 1, 3, 4, 10, 11];
					var data_heartbeat = [<?= $patient->data_heartbeat ?>];
			    /** 血圧用データ */
			    var data_blood = [<?= $patient->data_blood ?>];
			    /** 体温用データ */
			    var data_body_temperature = [<?= $patient->data_body_temperature ?>];

			    console.log('patient_details_yearly_transition');
					// 心拍年間グラフ
			    $('#container_heartbeat_year').highcharts({
			        title: {
			            text: '心拍年間推移'
			        },
			        xAxis: {
			            categories: ['1月', '2月', '3月', '4月', '5月', '6月', '7月', '8月', '9月', '10月', '11月', '12月']
			        },
							yAxis: {
		              title: {
		                  text: '心拍数'
		              },
		              plotLines: [
										{
		                  value: 91,// 警告ライン
		                  width: 2,
		                  color: '#F44336',
		                  dashStyle: 'shortdash',
		                  label: {
		                        text: '警告値',
														style: {
		                          //fontSize: '20px', // y軸目盛の文字サイズ
		                          color: 'red',
		                        },
		                  }
		              	},
										{
		                  value: 60,// 平常値下限ライン
		                  width: 2,
		                  color: '#7986CB',
		                  dashStyle: 'shortdash',
		                  label: {
		                        text: '平常値下限',
														style: {
		                          //fontSize: '20px', // y軸目盛の文字サイズ
		                          color: 'blue',
		                        },
		                  }
		              	},
										{
		                  value: 80,// 平常値上限ライン
		                  width: 2,
		                  color: '#7986CB',
		                  dashStyle: 'shortdash',
		                  label: {
		                        text: '平常値上限',
														style: {
		                          //fontSize: '20px', // y軸目盛の文字サイズ
		                          color: 'blue',
		                        },
		                  }
		              	},
									],
		              min: 50,// 最小値
		              max: 120,//最大値
		          },
			        labels: {
			            items: [{
			                html: '',
			                style: {
			                    left: '50px',
			                    top: '18px',
			                    color: (Highcharts.theme && Highcharts.theme.textColor) || 'black'
			                }
			            }]
			        },
			        series: [{
			            type: 'column',
			            name: '心拍',
			            data: data_heartbeat
			        },]
			    });

					// 血圧年間グラフ
			    $('#container_blood_year').highcharts({
			        title: {
			            text: '血圧年間推移'
			        },
			        xAxis: {
			            categories: ['1月', '2月', '3月', '4月', '5月', '6月', '7月', '8月', '9月', '10月', '11月', '12月']
			        },
							yAxis: {
		              title: {
		                  text: '血圧'
		              },
		              plotLines: [
										{
		                  value: 140,// 警告ライン
		                  width: 2,
		                  color: '#F44336',
		                  dashStyle: 'shortdash',
		                  label: {
		                        text: '警告値',
														style: {
		                          //fontSize: '20px', // y軸目盛の文字サイズ
		                          color: 'red',
		                        },
		                  }
		              	},
										{
		                  value: 80,// 平常値下限ライン
		                  width: 2,
		                  color: '#7986CB',
		                  dashStyle: 'shortdash',
		                  label: {
		                        text: '平常値下限',
														style: {
		                          //fontSize: '20px', // y軸目盛の文字サイズ
		                          color: 'blue',
		                        },
		                  }
		              	},
										{
		                  value: 130,// 平常値上限ライン 文字被り回避の為あえて130にしています。(本来:135)
		                  width: 2,
		                  color: '#7986CB',
		                  dashStyle: 'shortdash',
		                  label: {
		                        text: '平常値上限',
														style: {
		                          //fontSize: '20px', // y軸目盛の文字サイズ
		                          color: 'blue',
		                        },
		                  }
		              	},
									],
		              min: 70,// 最小値
		              max: 150,//最大値
		          },
			        labels: {
			            items: [{
			                html: '',
			                style: {
			                    left: '50px',
			                    top: '18px',
			                    color: (Highcharts.theme && Highcharts.theme.textColor) || 'black'
			                }
			            }]
			        },
			        series: [{
			            type: 'column',
			            name: '血圧',
			            data: data_blood
			        },]
			    });

					// 体温年間グラフ
			    $('#container_body_temperature_year').highcharts({
			        title: {
			            text: '体温年間推移'
			        },
			        xAxis: {
			            categories: ['1月', '2月', '3月', '4月', '5月', '6月', '7月', '8月', '9月', '10月', '11月', '12月']
			        },
							yAxis: {
		              title: {
		                  text: '体温'
		              },
		              plotLines: [
										{
		                  value: 38,// 警告ライン
		                  width: 2,
		                  color: '#F44336',
		                  dashStyle: 'shortdash',
		                  label: {
		                        text: '警告値',
														style: {
		                          //fontSize: '20px', // y軸目盛の文字サイズ
		                          color: 'red',
		                        },
		                  }
		              	},
										{
		                  value: 36.6,// 平常値下限ライン
		                  width: 2,
		                  color: '#7986CB',
		                  dashStyle: 'shortdash',
		                  label: {
		                        text: '平常値下限',
														style: {
		                          //fontSize: '20px', // y軸目盛の文字サイズ
		                          color: 'blue',
		                        },
		                  }
		              	},
										{
		                  value: 37.2,// 平常値上限ライン
		                  width: 2,
		                  color: '#7986CB',
		                  dashStyle: 'shortdash',
		                  label: {
		                        text: '平常値上限',
														style: {
		                          //fontSize: '20px', // y軸目盛の文字サイズ
		                          color: 'blue',
		                        },
		                  }
		              	},
									],
		              min: 34,// 最小値
		              max: 40,//最大値
		          },
			        labels: {
			            items: [{
			                html: '',
			                style: {
			                    left: '50px',
			                    top: '18px',
			                    color: (Highcharts.theme && Highcharts.theme.textColor) || 'black'
			                }
			            }]
			        },
			        series: [{
			            type: 'column',
			            name: '体温',
			            data: data_body_temperature
			        },]
			    });
			});
			</script>
		</div><!-- cont2 E  -->
		<div id="cont3" class="cont"><!-- cont3 S  -->
			<!-- <h3 class="h3 text-success">おすすめコンテンツ</h3> -->
			<table class="table1">
				<tr>
					<th>生活改善のアドバイス</th>
					<td><?= $patient->advice ?></td>
				<tr>
				<tr>
					<th>ジュネリック医薬品</th>
					<td><?= $patient->generic_drug ?></td>
				<tr>
				<tr>
					<th>健康食品</th>
					<td><?= $patient->health_food ?></td>
				<tr>
			</table>
		</div><!-- cont3 E  -->
	</div><!-- tab_area E -->
</div><!-- wrapper E -->
