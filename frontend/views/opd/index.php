<?php
use kartik\grid\GridView;
use miloschuman\highcharts\Highcharts;
?>
<div style="display: none">
    <?php
    echo Highcharts::widget([
        'scripts' => [
            'highcharts-more',
            'themes/grid'
        //'modules/exporting',
        ]
    ]);
    $this->registerJsFile('./js/chart_dial.js');
    ?>
</div>

<div class="well well-material">

    <h2>Dash Board</h2>

</div>
<div class="alert alert-danger">
    AAAA
</div>
