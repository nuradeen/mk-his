<?php

use kartik\grid\GridView;
use yii\helpers\Html;
use miloschuman\highcharts\Highcharts;

$this->params['breadcrumbs'][] = ['label' => 'หมวดรายงาน', 'url' => ['ipd/index']];
$this->params['breadcrumbs'][] = 'ผู้ป่วยนอกแยกปีงบประมาณ';

echo GridView::widget([
    'dataProvider' => $data,
    'panel' => [
        'before' => 'เปรียบเทียบข้อมูลผู้ป่วยในแยกปีงบประมาณ : ' . date('d-m-Y'),
        'after' => ''
    ],
]);
?>
