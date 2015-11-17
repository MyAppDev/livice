$(function(){
    var i;
    var container = $("#clock");
    var size = 600;

    /* 時計全体のサイズ */
    container.width(size).height(size);

    /* 目盛り */
    for(i = 0; i < 60; i++){
        $("<p>")
            .addClass("div " + (i % 5 ? "" : "m5"))
            .css({
                top: 0,
                left: size / 2,
                width: 1,
                height: size,
            })
            .css("webkit-transform", "rotate("+ (6 * i) +"deg)")
            .append("<b></b>")
            .appendTo(container);
    }

    /* 中心点 */
    container.find(".circle").css({
        top: (size - 22) / 2,
        left: (size - 22) / 2,
    });

    /* 秒針 */
    container.find(".second").css({
        top: 0,
        left: size / 2 - 1,
        width: 2,
        height: size,
    });
    container.find(".second b").css({
        height: size / 2 * 1.2,
        borderRadius: 1,
    });

    /* 分針 */
    container.find(".minute").css({
        top: 0,
        left: size / 2 - 4,
        width: 8,
        height: size,
    });
    container.find(".minute b").css({
        height: size / 2 * 1.0,
        marginTop: size / 2 * 0.1,
        borderRadius: 4,
    });

    /* 時針 */
    container.find(".hour").css({
        top: 0,
        left: size / 2 - 6,
        width: 12,
        height: size,
    });
    container.find(".hour b").css({
        height: size / 2 * 0.85,
        marginTop: size / 2 * 0.25,
        borderRadius: 6,
    });

    /* 時間取得 */
    var clock = function() {
        var date = new Date();
        var second = date.getSeconds();
        var minute = date.getMinutes();
        var hour = date.getHours();
        container.find(".second").css("webkit-transform",
            "rotate("+ (360/60 * second) +"deg)");
        container.find(".minute").css("webkit-transform",
            "rotate("+ (360/60 * minute + 360/60/60 * second) +"deg)");
        container.find(".hour").css("webkit-transform",
            "rotate("+ (360/12 * hour + 360/12/60 * minute + 360/12/60/60 * second) +"deg)");
    };

    /* 起動 */
    clock();
    setInterval(clock, 1000);
});
