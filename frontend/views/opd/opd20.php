<?php
use kartik\grid\GridView;
use yii\helpers\Html;
use miloschuman\highcharts\Highcharts;

$this->params['breadcrumbs'][]=['label'=> 'หมวดรายงาน', 'url'=> ['opd/index']];
$this->params['breadcrumbs'][] ='สถิติย้อนหลัง 10 วัน';

?>

<div id="chart" style="padding-bottom: 10px"></div>

<?php
Highcharts::widget([
    'scripts' => [
        'highcharts-more',
        'themes/grid'
    ]
]);
?>

<?php
$date = [];
for ($i = 0; $i < count($rawData); $i++) {
    $categ[] = $rawData[$i]['DAYNAME(vstdate)'];
    //array_push($categ,'vvvv');
}

$date = array_column($rawData, 'DAYNAME(vstdate)');
$js_categories = implode("','", $date);

$opd = [];
for ($i = 0; $i < count($rawData); $i++) {
    $ipd[] = $rawData[$i]['cc'];
    //array_push($categ,'vvvv');
}

$opd = array_column($rawData, 'cc');
$js_data = implode(",", $opd);


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
            text: 'จำนวนผู้ป่วยนอกย้อนหลัง 20 วัน ณ ปัจจุบัน'
        },
        xAxis: {
            categories: ['$js_categories']
        },
        yAxis: {
            title: {
                text: 'จำนวนผู้ป่วยนอก'
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
            name: 'จำนวนผู้ป่วยนอกย้อนหลัง 20 วัน',
            data: [$js_data]
        }]
        
    });
});
");
//จบ


echo GridView::widget([
    'dataProvider'=> $dataProvider,
        'panel'=> [
        'before' => 'สถิติผู้ป่วยนอกย้อนหลัง 10 วัน',
        'after' => 'ประมวลผลวันที่' .date('Y-m-d H:m:s')
    ],
]);


