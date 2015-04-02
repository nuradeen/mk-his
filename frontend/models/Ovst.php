<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ovst".
 *
 * @property string $hos_guid
 * @property string $vn
 * @property string $hn
 * @property string $an
 * @property string $vstdate
 * @property string $vsttime
 * @property string $doctor
 * @property string $hospmain
 * @property string $hospsub
 * @property integer $oqueue
 * @property string $ovstist
 * @property string $ovstost
 * @property string $pttype
 * @property string $pttypeno
 * @property string $rfrics
 * @property string $rfrilct
 * @property string $rfrocs
 * @property string $rfrolct
 * @property string $spclty
 * @property string $rcpt_disease
 * @property string $hcode
 * @property string $cur_dep
 * @property string $cur_dep_busy
 * @property string $last_dep
 * @property string $cur_dep_time
 * @property integer $rx_queue
 * @property string $diag_text
 * @property integer $pt_subtype
 * @property string $main_dep
 * @property integer $main_dep_queue
 * @property string $finance_summary_date
 * @property string $visit_type
 * @property string $node_id
 * @property integer $contract_id
 * @property string $waiting
 * @property string $rfri_icd10
 * @property integer $o_refer_number
 * @property string $has_insurance
 * @property string $i_refer_number
 * @property string $refer_type
 * @property string $o_refer_dep
 * @property string $staff
 * @property string $command_doctor
 * @property string $send_person
 * @property integer $pt_priority
 * @property string $finance_lock
 * @property string $oldcode
 * @property string $sign_doctor
 * @property string $er_time
 */
class Ovst extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ovst';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['hos_guid'], 'required'],
            [['vstdate', 'vsttime', 'cur_dep_time', 'finance_summary_date', 'er_time'], 'safe'],
            [['oqueue', 'rx_queue', 'pt_subtype', 'main_dep_queue', 'contract_id', 'o_refer_number', 'pt_priority'], 'integer'],
            [['hos_guid'], 'string', 'max' => 38],
            [['vn'], 'string', 'max' => 13],
            [['hn', 'an'], 'string', 'max' => 9],
            [['doctor'], 'string', 'max' => 7],
            [['hospmain', 'hospsub', 'rfrilct', 'rfrolct', 'hcode', 'o_refer_dep'], 'string', 'max' => 5],
            [['ovstist', 'pttype', 'spclty'], 'string', 'max' => 2],
            [['ovstost'], 'string', 'max' => 4],
            [['pttypeno'], 'string', 'max' => 50],
            [['rfrics', 'rfrocs', 'cur_dep_busy', 'visit_type', 'node_id', 'waiting', 'has_insurance', 'refer_type', 'finance_lock'], 'string', 'max' => 1],
            [['rcpt_disease'], 'string', 'max' => 100],
            [['cur_dep', 'last_dep', 'main_dep'], 'string', 'max' => 3],
            [['diag_text'], 'string', 'max' => 250],
            [['rfri_icd10', 'command_doctor'], 'string', 'max' => 6],
            [['i_refer_number'], 'string', 'max' => 25],
            [['staff'], 'string', 'max' => 15],
            [['send_person'], 'string', 'max' => 150],
            [['oldcode'], 'string', 'max' => 20],
            [['sign_doctor'], 'string', 'max' => 10],
            [['vn'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'hos_guid' => 'Hos Guid',
            'vn' => 'Vn',
            'hn' => 'Hn',
            'an' => 'An',
            'vstdate' => 'Vstdate',
            'vsttime' => 'Vsttime',
            'doctor' => 'Doctor',
            'hospmain' => 'Hospmain',
            'hospsub' => 'Hospsub',
            'oqueue' => 'Oqueue',
            'ovstist' => 'Ovstist',
            'ovstost' => 'Ovstost',
            'pttype' => 'Pttype',
            'pttypeno' => 'Pttypeno',
            'rfrics' => 'Rfrics',
            'rfrilct' => 'Rfrilct',
            'rfrocs' => 'Rfrocs',
            'rfrolct' => 'Rfrolct',
            'spclty' => 'Spclty',
            'rcpt_disease' => 'Rcpt Disease',
            'hcode' => 'Hcode',
            'cur_dep' => 'Cur Dep',
            'cur_dep_busy' => 'Cur Dep Busy',
            'last_dep' => 'Last Dep',
            'cur_dep_time' => 'Cur Dep Time',
            'rx_queue' => 'Rx Queue',
            'diag_text' => 'Diag Text',
            'pt_subtype' => 'Pt Subtype',
            'main_dep' => 'Main Dep',
            'main_dep_queue' => 'Main Dep Queue',
            'finance_summary_date' => 'Finance Summary Date',
            'visit_type' => 'Visit Type',
            'node_id' => 'Node ID',
            'contract_id' => 'Contract ID',
            'waiting' => 'Waiting',
            'rfri_icd10' => 'Rfri Icd10',
            'o_refer_number' => 'O Refer Number',
            'has_insurance' => 'Has Insurance',
            'i_refer_number' => 'I Refer Number',
            'refer_type' => 'Refer Type',
            'o_refer_dep' => 'O Refer Dep',
            'staff' => 'Staff',
            'command_doctor' => 'Command Doctor',
            'send_person' => 'Send Person',
            'pt_priority' => 'Pt Priority',
            'finance_lock' => 'Finance Lock',
            'oldcode' => 'Oldcode',
            'sign_doctor' => 'Sign Doctor',
            'er_time' => 'Er Time',
        ];
    }
}
