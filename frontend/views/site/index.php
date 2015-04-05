<?php

use miloschuman\highcharts\Highcharts;
?>
<div style="display: none">
    <?php
    echo Highcharts::widget([
        'scripts' => [
            'highcharts-more',
            'themes/grid'
        //'modules/exporting',
        ]
    ]);
    $this->registerJsFile('./js/chart_dial.js');
    ?>
</div>

<div class="well well-material">

    <h2>Dash Board</h2>

</div>
<div class="alert alert-danger">
    AAAA
</div>
<?php 
$ctitle = "ทดสอบกราฟวงกลม";
$this->registerJs("$(function () {
    $('#pie').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false
        },
        title: {
            text: '$ctitle'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'Browser share',
            data: [
                ['Firefox',   45.0],
                ['IE',       26.8],
                {
                    name: 'Chrome',
                    y: 12.8,
                    sliced: true,
                    selected: true
                },
                ['Safari',    8.5],
                ['Opera',     6.2],
                ['Others',   0.7]
            ]
        }]
    });
});
");


?>
<div id="pie">
    
</div>
<div>
    <?php
    $month = ['ม.ค.', 'ก.พ.', 'มี.ค.'];
    $ward1 = [1, 9, 4];
    $ward2 = [10, 10, 4];
    echo Highcharts::widget([
        'options' => [
            
            'chart' => [
                'type' => 'column'
            ],
            
            'title' => ['text' => 'รายงานอัตราครองเตียง'],
            'xAxis' => [
                'categories' => $month
            ],
            'yAxis' => [
                'title' => ['text' => 'ราย']
            ],
            'series' => [
                ['name' => 'Ward1', 'data' => $ward1],
                ['name' => 'Ward2', 'data' => $ward2]
            ]
        ]
    ]);
    ?>
</div>

<div class="row">
    <div class="col-sm-4" style="text-align: center;">
        <?php
        $target = 503;
        $result = 102;
        $persent = 0.00;
        if ($target > 0) {
            $persent = $result / $target * 100;
            $persent = number_format($persent, 2);
        }
        $base = 90;
        $this->registerJs("
                        var obj_div=$('#ch1');
                        gen_dial(obj_div,$base,$persent);
                    ");
        ?>
        <h4>หญิงมีครรภ์ได้รับการฝากครรภ์ครั้งแรก<br>
          ก่อน 12 สัปดาห์ </h4>
        <h4>ทดสอบ</h4>
        <p>&nbsp; </p>
        <div id="ch1"></div>
    </div>
    <div class="col-sm-4" style="text-align: center;">
        <?php
        $target = 503;
        $result = 102;
        $persent = 0.00;
        if ($target > 0) {
            $persent = $result / $target * 100;
            $persent = number_format($persent, 2);
        }
        $base = 90;
        $this->registerJs("
                        var obj_div=$('#ch2');
                        gen_dial(obj_div,$base,$persent);
                    ");
        ?>
        <h4>หญิงมีครรภ์ได้รับการตรวจสุขภาพช่องปาก<br> สำนักทันตะ</h4>
        <div id="ch2"></div>

    </div>

    <div class="col-sm-4" style="text-align: center;">
        <?php
        $target = 503;
        $result = 102;
        $persent = 0.00;
        if ($target > 0) {
            $persent = $result / $target * 100;
            $persent = number_format($persent, 2);
        }
        $base = 90;
        $this->registerJs("
                        var obj_div=$('#ch3');
                        gen_dial(obj_div,$base,$persent);
                    ");
        ?>
        <h4>หญิงตั้งค์ครรภ์ได้รับการฝากครรภ์<br>5 ครั้ง</h4>
        <div id="ch3"></div>
    </div>
</div>
