<?php

namespace frontend\controllers;

class OpdController extends \yii\web\Controller {

    public function actionIndex() {
        return $this->render('index');
    }

    public function actionReport1() {
        $sql = "select count(*) as 'ผู้ป่วย admit ปัจจุบัน' from ipt where dchdate is null";
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
    
    public function actionReport2(){
        $sql ="select count(ov.hn) as 'ผู้ป่วยนอก วันนี้' from ovst ov where ov.vstdate=DATE(NOW())";
        
        try {
            $rawData = \Yii::$app->db->createCommand($sql)->queryAll();
        } catch (\yii\db\Exception $e) {
            throw new \yii\web\ConflictHttpException('sql error');
        }
        $dataProvider = new \yii\data\ArrayDataProvider([

            'allModels' => $rawData,
            'pagination' => FALSE,
        ]);
        return $this->render('report2', [
                    'dataProvider' => $dataProvider,
                    'rawData' => $rawData
        ]);
    }
        
    }

