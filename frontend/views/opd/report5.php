<?php

use kartik\grid\GridView;
use yii\helpers\Html;
use miloschuman\highcharts\Highcharts;

$this->params['breadcrums'][] = ['label'=> 'หมวดรายงาน', 'url' => ['opd/index']];
$this->params['breadcrums'][] = 'ผู้ป่วยในปีงบประมาณ 58';
?>

<?php
echo GridView::widget([
    'dataProvider' =>$dataProvider58,

        'panel' => [
        'before' => 'ผู้ป่วยในปีงบประมาณ 58 : '.date('d-m-Y'),
        'after' => ''
    ],
]);

