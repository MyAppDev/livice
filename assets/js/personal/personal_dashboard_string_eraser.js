$(function(){
  console.log('personal_dashboard_string_eraser.js');
 	//.replace 要素内の文字列を除去
	$('#wrapper').each(function(){
		var txt = $(this).html();
		$(this).html(txt.replace(/Highcharts.com/g,''));
	});
});
