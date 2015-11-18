$(document).ready(function() {

	/*
	* Plugin intialization
	*/
	$('#pagepiling').pagepiling({
    direction: 'horizontal',
		menu: '#menu',
		anchors: ['page1', 'page2', 'page3', 'page4', 'page5'],
    sectionsColor: ['#444', '#ee005a', '#2C3E50', '#39C'],
    navigation: {
    	'position': 'right',
   		'tooltips': ['Page 1', 'Page 2', 'Page 3', 'Page 4', 'Page5']
   	},
    afterRender: function(){
    	$('#pp-nav').addClass('custom');
    },
    afterLoad: function(anchorLink, index){
    	if(index>1){
    		$('#pp-nav').removeClass('custom');
    	}else{
    		$('#pp-nav').addClass('custom');
    	}
    }
  });


	/*
   * Internal use of the demo website
   */
  $('#showExamples').click(function(e){
		e.stopPropagation();
		e.preventDefault();
		$('#examplesList').toggle();
	});

	$('html').click(function(){
		$('#examplesList').hide();
	});

	/**
	 * シフトキーを押下時にホームへ戻る
	 */
	$(window).keyup(function(e){
		if(e.keyCode == 32){
			window.location.href = '/livice/Personal/home#page1';
		}
	});
});
