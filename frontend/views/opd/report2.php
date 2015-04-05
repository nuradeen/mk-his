<?php
use kartik\grid\GridView;
use yii\helpers\Html;


$this->params['breadcrumbs'][]=['label'=> 'หมวดรายงาน', 'url'=> ['opd/index']];
$this->params['breadcrumbs'][] ='ผู้ป่วยนอกที่มารับบริการวันนี้ ';

echo GridView::widget([
    'dataProvider'=> $dataProvider,
        'panel'=> [
        //'before' => 'ผู้ป่วยนอกวันนี้',
        'after' => 'ประมวลผลวันที่' .date('Y-m-d H:m:s')
    ],
]);
