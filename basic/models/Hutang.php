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
 * @property integer $id
 * @property string $status
 * @property string $manager_nik
 * @property string $admin_nik
 * @property string $penolak_nik
 *
 * @property Angsuran[] $angsurans
 * @property Karyawan $nik0
 * @property Karyawan $adminNik
 * @property Karyawan $managerNik
 * @property Karyawan $penolakNik
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
            [['no_penyetujuan', 'jumlah', 'periode'], 'integer'],
            [['tanggal_pengajuan'], 'safe'],
            [['nik', 'manager_nik', 'admin_nik', 'penolak_nik'], 'string', 'max' => 6],
            [['jaminan', 'file_surat_perjanjian', 'status'], 'string', 'max' => 255],
            [['no_penyetujuan', 'nik'], 'unique', 'targetAttribute' => ['no_penyetujuan', 'nik'], 'message' => 'The combination of No Penyetujuan and Nik has already been taken.'],
            [['nik'], 'exist', 'skipOnError' => true, 'targetClass' => Karyawan::className(), 'targetAttribute' => ['nik' => 'nik']],
            [['admin_nik'], 'exist', 'skipOnError' => true, 'targetClass' => Karyawan::className(), 'targetAttribute' => ['admin_nik' => 'nik']],
            [['manager_nik'], 'exist', 'skipOnError' => true, 'targetClass' => Karyawan::className(), 'targetAttribute' => ['manager_nik' => 'nik']],
            [['penolak_nik'], 'exist', 'skipOnError' => true, 'targetClass' => Karyawan::className(), 'targetAttribute' => ['penolak_nik' => 'nik']],
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
            'id' => 'ID',
            'status' => 'Status',
            'manager_nik' => 'Manager Nik',
            'admin_nik' => 'Admin Nik',
            'penolak_nik' => 'Penolak Nik',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAngsurans()
    {
        return $this->hasMany(Angsuran::className(), ['hutang_id' => 'id']);
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
    public function getAdminNik()
    {
        return $this->hasOne(Karyawan::className(), ['nik' => 'admin_nik']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getManagerNik()
    {
        return $this->hasOne(Karyawan::className(), ['nik' => 'manager_nik']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPenolakNik()
    {
        return $this->hasOne(Karyawan::className(), ['nik' => 'penolak_nik']);
    }
}
