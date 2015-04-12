<?php

use kartik\grid\GridView;
use yii\helpers\Html;
use miloschuman\highcharts\Highcharts;

$this->params['breadcrums'][] = ['label'=> 'หมวดรายงาน', 'url' => ['opd/index']];
$this->params['breadcrums'][] = 'เปรียบเทียบจำนวนผู้ปวยในแยกปีงบประมาณ';
?>

<?php
echo GridView::widget([
    'dataProvider' =>$dataProvider,

        'panel' => [
        'before' => 'เปรียบเทียบข้อมูลผู้ป่วยในแยกปีงบประมาณ : '.date('d-m-Y'),
        'after' => ''
    ],
]);

