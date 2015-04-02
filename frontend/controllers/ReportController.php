<?php

namespace frontend\controllers;

use yii;

class ReportController extends \yii\web\Controller {

    public function actionIndex() {
        return $this->render('index');
    }

    public function actionReport1() {
        $sql = "SELECT age_y AS อายุ ,COUNT(IF(sex = '1',1,NULL)) เพศชาย, 
COUNT(IF(sex = '2',1,NULL)) เพศหญิง 
,COUNT(age_y) as รวมทั้งหมด 
FROM person
WHERE house_regist_type_id IN ('1','3')
GROUP BY age_y";
        //$rawdata = \yii::$app->db->createCommand($sql)->queryAll();
        //print_r($rawdata);

        try {
            $rawData = \Yii::$app->db->createCommand($sql)->queryAll();
        } catch (\yii\db\Exception $e) {
            throw new \yii\web\ConflictHttpException('sql error');
        }
        $dataProvider = new \yii\data\ArrayDataProvider([

            'allModels' => $rawData,
            'pagination' => FALSE,
        ]);
        return $this->render('report1', [
                    'dataProvider' => $dataProvider,
                    'rawData' => $rawData
        ]);
    }

}
