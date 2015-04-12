<?php

namespace frontend\controllers;

class IpdController extends \yii\web\Controller {

    public function actionIndex() {
        return $this->render('index');
    }

    public function actionOpd5y() {
       $sql="SELECT 
(
SELECT COUNT(hn) 
FROM vn_stat  WHERE vstdate BETWEEN '2008-10-01' and '2009-09-30') as '2552',
(
SELECT COUNT(hn) 
FROM vn_stat  WHERE vstdate BETWEEN '2009-10-01' and '2010-09-30') as '2553',
(
SELECT COUNT(hn) 
FROM vn_stat  WHERE vstdate BETWEEN '2010-10-01' and '2011-09-30') as '2554',
(
SELECT COUNT(hn) 
FROM vn_stat  WHERE vstdate BETWEEN '2011-10-01' and '2012-09-30') as '2555',
(
SELECT COUNT(hn) 
FROM vn_stat  WHERE vstdate BETWEEN '2012-10-01' and '2013-09-30') as '2556',
(
SELECT COUNT(hn) 
FROM vn_stat  WHERE vstdate BETWEEN '2013-10-01' and '2014-09-30') as '2557',
(
SELECT COUNT(hn) 
FROM vn_stat  WHERE vstdate BETWEEN '2014-10-01' and '2015-09-30') as '2558'
UNION
SELECT 
(
SELECT COUNT(DISTINCT hn) 
FROM vn_stat  WHERE vstdate BETWEEN '2008-10-01' and '2009-09-30') as '2552',
(
SELECT COUNT(DISTINCT hn) 
FROM vn_stat  WHERE vstdate BETWEEN '2009-10-01' and '2010-09-30') as '2553',
(
SELECT COUNT(DISTINCT hn) 
FROM vn_stat  WHERE vstdate BETWEEN '2010-10-01' and '2011-09-30') as '2554',
(
SELECT COUNT(DISTINCT hn) 
FROM vn_stat  WHERE vstdate BETWEEN '2011-10-01' and '2012-09-30') as '2555',
(
SELECT COUNT(DISTINCT hn) 
FROM vn_stat  WHERE vstdate BETWEEN '2012-10-01' and '2013-09-30') as '2556',
(
SELECT COUNT(DISTINCT hn) 
FROM vn_stat  WHERE vstdate BETWEEN '2013-10-01' and '2014-09-30') as '2557',
(
SELECT COUNT(DISTINCT hn) 
FROM vn_stat  WHERE vstdate BETWEEN '2014-10-01' and '2015-09-30') as '2558'";
       
       try {
            $rawData = \Yii::$app->db->createCommand($sql)->queryAll();
        } catch (\yii\db\Exception $e) {
            throw new \yii\web\ConflictHttpException('sql error');
        }
        $dataProvider = new \yii\data\ArrayDataProvider([

            'allModels' => $rawData,
            'pagination' => FALSE,
        ]);
        return $this->render('opd5y', [
                    'dataProvider' => $dataProvider,
                    'rawData' => $rawData
        ]);
    }
    

}
