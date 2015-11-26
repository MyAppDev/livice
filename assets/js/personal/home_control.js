/** ホームコントロールクラス */
var HomeControl = function(){

		/** アドバイスID */
		this.adviceId;

    /** アドバイス */
    this.advice;

		/** 登録日 */
		this.created;

};

/** セッター */
HomeControl.prototype.setAdviceId = function(adviceId){
    this.adviceId = adviceId;
};
HomeControl.prototype.setAdvice = function(advice){
    this.advice = advice;
};
HomeControl.prototype.setCreated = function(created){
    this.created = created;
};
/** ゲッター */
HomeControl.prototype.getAdviceId = function(){
    return this.adviceId;
};
HomeControl.prototype.getAdvice = function(){
    return this.advice;
};
HomeControl.prototype.getCreated = function(){
    return this.created;
};
/** アドバイスの取得を行う */
HomeControl.prototype.asyncLatestAdvice = function (patient_number){
  var altThis = this;
  var result = null;
  $.ajax({
      scriptCharset: 'utf-8',
      url: "/livice/Hospital/async_get_latest_advice/"+ patient_number,
      dataType: 'html',
  }).done(function(data){
      console.debug('success!!!' + data);
      var jsonObj = $.parseJSON(data)[0];
      // console.debug(jsonObj);
      //console.log(jsonObj.heartbeat);
      altThis.setAdviceId(jsonObj.id);
      altThis.setAdvice(jsonObj.advice);
      altThis.setCreated(jsonObj.created);
  }).fail(function(data){
      console.log('error!!!' + data);
  });
  // console.log(altThis.getAdvice());
  // console.log(altThis.getCalories());
  // console.log(altThis.getElevation());
  // console.log(altThis.getBlood());
  // console.log(altThis.getSpeed());
};

$(document).ready(function() {
	console.debug('home_control.js');

	/*
	* Plugin intialization
	*/
	$('#pagepiling').pagepiling({
    direction: 'horizontal',
		menu: '#menu',
		anchors: ['page1', 'page2', 'page3', 'page4', 'page5'],
    sectionsColor: ['#000', '#111', '#000', '#111', '#000'],// 背景色は要編集
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

	/**
	 * 最新のアドバイス取得する
	 */
	var hm = new HomeControl();

	// 患者番号(決め打ち)
	var PATIENT_NUMBER = '912345678901';
	// 最新のアドバイスID
	var latestAdviceId = 0;

	// 1秒毎に処理を実行
	var timer = setInterval( function () {
		hm.asyncLatestAdvice(PATIENT_NUMBER);
		if(latestAdviceId < hm.getAdviceId()){
			latestAdviceId = hm.getAdviceId();
			console.debug('最新のアドバイスID = ' + hm.getAdviceId());
			console.debug('アドバイス = ' + hm.getAdvice());
			console.debug('登録日 = ' + hm.getCreated());

			// Todo ・・・
			//通知処理　
		}
	} , 1000 );

});
