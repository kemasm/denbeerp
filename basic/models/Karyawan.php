<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

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
 * @property integer $gaji
 * @property integer $no_lokasi
 */
class Karyawan extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
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
            [['nik', 'nama', 'password', 'tanggal_lahir', 'tempat_lahir', 'no_identitas', 'jenis_kelamin', 'email', 'status_pernikahan', 'tanggal_masuk', 'status_karyawan', 'sisa_cuti'], 'required'],
            [['nik'], 'string', 'length' => [6]],
            [['sisa_cuti', 'gaji', 'no_lokasi'], 'integer'],
            [['tanggal_lahir', 'tanggal_masuk'], 'safe'],
            [['nama'], 'string', 'max' => 30],
            [['password'], 'string', 'length' => [7,12]],
            [['tempat_lahir', 'no_identitas', 'jabatan'], 'string', 'max' => 20],
            [['jenis_kelamin'], 'string', 'length' => 1],
            [['email', 'status_pernikahan', 'status_karyawan'], 'string', 'max' => 50],
            [['file_ktp', 'file_npwp', 'file_bpjs', 'file_cv', 'file_ijazah', 'file_transkrip'], 'string', 'max' => 255],
            [['file_ktp', 'file_npwp', 'file_bpjs', 'file_cv', 'file_ijazah', 'file_transkrip', 'jabatan'], 'default', 'value' => ''],
            [['no_lokasi'], 'default', 'value' => 0],
            [['gaji'], 'default', 'value' => 12]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'nik' => 'NIK',
            'nama' => 'Nama',
            'password' => 'Password',
            'tanggal_lahir' => 'Tanggal Lahir',
            'tempat_lahir' => 'Tempat Lahir',
            'no_identitas' => 'No Identitas',
            'jenis_kelamin' => 'Jenis Kelamin',
            'email' => 'Email',
            'status_pernikahan' => 'Status Pernikahan',
            'tanggal_masuk' => 'Tanggal Masuk',
            'file_ktp' => 'File KTP',
            'file_npwp' => 'File NPWP',
            'file_bpjs' => 'File BPJS',
            'file_cv' => 'File CV',
            'file_ijazah' => 'File Ijazah',
            'file_transkrip' => 'File Transkrip',
            'status_karyawan' => 'Status Karyawan',
            'sisa_cuti' => 'Sisa Cuti',
            'jabatan' => 'Jabatan',
            'gaji' => 'Nominal Gaji',
            'no_lokasi' => 'No Lokasi',
        ];
    }

    public static function findByNIKNama($nik,$nama){
        return static::findOne(['nik'=>$nik, 'nama'=>$nama]);
    }
    public static function findByNIK($nik){
        return static::findOne(['nik'=>$nik]);
    }
    public static function findByNama($nama){
        return static::findOne(['nama'=>$nama]);
    }

    public function validatePassword($password)
    {
        return $this->password === $password;
    }

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    public function getId()
    {
        return $this->nik;
    }
    public function getAuthKey()
    {
        throw new NotSupportedException();//You should not implement this method if you don't have authKey column in your database
    }
    public function validateAuthKey($authKey)
    {
       throw new NotSupportedException();//You should not implement this method if you don't have authKey column in your database
    }
}
