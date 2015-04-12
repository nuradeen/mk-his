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
    'dataProvider' => $dataProvider57,
    'panel' => [
        'before' => 'เปรียบเทียบข้อมูลผู้ป่วยในแยกปีงบประมาณ : ' . date('d-m-Y'),
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
$month = [];
for ($i = 0; $i < count($rawData); $i++) {
    $categ[] = $rawData[$i]['month'];
    //array_push($categ,'vvvv');
}

$month = array_column($rawData, 'month');
$js_categories = implode("','", $month);

$ipd = [];
for ($i = 0; $i < count($rawData); $i++) {
    $ipd[] = $rawData[$i]['pt'];
    //array_push($categ,'vvvv');
}

$ipd = array_column($rawData, 'pt');
$js_data = implode(",", $ipd);


// chart

$this->registerJs("
$(function () {
    $('#chart').highcharts({
        chart: {
            type: 'line'
        },
        title: {
            text: 'Maikaen Hospital'
        },
        subtitle: {
            text: 'จำนวนครั้งคนไข้ในของโรงพยาบาลไม้แก่น'
        },
        xAxis: {
            categories: ['$js_categories']
        },
        yAxis: {
            title: {
                text: 'จำนวนครั้งคนไข้ใน'
            }
        },
        plotOptions: {
            line: {
                dataLabels: {
                    enabled: true
                },
                enableMouseTracking: false
            }
        },
        series: [{
            name: 'จำนวนคนไข้ในปีงบ 58',
            data: [$js_data]
        }]
        
    });
});
");
//จบ




