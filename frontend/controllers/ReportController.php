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
    public function actionReport2(){
       
        $sql ="select v.vstdate,ov.vsttime,v.hn,v.cid,concat(pt.pname,pt.fname,'  ',pt.lname)as ชื่อ,
       s.name,v.age_y,v.pttype,v.hospmain,d.`name`,d.licenseno,v.pdx,v.dx0,v.dx1,v.dx2,v.dx3,v.dx4,v.dx5,(v.inc01+v.inc02+v.inc03) as ชันสูตร,v.inc05 as วินิจฉัย,v.inc04 as รังสี,
       (v.inc06+v.inc07+v.inc08+v.inc09+v.inc10+v.inc13+v.inc14) as เวชกรรม,(v.inc12+v.inc17) as drug,v.income
from vn_stat v
 left outer join pttype p on p.pttype = v.pttype
 left outer join patient pt on pt.hn = v.hn
 left outer join doctor d on d.code = v.dx_doctor
 left outer join sex s on s.code = v.sex
 left outer join ovst ov on v.vn = ov.vn
where  v.spclty <> 11 and v.pttype = 34
  and v.vstdate between '2015-02-01' and '2015-02-28'
order by v.vstdate";
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
    public function actionReport3(){
        $sql ="SELECT
v.village_id AS 'หมู่ที่',
v.village_name AS 'หมู่บ้าน',
SUM(
CASE
WHEN p.house_regist_type_id = 0 THEN
1
ELSE
'0'
END
) AS 'ประเภท 0',
SUM(
CASE
WHEN p.house_regist_type_id = 1 THEN
1
ELSE
'0'
END
) AS 'ประเภท 1',
SUM(
CASE
WHEN p.house_regist_type_id = 2 THEN
1
ELSE
'0'
END
) AS 'ประเภท 2',
SUM(
CASE
WHEN p.house_regist_type_id = 3 THEN
1
ELSE
'0'
END
) AS 'ประเภท 3',
SUM(
CASE
WHEN p.house_regist_type_id = 4 THEN
1
ELSE
'0'
END
) AS 'ประเภท 4'
FROM person AS p
INNER JOIN house AS h ON p.house_id = h.house_id
INNER JOIN village AS v ON h.village_id = v.village_id
WHERE
p.person_id NOT IN (SELECT person_death.person_id FROM person_death)
GROUP BY v.village_name
ORDER BY v.village_id";
        try {
            $rawData = \Yii::$app->db->createCommand($sql)->queryAll();
        } catch (\yii\db\Exception $e) {
            throw new \yii\web\ConflictHttpException('sql error');
        }
        $dataProvider = new \yii\data\ArrayDataProvider([

            'allModels' => $rawData,
            'pagination' => FALSE,
        ]);
        return $this->render('report3', [
                    'dataProvider' => $dataProvider,
                    'rawData' => $rawData
        ]);
    
    }
    public function actionReport4(){
        $sql ="select count(distinct ov.hn) as จำนวนคนไข้ from ovst ov 
where ov.vstdate= DATE(NOW())";
     
        try {
            $rawData = \Yii::$app->db->createCommand($sql)->queryAll();
        } catch (\yii\db\Exception $e) {
            throw new \yii\web\ConflictHttpException('sql error');
        }
        $dataProvider = new \yii\data\ArrayDataProvider([

            'allModels' => $rawData,
            'pagination' => FALSE,
        ]);
        return $this->render('report4', [
                    'dataProvider' => $dataProvider,
                    'rawData' => $rawData
        ]);
    }
}
