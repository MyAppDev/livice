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
      // 患者番号は決め打ち
      // $("#patient_list > tbody > tr:first").addClass("emergency");
      $("#patient_list > tbody > #123456789012").addClass("emergency");

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


// オートコンプリート
function autocomplete(){
	console.log("autocomplete");
  // 患者名
  var data_patient = [
    "佐藤,蓮太朗",
		"鈴木,一郎",
		"高橋,健太",
		"田中,光",
		"林,光秀",
		"伊藤,奏",
		"小林,美好",
		"池田,明正",
		"清水,竜也",
		"西村,美咲",
  ];
  // 病名
  var data_disease = [
    "肺炎",
    "胆石症",
    "心筋梗塞",
    "高血圧症",
    "糖尿病",
    "脳出血",
    "くも膜下出血",
    "パーキンソン病",
    "高脂血症",
    "慢性心不全",
  ];
  // 薬
  var data_medicine = [
    "アストミン散10％",
    "コリオパン顆粒2%",
    "ワソラン錠40mg",
    "ペルジピンLAカプセル40mg",
    "メキシチールカプセル50mg",
    "セロクラール錠20mg",
    "キサンボンS注射液40mg",
    "カバサール錠0.25mg",
    "エラスチーム錠1800",
    "アカルディカプセル2.5",
  ];
  // 地域
  var data_area = [
    "大阪府,東大阪市",
    "大阪市,堺市",
    "大阪市,枚方市",
    "大阪市,八尾市",
    "大阪市,松原市",
    "大阪市,藤井寺市",
    "大阪市,泉佐野市",
    "大阪市,箕面市",
  ];
  //　年齢
  var data_age = [
    "66",
    // "67",
    "93",
    "84",
    "83",
    "71",
    "78",
    "70",
    "80",
  ];
  $('#search_patient').autocomplete({
      source: data_patient,
      autoFocus: true,
      delay: 100,
      minLength: 1
  });
  $('#search_disease').autocomplete({
      source: data_disease,
      autoFocus: true,
      delay: 100,
      minLength: 1
  });
  $('#search_medicine').autocomplete({
      source: data_medicine,
      autoFocus: true,
      delay: 100,
      minLength: 1
  });
  $('#search_area').autocomplete({
      source: data_area,
      autoFocus: true,
      delay: 100,
      minLength: 1
  });
  $('#search_age').autocomplete({
      source: data_age,
      autoFocus: true,
      delay: 100,
      minLength: 1
  });
}

// 検索キー押下時の処理
$("search_submit").on("click", function(){
  console.log("search_submit");
  //半角スペースをカンマに変換

  // return false;
});


$(function () {
  /** 検索ボックスへのオートコンプリート */
  // autocomplete();

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
