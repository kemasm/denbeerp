<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lokasi".
 *
 * @property integer $no_lokasi
 * @property string $nama_lokasi
 * @property string $tipe_lokasi
 * @property string $alamat
 * @property string $negara
 * @property integer $no_pelanggan
 * @property integer $no_supplier
 * @property string $divisi
 *
 * @property Asset[] $assets
 * @property Karyawan[] $karyawans
 * @property Pelanggan $noPelanggan
 * @property Supplier $noSupplier
 */
class Lokasi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lokasi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['no_lokasi'], 'required'],
            [['no_lokasi', 'no_pelanggan', 'no_supplier'], 'integer'],
            [['nama_lokasi', 'alamat'], 'string', 'max' => 50],
            [['tipe_lokasi', 'negara'], 'string', 'max' => 20],
            [['divisi'], 'string', 'max' => 30],
            [['no_pelanggan'], 'exist', 'skipOnError' => true, 'targetClass' => Pelanggan::className(), 'targetAttribute' => ['no_pelanggan' => 'no_pelanggan']],
            [['no_supplier'], 'exist', 'skipOnError' => true, 'targetClass' => Supplier::className(), 'targetAttribute' => ['no_supplier' => 'no_supplier']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'no_lokasi' => 'No Lokasi',
            'nama_lokasi' => 'Nama Lokasi',
            'tipe_lokasi' => 'Tipe Lokasi',
            'alamat' => 'Alamat',
            'negara' => 'Negara',
            'no_pelanggan' => 'No Pelanggan',
            'no_supplier' => 'No Supplier',
            'divisi' => 'Divisi',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAssets()
    {
        return $this->hasMany(Asset::className(), ['no_lokasi' => 'no_lokasi']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKaryawans()
    {
        return $this->hasMany(Karyawan::className(), ['no_lokasi' => 'no_lokasi']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNoPelanggan()
    {
        return $this->hasOne(Pelanggan::className(), ['no_pelanggan' => 'no_pelanggan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNoSupplier()
    {
        return $this->hasOne(Supplier::className(), ['no_supplier' => 'no_supplier']);
    }
}
