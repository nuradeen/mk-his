<?php
use kartik\grid\GridView;

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
