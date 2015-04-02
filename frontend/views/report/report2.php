<?php
use kartik\grid\GridView;

$this->params['breadcrumbs'][]=['label'=> 'หมวดรายงาน', 'url'=> ['report/index']];
$this->params['breadcrumbs'][] ='รายงานผู้ป่วยประกันสังคม';

echo GridView::widget([
    'dataProvider'=> $dataProvider,
    'panel'=> [
        'before' => 'รายงานประกันสังคม',
        'after' => 'ประมวลผลวันที่' .date('Y-m-d H:m:s')
    ]
])
?>