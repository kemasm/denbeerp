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
 *
 * @property Karyawan $nik0
 * @property Karyawan $nikPenyetuju
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
            [['nik', 'nik_penyetuju'], 'string', 'max' => 6],
            [['keterangan'], 'string', 'max' => 50],
            [['nik'], 'exist', 'skipOnError' => true, 'targetClass' => Karyawan::className(), 'targetAttribute' => ['nik' => 'nik']],
            [['nik_penyetuju'], 'exist', 'skipOnError' => true, 'targetClass' => Karyawan::className(), 'targetAttribute' => ['nik_penyetuju' => 'nik']],
            [['nik_admin'], 'exist', 'skipOnError' => true, 'targetClass' => Karyawan::className(), 'targetAttribute' => ['nik_admin' => 'nik']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_cuti' => 'ID Cuti',
            'nik' => 'NIK',
            'tanggal_awal' => 'Tanggal Awal',
            'tanggal_akhir' => 'Tanggal Akhir',
            'nik_penyetuju' => 'NIK Penyetuju',
            'keterangan' => 'Keterangan',
            'nik_admin' => 'NIK Admin',
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

    public function getAdmin(){
        return $this->hasOne(Karyawan::className(), ['nik' => 'nik_admin']);
    }   

    public function beforeSave($insert = true) {
        if ($insert){
            $this->nik = Yii::$app->user->id;
        } 
        return parent::beforeSave($insert);
    }
}
