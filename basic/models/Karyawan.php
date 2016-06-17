<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "karyawan".
 *
 * @property integer $nik
 * @property string $nama
 * @property string $password
 * @property string $tanggal_lahir
 * @property string $tempat_lahir
 * @property string $no_identitas
 * @property string $jenis_kelamin
 * @property string $email
 * @property string $status_pernikahan
 * @property string $tanggal_masuk
 * @property string $file_ktp
 * @property string $file_npwp
 * @property string $file_bpjs
 * @property string $file_cv
 * @property string $file_ijazah
 * @property string $file_transkrip
 * @property string $status_karyawan
 * @property integer $sisa_cuti
 * @property string $jabatan
 * @property integer $nominal_gaji
 * @property integer $no_lokasi
 */
class Karyawan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'karyawan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nik', 'nama', 'password', 'tanggal_lahir', 'tempat_lahir', 'no_identitas', 'jenis_kelamin', 'email', 'status_pernikahan', 'tanggal_masuk', 'file_ktp', 'file_npwp', 'file_bpjs', 'file_cv', 'file_ijazah', 'file_transkrip', 'status_karyawan', 'sisa_cuti', 'jabatan', 'nominal_gaji', 'no_lokasi'], 'required'],
            [['nik', 'sisa_cuti', 'nominal_gaji', 'no_lokasi'], 'integer'],
            [['tanggal_lahir', 'tanggal_masuk'], 'safe'],
            [['nama'], 'string', 'max' => 30],
            [['password'], 'string', 'max' => 32],
            [['tempat_lahir', 'no_identitas', 'jabatan'], 'string', 'max' => 20],
            [['jenis_kelamin'], 'string', 'max' => 1],
            [['email', 'status_pernikahan', 'status_karyawan'], 'string', 'max' => 50],
            [['file_ktp', 'file_npwp', 'file_bpjs', 'file_cv', 'file_ijazah', 'file_transkrip'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'nik' => 'Nik',
            'nama' => 'Nama',
            'password' => 'Password',
            'tanggal_lahir' => 'Tanggal Lahir',
            'tempat_lahir' => 'Tempat Lahir',
            'no_identitas' => 'No Identitas',
            'jenis_kelamin' => 'Jenis Kelamin',
            'email' => 'Email',
            'status_pernikahan' => 'Status Pernikahan',
            'tanggal_masuk' => 'Tanggal Masuk',
            'file_ktp' => 'File Ktp',
            'file_npwp' => 'File Npwp',
            'file_bpjs' => 'File Bpjs',
            'file_cv' => 'File Cv',
            'file_ijazah' => 'File Ijazah',
            'file_transkrip' => 'File Transkrip',
            'status_karyawan' => 'Status Karyawan',
            'sisa_cuti' => 'Sisa Cuti',
            'jabatan' => 'Jabatan',
            'nominal_gaji' => 'Nominal Gaji',
            'no_lokasi' => 'No Lokasi',
        ];
    }

    public static function findByNIKNama($nik,$nama){
        return static::findOne(['nik'=>$nik, 'nama'=>$nama]);
    }

    public function validatePassword($password)
    {
        return $this->password === $password;
    }
}