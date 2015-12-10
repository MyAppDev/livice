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

/** ダミーログを生成、取得を行う
    false : 通常
    true : 緊急                */
DummyControl.prototype.asyncMakeDummyLog = function (flg){
    var altThis = this;
    var result = null;
    var strUrl = "/livice/Logger/make_dummy_log";
    if(flg){
        strUrl = "/livice/Logger/make_dummy_log?"
                + "bias_heartbeat_min=30&"
                + "bias_heartbeat_max=30&"
                + "bias_calories_min=30&"
                + "bias_calories_max=30&"
                + "bias_elevation_min=30&"
                + "bias_elevation_max=30&"
                + "bias_blood_min=30&"
                + "bias_blood_max=30&"
                + "bias_speed_min=30&"
                + "bias_speed_max=30"
    }


    $.ajax({
        scriptCharset: 'utf-8',
        url: strUrl,
        dataType: 'html',
    }).done(function(data){
        //console.debug('success!!!' + data);
        var jsonObj = $.parseJSON(data);
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
    //console.log(altThis.getHeartbeat());
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

/** 緊急ボタンが押下された際の処理 */
DummyControl.prototype.emergencyButtonClick = function (){
    var altThis = this;
    $("#emergency_button").click(function () {
      $(this).removeClass('btn-default');
      $(this).toggleClass("btn-danger");
    });
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

      // 緊急割り込み
      dc.emergencyButtonClick();

      $('#container').highcharts({
          chart: {
              type: 'spline',
              animation: Highcharts.svg, // don't animate in old IE
              marginRight: 10,
              events: {
                  load: function () {

                      // set up the updating of the chart each second
                      var series = this.series[0];
                      setInterval(function () {
                          var x = (new Date()).getTime(), // current time
                          y = ( Math.random() * ( ( 80 + 1 ) - 50 ) ) + 50;

                          // 初期化
                          dc.initialization();
                          // 割り込み判定
                          if($("#emergency_button").hasClass("btn-danger")){
                              // Ajaxでのデータを取得
                              var json = dc.asyncMakeDummyLog(true);
                              // 心拍取得
                              y = dc.getHeartbeat();
                              // 点滅処理
                              dc.emergencyAlert(y);
                          } else {
                            var json = dc.asyncMakeDummyLog(false);
                            y = dc.getHeartbeat();
                          }

                          series.addPoint([x, y], true, true);
                      }, 1000);
                  }
              }
          },
          title: {
              text: 'リアルタイム心拍数',
              style: {
                  fontSize: '24px',
                  color: '#333',
              }
          },
          xAxis: {
              type: 'datetime',
              tickPixelInterval: 150
          },
          yAxis: {
              title: {
                  text: '心拍数',
                  style: {
                      fontSize: '24px',
                      color: '#333',
                  }
              },
              plotLines: [{
                  value: 91,// 警告ライン
                  width: 2,
                  color: '#F44336',
                  dashStyle: 'shortdash',
                  label: {
                        text: '警告値'
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
