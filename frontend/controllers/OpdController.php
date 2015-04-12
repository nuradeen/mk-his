<?php

namespace frontend\controllers;

class OpdController extends \yii\web\Controller {

    public function actionIndex() {
        return $this->render('index');
    }

    public function actionReport1() {
        $sql = "SELECT 'ผู้ป่วยนอกทั้งหมด' as now , COUNT(hn) as cc from vn_stat WHERE vstdate =DATE(NOW())
UNION
SELECT 'ผู้ป่วย Refer ' as refer, count(hn) from referout r where r.refer_date=date(now())
union
SELECT 'ผู้ป่วย admit ทั้งหมด' as ipt, COUNT(an) from ipt i WHERE i.dchdate is null
UNION
SELECT 'ตึกผู้ป่วยใน' as ipt, COUNT(an) from ipt i WHERE i.dchdate is null AND ward='16'
UNION
SELECT 'ห้องคลอด' as ipt, COUNT(an) from ipt i WHERE i.dchdate is null AND ward= '18'";

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
    
    public function actionOpd20(){
        $sql ="select DAYNAME(vstdate),count(*) cc
from vn_stat
where curdate()<date_add(vstdate,interval 15 day) 
group  by vstdate
order by vstdate";
        
        try {
            $rawData = \Yii::$app->db->createCommand($sql)->queryAll();
        } catch (\yii\db\Exception $e) {
            throw new \yii\web\ConflictHttpException('sql error');
        }
        $dataProvider = new \yii\data\ArrayDataProvider([

            'allModels' => $rawData,
            'pagination' => FALSE,
        ]);
        return $this->render('opd20', [
                    'dataProvider' => $dataProvider,
                    'rawData' => $rawData
        ]);
    }
    public function actionReport3(){
     $sql ="select MONTHNAME(dchdate) 'month',count(an) 'จำนวนผู้ป่วยในปีงบ 58'
from an_stat
where dchdate between '2014-10-1' and '2015-09-30'
group  by MONTH
order by YEAR(MONTH)
";
     try {
            $rawData58 = \Yii::$app->db->createCommand($sql)->queryAll();
        } catch (\yii\db\Exception $e) {
            throw new \yii\web\ConflictHttpException('sql error');
        }
        $dataProvider = new \yii\data\ArrayDataProvider([

            'allModels' => $rawData58,
            'pagination' => FALSE,
        ]);
        return $this->render('report3', [
                    'dataProvider' => $dataProvider,
                    'rawData' => $rawData58
        ]);
    }
     
    public function actionIpdsum(){
     $sql ="select MONTHNAME(dchdate) 'month',count(an) pt
from an_stat
where dchdate between '2013-10-1' and '2014-09-30'
group  by MONTH
order by YEAR(MONTH)
";
     try {
            $rawData57 = \Yii::$app->db->createCommand($sql)->queryAll();
        } catch (\yii\db\Exception $e) {
            throw new \yii\web\ConflictHttpException('sql error');
        }
        $dataProvider57 = new \yii\data\ArrayDataProvider([

            'allModels' => $rawData57,
            'pagination' => FALSE,
        ]);
        return $this->render('ipdsum', [
                    'dataProvider57' => $dataProvider57,
                    'rawData' => $rawData57
        ]);
    }
    
    public function actionReport5(){
        $sql ="select MONTHNAME(dchdate) 'month',count(an) pt58
from an_stat
where dchdate between '2014-10-1' and '2015-09-30'
group  by MONTH
order by YEAR(MONTH)
";
     try {
            $rawData58 = \Yii::$app->db->createCommand($sql)->queryAll();
        } catch (\yii\db\Exception $e) {
            throw new \yii\web\ConflictHttpException('sql error');
        }
        $dataProvider58 = new \yii\data\ArrayDataProvider([

            'allModels' => $rawData58,
            'pagination' => FALSE,
        ]);
        return $this->render('report5', [
                    'dataProvider58' => $dataProvider58,
                    'rawData' => $rawData58
        ]);
    }
    }
    

