/**
 * css を　上書きします。
 * DOM構築完了後に実行されます。
 */
$(document).ready(function(){
  console.log('home_css_override. Start overwriting!');

  // ex) ホーム画面の背景色を白に塗り替える
  // $('#section1').css('background-color', '#fff');
  // $('#home_top').css('border-radius','30px');
  // $('#home_top').css('background-color','#000');

  // ex) 画像を差し替える
  // $("#home_top img").attr("src","/livice/assets/img/ic_evernote.png");

});
