/* *
 * ダミーロギングデータ制御
 *
 * @author  Masahiro Matsuoka
 * @note
 */

$(function(){
  var dc = new DummyControl();
}

/**
 * ダミーログ制御
 * @param {string}
 * @param {Array.<number>}
 * @constructor
 */
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
PullDownListControl.prototype.setCalories = function(calories){
    this.calories = calories;
};
PullDownListControl.prototype.setElevation = function(elevation){
    this.elevation = elevation;
};
PullDownListControl.prototype.setBlood = function(blood){
    this.blood = blood;
};
PullDownListControl.prototype.setSpeed = function(speed){
    this.speed = speed;
};

/** ダミーログを生成、取得を行う */
PullDownListControl.prototype.asyncMakeDummyLog = function (){
	var alt_this = this;
    $.ajax({
        scriptCharset: 'utf-8',
        url: "/livice/Logger/make_dummy_log",
    }).done(function(data){
        console.debug('success!!!' + data);
    }).fail(function(data){
        console.log('error!!!' + data);
    });
};

/** ダミーログの取得を行う */
PullDownListControl.prototype.asyncCurrDummyLog = function (){
	var alt_this = this;
    $.ajax({
        scriptCharset: 'utf-8',
        url: "/nh_cabinet/MCabinets/loadAsyncCabinet/" + this.cainetId,
    }).done(function(data){
        $("#target_area").html(data);
        alt_this.colorBlock();

        if('move' == $('#current_control_status').val()){
            // ブロック選択ボタンを非表示
            $('#sub_select_block').hide();
        }
        console.debug('success!!!' + data);
    }).fail(function(data){
        console.log('error!!!' + data);
    });
};
