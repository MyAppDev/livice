/** 病院側患者詳細で利用する */
var YearTransitionControl = function(){
    /** id */
    this.id;
    /** ユーザー */
    this.user;
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
    /** 日付け */
    this.created;

    /** コピー用オブジェクト */
    this.objClone;

    /** 心拍配列 */
    this.aryHeartbeat = [];
};

/** セッター */
YearTransitionControl.prototype.setId = function(id){
    this.id = id;
};
YearTransitionControl.prototype.setUser = function(user){
    this.user = user;
};
YearTransitionControl.prototype.setHeartbeat = function(heartbeat){
    this.heartbeat = heartbeat;
};
YearTransitionControl.prototype.setCalories = function(calories){
    this.calories = calories;
};
YearTransitionControl.prototype.setElevation = function(elevation){
    this.elevation = elevation;
};
YearTransitionControl.prototype.setBlood = function(blood){
    this.blood = blood;
};
YearTransitionControl.prototype.setSpeed = function(speed){
    this.speed = speed;
};
YearTransitionControl.prototype.setCreated = function(created){
    this.created = created;
};
YearTransitionControl.prototype.setAryHearbeat = function(heartbeat){
    //console.log(heartbeat);
    this.aryHeartbeat.push(heartbeat);
    // this.aryHeartbeat = aryHeartbeat.concat();
    // console.dir(this.aryHeartbeat);
};

/** ゲッター */
YearTransitionControl.prototype.getId = function(){
    return this.id;
};
YearTransitionControl.prototype.getUser = function(){
    return this.user;
};
YearTransitionControl.prototype.getHeartbeat = function(){
    return this.heartbeat;
};
YearTransitionControl.prototype.getCalories = function(){
    return this.calories;
};
YearTransitionControl.prototype.getElevation = function(){
    return this.elevation;
};
YearTransitionControl.prototype.getBlood = function(){
    return this.blood;
};
YearTransitionControl.prototype.getSpeed = function(){
    return this.speed;
};
YearTransitionControl.prototype.getCreated = function(){
    return this.created;
};
YearTransitionControl.prototype.getAryHeartbeat = function(){
    //console.debug(this.aryHeartbeat.pop());
    // console.dir(this.aryHeartbeat);
    return this.aryHeartbeat;
    // return $.extend(true, [], this.aryHeartbeat);
};

YearTransitionControl.prototype.rebuildDummyLog = function(){

    var altThis = this;
    var strUrl = "/livice/Logger/yearly_transition/2015:01:10/2016:01:10";

    var tmp;

    $.ajax({
        scriptCharset: 'utf-8',
        url: strUrl,
        dataType: 'html',
    }).done(function(data){
        // console.debug('success!!!' + data);
        var jsonObj = $.parseJSON(data);
        // console.debug(jsonObj);
        // console.debug(jsonObj[0]);

        var arySumCounter = [];
        var arySumHeartbeat = [];
        // コールバック(無名関数)
        var callback = function (element, index, array) {
            // ここで対象箇所へHTMLとして書き出し
            // ここでダウンサンプリングしてメンバ変数へ格納してみる
            createdSplit = element.created.split(':');
            // console.log(createdSplit);
            // 月毎に集計
            switch (createdSplit[1]) {
              case '01':
                // var arySumCounter[0] = $(arySumCounter)
                // var tmp = [].concat(arySumCounter);
                // // tmp = $.extend(true, [], arySumCounter);
                // cnt = parseInt(tmp.splice(0), 10);
                // arySumCounter[0] = tmp + 1;
                // // var cnt = arySumCounter.splice(0);
                // // console.log(toString.call(cnt));
                // // cnt = parseInt(arySumCounter[0], 10);
                // console.log(arySumCounter[0]);
                //cnt = parseInt(cnt);
                // console.log(element.heartbeat);
                // arySumCounter.push(arySumCounter.pop() + 1);
                // arySumCounter.splice( 0 , 0 , (cnt + 1)) ;
                //arySumHeartbeat[0] += element.heartbeat;
                // console.dir(arySumHeartbeat);
                break;
              case '02':

                break;
              case '03':

                break;
              case '04':

                break;
              case '05':

                break;
              case '06':

                break;
              case '07':

                break;
              case '08':

                break;
              case '09':

                break;
              case '10':

                break;
              case '11':

                break;
              case '12':

                break;
            }

            //console.log("a[" + index + "] = " + element.blood);
            // altThis.setAryHearbeat(element.heartbeat);
            //tmp.push(element.heartbeat);
            //altThis.objClone = $.extend(true, {}, element);
            //altThis.aryHeartbeat[index] = element.heartbeat;
            // tmp = element.heartbeat;
            // console.log(toString.call(element));
            //altThis.setAryHearbeat(altThis.objClone.heartbeat);
            //altThis.aryHeartbeat = tmp.concat();
        }
        // jsonObj.forEach(callback);
        // console.dir(jsonObj);
        // altThis.objClone = $.extend(true, {}, jsonObj);

          // console.log(arySumCounter[0]);
          // console.dir(arySumHeartbeat[0]/arySumCounter[0]);
    }).fail(function(data){
        console.log('error!!!' + data);
    });
};

$(function () {
    var altThis = this;
    //var array = [2,5,6,7,90.1];
    // var ytc = new YearTransitionControl();
    // ytc.rebuildDummyLog();
    // console.dir(ytc.getAryHeartbeat());
    // result = $.extend(true, [], ytc.getAryHeartbeat());
    // var object2 = $.extend(true, {}, object1);
    // result = ytc.getAryHeartbeat();
    // console.dir(ytc.objClone);
    // result.length = 366;
    // console.dir(altThis.aryHeartbeat);
    // console.log(result);
    //result.length=300;
    //console.dir(result);
    // console.dir(;
    // console.log(result.length);
    //console.log(array.length);

    // $(result).each(function(){
    //   console.log(this);
    // })
    // jQuery.each(result, function() {
    //   console.log(this);
    //   //  $("#" + this).text("My id is " + this + ".");
    //   //  return (this != "four"); // will stop running to skip "five"
    // });
    // console.log(toString(result[0]));
    // console.log(result.length);
    // console.log(toString.call(result));

    /** 心拍用データ */
    var data_heartbeat = [3, 2, 1, 3, 4, 3, 7, 1, 3, 4, 10, 11];
    /** 血圧用データ */
    var data_blood = [2, 3, 5, 7, 6, 3, 2, 1, 5, 4, 2, 10];
    /** 体温用データ */
    var data_body_temperature = [4, 3, 3, 9, 12, 3, 2, 1, 3, 4, 77.3, 2.11];

    console.log('personal_dashboard_yearly_transition');

    $('#container_year').highcharts({
        title: {
            text: '年間推移'
        },
        xAxis: {
            categories: ['1月', '2月', '3月', '4月', '5月', '6月', '7月', '8月', '9月', '10月', '11月', '12月']
        },
        labels: {
            items: [{
                html: '',
                style: {
                    left: '50px',
                    top: '18px',
                    color: (Highcharts.theme && Highcharts.theme.textColor) || 'black'
                }
            }]
        },
        series: [{
            type: 'column',
            name: '心拍',
            data: data_heartbeat
        }, {
            type: 'column',
            name: '血圧',
            data: data_blood
        }, {
            type: 'column',
            name: '体温',
            data: data_body_temperature
        }, ]
    });
});
