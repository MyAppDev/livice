<?php
 header("Content-Type: text/javascript");
?>
$(function () {
    $('#container_year').highcharts({
        title: {
            text: <?= "'年間推移'"; ?>
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
            data: [3, 2, 1, 3, 4, 3, 7, 1, 3, 4, 10, 11]
        }, {
            type: 'column',
            name: '血圧',
            data: [2, 3, 5, 7, 6, 3, 2, 1, 5, 4, 2, 10]
        }, {
            type: 'column',
            name: '体温',
            data: [4, 3, 3, 9, 12, 3, 2, 1, 3, 4, 77, 2]
        }, ]
    });
});
