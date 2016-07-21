<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cuti".
 *
 * @property string $id_cuti
 * @property string $nik
 * @property string $tanggal_awal
 * @property string $tanggal_akhir
 * @property string $nik_penyetuju
 * @property string $keterangan
 * @property string $nik_admin
 * @property string $penolak
 *
 * @property Karyawan $nik0
 * @property Karyawan $nikPenyetuju
 * @property Karyawan $nikAdmin
 * @property Karyawan $penolak0
 */
class Cuti extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cuti';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tanggal_awal', 'tanggal_akhir'], 'safe'],
            [['nik', 'nik_penyetuju', 'nik_admin', 'penolak'], 'string', 'max' => 6],
            [['keterangan'], 'string', 'max' => 50],
            [['nik'], 'exist', 'skipOnError' => true, 'targetClass' => Karyawan::className(), 'targetAttribute' => ['nik' => 'nik']],
            [['nik_penyetuju'], 'exist', 'skipOnError' => true, 'targetClass' => Karyawan::className(), 'targetAttribute' => ['nik_penyetuju' => 'nik']],
            [['nik_admin'], 'exist', 'skipOnError' => true, 'targetClass' => Karyawan::className(), 'targetAttribute' => ['nik_admin' => 'nik']],
            [['penolak'], 'exist', 'skipOnError' => true, 'targetClass' => Karyawan::className(), 'targetAttribute' => ['penolak' => 'nik']],
            [['tanggal_akhir'], 'compare', 'compareAttribute' => 'tanggal_awal', 'operator' => '>='],
            [['tanggal_awal'], 'compare', 'compareValue' => date('Y-m-d'), 'operator' => '>'],
            ['tanggal_akhir', 'validateDates'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_cuti' => 'Id Cuti',
            'nik' => 'Nik',
            'tanggal_awal' => 'Tanggal Awal',
            'tanggal_akhir' => 'Tanggal Akhir',
            'nik_penyetuju' => 'Nik Penyetuju',
            'keterangan' => 'Keterangan',
            'nik_admin' => 'Nik Admin',
            'penolak' => 'Penolak',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNik0()
    {
        return $this->hasOne(Karyawan::className(), ['nik' => 'nik']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNikPenyetuju()
    {
        return $this->hasOne(Karyawan::className(), ['nik' => 'nik_penyetuju']);
    }

    public function getKaryawan()
    {
        return $this->hasOne(Karyawan::className(), ['nik' => 'nik']);
    }

    public function getPenyetuju()
    {
        return $this->hasOne(Karyawan::className(), ['nik' => 'nik_penyetuju']);
    } 

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAdmin()
    {
        return $this->hasOne(Karyawan::className(), ['nik' => 'nik_admin']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPenolak0()
    {
        return $this->hasOne(Karyawan::className(), ['nik' => 'penolak']);
    }
    
    public function getStatus()
    {
        if($this->penolak)
        {
            return 2;
        }
        else if($this->nik_admin && $this->nik_penyetuju)
        {
            return 1;
        }else 
            return 0;
    }

    public function getState(){
        $stat = $this->status;
        if($stat == 2){
            return 'ditolak';
        }else if($stat == 1){
            return 'disetujui';
        }else return 'menunggu persetujuan';
    } 

    public function beforeSave($insert = true) {
        if ($insert){
            $this->nik = Yii::$app->user->id;
        } 
        return parent::beforeSave($insert);
    }

    public function approval()
    {
        //d(Yii::$app->user->id);
        if($this->status == 2){
            return;
        }
        else if(Yii::$app->user->identity->jabatan == 'admin'){
            if(Yii::$app->user->id != $this->nik_admin && $this->nik_admin){
                $this->nik_penyetuju = Yii::$app->user->id;
            }
            $this->nik_admin = Yii::$app->user->id;
        } else if(Yii::$app->user->identity->jabatan == 'manager'){
            if($this->nik == Yii::$app->user->identity->nik){
                $this->resetApproval();
            } else {
                $this->nik_penyetuju = Yii::$app->user->id;
            }
        } else if(Yii::$app->user->identity->jabatan == 'hrd'){
            if($this->nik == Yii::$app->user->identity->nik){
                $this->resetApproval();
            } else {
                $this->nik_penyetuju = Yii::$app->user->id;
            }
        }
        //dd($this->nik_penyetuju);
        return;
    }

    public function disapproval()
    {
        if($this->status <> 1){
            $this->penolak = Yii::$app->user->id;
        }
    }

    public function resetApproval(){
        $this->nik_admin = null;
        $this->nik_penyetuju = null;
    }

    public function validateDates() {
        //dd(Yii::$app->user->identity->sisacuti);
        if(Yii::$app->user->identity->sisacuti - ((strtotime($this->tanggal_akhir) - strtotime($this->tanggal_awal))/60/60/24 + 1) < 0){
            //dd(Yii::$app->user->identity->sisacuti);
            $this->addError('tanggal_akhir','Sisa Cuti tidak cukup');
        }
    }
}

