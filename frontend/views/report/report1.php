<?php
use kartik\grid\GridView;

echo GridView::widget([
    'dataProvider' => $dataProvider,
    'panel'=> [
        'before'=> 'รายงานนับจำนนวนอายุ',
        'after'=> 'ประมวลผลรายงานวันที่  '.date('Y-m-d H:m:s')
    ]
])
?>
