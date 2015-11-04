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

$(function () {
  var dc = new DummyControl();

  $(document).ready(function () {
      Highcharts.setOptions({
          global: {
              useUTC: false
          }
      });

      $('.container_dummy').highcharts({
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
                          y = Math.random();
                          // Ajaxでのデータを取得
                          // var json = dc.asyncCurrDummyLog();
                          // y = dc.getHeartbeat();
                          series.addPoint([x, y], true, true);
                      }, 1000);
                  }
              }
          },
          title: {
              text: 'リアルタイム心拍数'
          },
          xAxis: {
              type: 'datetime',
              tickPixelInterval: 150
          },
          yAxis: {
              title: {
                  text: '心拍数'
              },
              plotLines: [{
                  value: 0,
                  width: 1,
                  color: '#808080'
              }]
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
                          y: Math.random()
                      });
                  }
                  return data;
              }())
          }]
      });
  });
});
