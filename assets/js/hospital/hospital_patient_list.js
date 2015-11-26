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
      // 対象レコードへクラスを付与
      $("#patient_list > tbody > tr:first").addClass("emergency");

      $(".emergency > td").animate(
        {
          backgroundColor: "#EF5350",
        },
        500,
        function(){
          $(this).animate({ backgroundColor: "" }, 500);
        }
      );
    } else {
      // 対象レコードからクラスを剥奪
      $("#patient_list > tbody > tr:first").removeClass("emergency");
    }
};

/** 初期化処理 */
DummyControl.prototype.initialization = function (){
    var altThis = this;
};

$(function () {
  var dc = new DummyControl();

  $(document).ready(function () {
    console.log('hospital_patient_list.js');

    // 1秒毎に処理を実行
    var timer = setInterval( function () {
      // Ajaxでのデータを取得
      var json = dc.asyncCurrDummyLog();
      y = dc.getHeartbeat();
      // 点滅処理
      dc.emergencyAlert(y);
    } , 1000 );

      // 繰り返しを中止する場合
      // clearInterval( timer );
  });
});
