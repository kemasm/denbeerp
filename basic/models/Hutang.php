<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "hutang".
 *
 * @property integer $no_penyetujuan
 * @property string $nik
 * @property integer $jumlah
 * @property string $tanggal_pengajuan
 * @property string $jaminan
 * @property integer $periode
 * @property string $file_surat_perjanjian
 * @property integer $sisa_pokok
 * @property integer $sisa_bunga
 *
 * @property Angsuran[] $angsurans
 * @property Angsuran[] $angsurans0
 * @property Karyawan $nik0
 */
class Hutang extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hutang';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['no_penyetujuan'], 'required'],
            [['no_penyetujuan', 'jumlah', 'periode', 'sisa_pokok', 'sisa_bunga'], 'integer'],
            [['tanggal_pengajuan'], 'safe'],
            [['nik'], 'string', 'max' => 6],
            [['jaminan', 'file_surat_perjanjian'], 'string', 'max' => 50],
            [['nik'], 'exist', 'skipOnError' => true, 'targetClass' => Karyawan::className(), 'targetAttribute' => ['nik' => 'nik']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'no_penyetujuan' => 'No Penyetujuan',
            'nik' => 'Nik',
            'jumlah' => 'Jumlah',
            'tanggal_pengajuan' => 'Tanggal Pengajuan',
            'jaminan' => 'Jaminan',
            'periode' => 'Periode',
            'file_surat_perjanjian' => 'File Surat Perjanjian',
            'sisa_pokok' => 'Sisa Pokok',
            'sisa_bunga' => 'Sisa Bunga',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAngsurans()
    {
        return $this->hasMany(Angsuran::className(), ['no_penyetujuan' => 'no_penyetujuan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAngsurans0()
    {
        return $this->hasMany(Angsuran::className(), ['nik' => 'nik']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNik0()
    {
        return $this->hasOne(Karyawan::className(), ['nik' => 'nik']);
    }
}
