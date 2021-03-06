<?php

use kartik\grid\GridView;
use yii\helpers\Html;
use miloschuman\highcharts\Highcharts;

$this->params['breadcrumbs'][] = ['label' => 'หมวดรายงาน', 'url' => ['opd/index']];
$this->params['breadcrumbs'][] = 'ผู้ป่วยที่กำลัง admit ทั้งหมด ณ ปัจจุบัน';
?>

<div id="chart" style="padding-bottom: 10px"></div>

<?php
echo GridView::widget([
    'dataProvider' => $dataProvider,
    'panel' => [
        'before' => 'คนไข้ประจำวันที่ : ' . date('d-m-Y h:m:s'),
        'after' => ''
    ],
]);
?>
<?php
Highcharts::widget([
    'scripts' => [
        'highcharts-more',
        'themes/grid'
    ]
]);
?>

<?php
$month1 = [];
for ($i = 0; $i < count($rawData); $i++) {
    $categ[] = $rawData[$i]['now'];
    //array_push($categ,'vvvv');
}

$month1 = array_column($rawData, 'now');
$js_categories = implode("','", $month1);

$ipd = [];
for ($i = 0; $i < count($rawData); $i++) {
    $ipd[] = $rawData[$i]['cc'];
    //array_push($categ,'vvvv');
}

$ipd = array_column($rawData, 'cc');
$js_data = implode(",", $ipd);


// chart

$this->registerJs("$(function () {
    $('#chart').highcharts({
        chart: {
            type: 'column',
            margin: 75,
            options3d: {
                enabled: true,
                alpha: 10,
                beta: 25,
                depth: 70
            }
        },
        title: {
            text: '3D chart with null values'
        },
        subtitle: {
            text: 'Notice the difference between a 0 value and a null point'
        },
        plotOptions: {
            column: {
                depth: 25
            }
        },
        xAxis: {
            categories: ['$js_categories']
        },
        yAxis: {
            title: {
                text: null
            }
        },
        series: [{
            name: 'Sales',
            data: [$js_data]
        }]
    });
});
");
