<?php

use yii\helpers\Html;
?>
<h1>หมวดรายงานทดสอบ</h1>

<p>
    <?= Html::a('รายงานนับจำนวนอายุ', ['report/report1']) ?>
</p>
<p>
    <?= Html::a('รายงานประกันสังคม', ['report/report2']) ?>
</p>
<p>
    <?=
    Html::a('รายงานประชากรตามสถานะบุคคล', ['report/report3'])
    ?>
</p>