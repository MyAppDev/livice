/**
 * 病院側・ウェアラブル画面に利用する為のスクリプト
 * SQLiteからの読み込み処理実施
 */
/** ダミーデータクラス */
var DummyControl = function(){

    /** 心拍 */
    this.heartbeat;
    /** カロリー */
    this.calories;
    /** 高度 */
    this.elevation;
    /** 血中濃度 */
    this.blood;
    /** 速度 */
    this.speed;

};

/** セッター */
DummyControl.prototype.setHeartbeat = function(heartbeat){
    this.heartbeat = heartbeat;
};
DummyControl.prototype.setCalories = function(calories){
    this.calories = calories;
};
DummyControl.prototype.setElevation = function(elevation){
    this.elevation = elevation;
};
DummyControl.prototype.setBlood = function(blood){
    this.blood = blood;
};
DummyControl.prototype.setSpeed = function(speed){
    this.speed = speed;
};

/** ゲッター */
DummyControl.prototype.getHeartbeat = function(){
    return this.heartbeat;
};
DummyControl.prototype.getCalories = function(){
    return this.calories;
};
DummyControl.prototype.getElevation = function(){
    return this.elevation;
};
DummyControl.prototype.getBlood = function(){
    return this.blood;
};
DummyControl.prototype.getSpeed = function(){
    return this.speed;
};

/** ダミーログの取得を行う */
DummyControl.prototype.asyncCurrDummyLog = function (){
  var altThis = this;
  var result = null;
  $.ajax({
      scriptCharset: 'utf-8',
      url: "/livice/Logger/curr_dummy_log",
      dataType: 'html',
  }).done(function(data){
      console.debug('success!!!' + data);
      var jsonObj = $.parseJSON(data)[0];
      //console.debug(jsonObj);
      //console.log(jsonObj.heartbeat);
      altThis.setHeartbeat(jsonObj.heartbeat);
      altThis.setCalories(jsonObj.calories);
      altThis.setElevation(jsonObj.elevation);
      altThis.setBlood(jsonObj.blood);
      altThis.setSpeed(jsonObj.speed);
  }).fail(function(data){
      console.log('error!!!' + data);
  });
  console.log(altThis.getHeartbeat());
  // console.log(altThis.getCalories());
  // console.log(altThis.getElevation());
  // console.log(altThis.getBlood());
  // console.log(altThis.getSpeed());
};

/** ダミーログの初期化を行う */
DummyControl.prototype.asyncInitDummyLog = function (num){
  var altThis = this;
  var result = null;
  $.ajax({
      scriptCharset: 'utf-8',
      url: "/livice/Logger/init_dummy_log/" + num,
      dataType: 'html',
  }).done(function(data){
      console.debug('success!!!' + data);
      var jsonObj = $.parseJSON(data)[0];
      //console.debug(jsonObj);
      //console.log(jsonObj.heartbeat);
      altThis.setHeartbeat(jsonObj.heartbeat);
      altThis.setCalories(jsonObj.calories);
      altThis.setElevation(jsonObj.elevation);
      altThis.setBlood(jsonObj.blood);
      altThis.setSpeed(jsonObj.speed);
  }).fail(function(data){
      console.log('error!!!' + data);
  });
  console.log(altThis.getHeartbeat());
  // console.log(altThis.getCalories());
  // console.log(altThis.getElevation());
  // console.log(altThis.getBlood());
  // console.log(altThis.getSpeed());
};

/** 閾値を超えた際の処理 */
DummyControl.prototype.emergencyAlert = function (num){
    var altThis = this;
    var thresholds = 90; //閾値
    if(thresholds < num){
      $('#emergency').show();
      $('#emergency').fadeOut(500,function(){$(this).fadeIn(500)});
    } else {
      $('#emergency').hide();
    }
};

/** 初期化処理 */
DummyControl.prototype.initialization = function (){
    var altThis = this;
    $('#emergency').hide();
};

$(function () {
  var dc = new DummyControl();

  $(document).ready(function () {
      Highcharts.setOptions({
          global: {
              useUTC: false
          }
      });

      $('#container').highcharts({
          chart: {
              type: 'spline',
              animation: Highcharts.svg, // don't animate in old IE
              marginRight: 10,
              backgroundColor: '#000', //　チャート全体の背景色
              events: {
                  load: function () {

                      // set up the updating of the chart each second
                      var series = this.series[0];
                      setInterval(function () {
                          var x = (new Date()).getTime(), // current time
                          y = Math.random();
                          // Ajaxでのデータを取得
                          var json = dc.asyncCurrDummyLog();
                          y = dc.getHeartbeat();
                          // 点滅処理
                          dc.emergencyAlert(y);

                          series.addPoint([x, y], true, true);
                      }, 1000);
                  }
              }
          },
          title: {
              text: 'リアルタイム心拍数',
              style: {
								  fontSize: '24px', // タイトルの文字サイズ
                  color: '#fff',
							}
          },
          xAxis: {
              type: 'datetime',
              tickPixelInterval: 150,
              labels: {
								  style: {
								      fontSize: '20px', // y軸目盛の文字サイズ
                      color: '#fff',
                  }
							},
          },
          yAxis: {
              title: {
                  text: '心拍数',
                  style: {
                      fontSize: '24px',
                      color: '#fff',
    							}
              },
              labels: {
								  style: {
								      fontSize: '20px', // y軸目盛の文字サイズ
                      color: '#fff',
								  }
							},
              plotLines: [{
                  value: 91, //警告ライン
                  width: 2,
                  color: '#F44336',
                  dashStyle: 'shortdash',
                  label: {
                        text: '警告値',
                        style: {
                          fontSize: '20px', // y軸目盛の文字サイズ
                          color: 'red',
                        },
                  }
              }],
              min: 50,// 最小値
              max: 120,//最大値
          },
          tooltip: {
              formatter: function () {
                  return '<b>' + this.series.name + '</b><br/>' +
                      Highcharts.dateFormat('%Y-%m-%d %H:%M:%S', this.x) + '<br/>' +
                      Highcharts.numberFormat(this.y, 2);
              }
          },
          legend: {
              enabled: false
          },
          exporting: {
              enabled: false
          },
          series: [{
              name: '心拍数',
              data: (function () {
                  // generate an array of random data
                  var data = [],
                      time = (new Date()).getTime(),
                      i;

                  for (i = -19; i <= 0; i += 1) {
                      data.push({
                          x: time + i * 1000,
                          y: ~~(Math.random()*(80-60)+60)
                      });
                  }
                  return data;
              }())
          }]
      });
  });
});
