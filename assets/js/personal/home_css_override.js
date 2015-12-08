/**
 * css を　上書きします。
 * DOM構築完了後に実行されます。
 */
$(document).ready(function(){
  console.log('home_css_override. Start overwriting!');

  // ex) ホーム画面の背景色を白に塗り替える
  // $('#section1').css('background-color', '#fff');
   $('#home_top').css('border-radius','30px');
   $('#home_top').css('background-color','rgba(255,255,255,0.2)');
   $('#home_top').css('padding-bottom','200px');
   $('#resultE p').css('font-size','20px');

  //$('#home_top').css('opacity','0.1');

  // ex) 画像を差し替える
  // $("#home_top img").attr("src","/livice/assets/img/ic_evernote.png");

});
