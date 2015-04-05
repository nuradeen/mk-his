<?php
use kartik\grid\GridView;
use yii\helpers\Html;


$this->params['breadcrumbs'][]=['label'=> 'หมวดรายงาน', 'url'=> ['opd/index']];
$this->params['breadcrumbs'][] ='ผู้ป่วยที่กำลัง admit ทั้งหมด ณ ปัจจุบัน';

echo GridView::widget([
    'dataProvider'=> $dataProvider,
        'panel'=> [
        //'before' => 'รายงานประกันสังคม',
        'after' => 'ประมวลผลวันที่' .date('Y-m-d H:m:s')
    ],
]);
