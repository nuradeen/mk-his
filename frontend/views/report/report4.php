<?php
use kartik\grid\GridView;
use yii\helpers\Html;
use miloschuman\highcharts\Highcharts;

$this->params['breadcrumbs'][]=['label'=> 'หมวดรายงาน', 'url'=> ['report/index']];
$this->params['breadcrumbs'][] ='รายงานประชากรตามสถานะบุคคล';
?>
<div id="chart" style="padding-bottom: 10px"></div>

<?php
echo GridView::widget([
    'dataProvider'=> $dataProvider,
        'panel'=> [
        'before' => 'รายงานประชากรตามสถานะบุคคล',
        'after' => 'ประมวลผลวันที่' .date('Y-m-d H:m:s')
    ],
]);
