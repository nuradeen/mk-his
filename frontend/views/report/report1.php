<?php
use kartik\grid\GridView;
use yii\helpers\Html;
use miloschuman\highcharts\Highcharts;

$this->params['breadcrumbs'][] = ['label' => 'หมวดรายงาน','url'=> ['report/index']];
$this->params['breadcrumbs'][] = 'รายงาน 1';

echo GridView::widget([
    'dataProvider' => $dataProvider,
    'panel'=> [
        'before'=> 'รายงานนับจำนนวนอายุ',
        'after'=> 'ประมวลผลรายงานวันที่  '.date('Y-m-d H:m:s')
    ]
])
?>
<?php

echo Highcharts::widget([
   'options' => [
      'title' => ['text' => 'Fruit Consumption'],
      'xAxis' => [
         'categories' => ['Apples', 'Bananas', 'Oranges']
      ],
      'yAxis' => [
         'title' => ['text' => 'Fruit eaten']
      ],
      'series' => [
         ['name' => 'Jane', 'data' => [1, 0, 4]],
         ['name' => 'John', 'data' => [5, 7, 3]]
      ]
   ]
]);
?>
