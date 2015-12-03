/**
 * 患者詳細ページ用スクリプト
 */
// URL解析関数
var urlAnalysis = function(){
  // パラメータ用の配列を用意
  var paramArray = [];

  // URLを取得して「?]で分割「&」でも分割
  var url   = location.href;
  params    = url.split("?");
  console.log("length" + params.length);
  if(1 < params.length){
    paramms   = params[1].split("&");
    // 配列にパラメータを格納
    for ( i = 0; i < paramms.length; i++ ) {
        neet = paramms[i].split("=");
        paramArray.push(neet[0]);
        paramArray[neet[0]] = neet[1];
    }
  }
  return paramArray;
}


 // トースト通知クラス
 var Toast = (function(){
     var timer;
     var speed;
     function Toast() {
         this.speed = 3000;
     }
     // メッセージを表示。表示時間(speed)はデフォルトで3秒
     Toast.prototype.show = function(message, speed) {
         if (speed === undefined) speed = this.speed;
         $('.toast').remove();
         clearTimeout(this.timer);
         $('#toastr_area').append('<div class="toast">' + message + '</div>');
         var leftpos = $('#toastr_area').width()/2 - $('.toast').width()/2;
         $('.toast').css('left', leftpos).hide().fadeIn('fast');
         this.timer = setTimeout(function(){
             $('.toast').fadeOut('slow',function(){
                 $(this).remove();
             });
         }, speed);
     };
     return Toast;
 })();

// トースト通知クラスをインスタンス化
var toast = new Toast();

// 実行
$(function() {
  $("#tab_area li.tab_head").click(function() {
    $("#tab_area li.tab_head").css("background-color", "#E6E6E6");
    $(this).css("background-color", "#ffffff");
    $("#tab_area div.cont").hide();
    $($("a", this).attr("href")).show();
  });
  $("#tab1").click();

  // URLで処理を分岐
  var paramArray = urlAnalysis();
  console.debug(paramArray);

  // パラメータによって処理を分岐
  if ( paramArray["advice_add"] == 1) {
      $("#tab4").click();
      toast.show('アドバイスの登録が完了しました。', 5000);
  } else {
      $("#tab1").click();
  }

});
