$(document).ready(function(){
    $('#slider').bxSlider({
    auto: false,
    pager: true,
    speed: 1000,
    prevText: '前へ', //前へのテキスト
    nextText: '次へ', //次へのテキスト
    keyboard: true,
    easing: 'easeOutBounce'
    });
});
