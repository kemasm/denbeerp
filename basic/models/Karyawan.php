<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "karyawan".
 *
 * @property string $nik
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
 *
 * @property Asset[] $assets
 * @property Cuti[] $cutis
 * @property Cuti[] $cutis0
 * @property Hutang[] $hutangs
 * @property Lokasi $noLokasi
 * @property Perjanjian[] $perjanjians
 * @property PoCustomer[] $poCustomers
 * @property PoSupplier[] $poSuppliers
 * @property Quotation[] $quotations
 * @property Rekening[] $rekenings
 * @property Request[] $requests
 * @property Stok[] $stoks
 * @property Stok[] $stoks0
 * @property Stok[] $stoks1
 * @property SuratPeringatan[] $suratPeringatans
 * @property Training[] $trainings
 * @property UpdateKaryawan[] $updateKaryawans
 */
class Karyawan extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
    * @UploadedFile
    */
    public $ktp;
    public $npwp;
    public $bpjs;
    public $cv;
    public $transkrip;
    public $ijazah;

    /**s
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
            [['nik', 'nama', 'password', 'tanggal_lahir', 'tempat_lahir', 'no_identitas', 'jenis_kelamin', 'email', 'status_pernikahan', 'tanggal_masuk', 'status_karyawan', 'sisa_cuti', 'jabatan', 'gaji', 'no_lokasi'], 'required'],
            [['nik'], 'string', 'length' => [6]],
            [['sisa_cuti', 'gaji', 'no_lokasi'], 'integer'],
            [['tanggal_lahir', 'tanggal_masuk'], 'safe'],
            [['nama', 'email', 'status_pernikahan', 'status_karyawan'], 'string', 'max' => 50],
            [['ktp', 'npwp', 'bpjs', 'cv', 'ijazah', 'transkrip'], 'file','skipOnEmpty' => true, 'extensions' => 'pdf'],
            [['password', 'file_ktp', 'file_npwp', 'file_bpjs', 'file_cv', 'file_ijazah', 'file_transkrip'], 'string', 'max' => 255],
            [['tempat_lahir', 'no_identitas', 'jabatan'], 'string', 'max' => 20],
            [['jenis_kelamin'], 'string', 'max' => 1],
            [['no_identitas'], 'unique'],
            [['no_lokasi'], 'exist', 'skipOnError' => true, 'targetClass' => Lokasi::className(), 'targetAttribute' => ['no_lokasi' => 'no_lokasi']],
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
            'gaji' => 'Gaji',
            'no_lokasi' => 'No Lokasi',
        ];
    }

    /**
    * recover login
    */

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



    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAssets()
    {
        return $this->hasMany(Asset::className(), ['nik_pic' => 'nik']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCutis()
    {
        return $this->hasMany(Cuti::className(), ['nik' => 'nik']);
    }

    public function getSisacuti()
    {
        $sisa = 12;
        foreach ($this->cutis as $cuti) {
            if(date('Y',strtotime($cuti->tanggal_awal)) == date("Y") && $cuti->status == 1){
                $sisa -= ((strtotime($cuti->tanggal_akhir) - strtotime($cuti->tanggal_awal))/60/60/24 + 1);   
            }
        }

        return $sisa;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCutis0()
    {
        return $this->hasMany(Cuti::className(), ['nik_penyetuju' => 'nik']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHutangs()
    {
        return $this->hasMany(Hutang::className(), ['nik' => 'nik']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNoLokasi()
    {
        return $this->hasOne(Lokasi::className(), ['no_lokasi' => 'no_lokasi']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerjanjians()
    {
        return $this->hasMany(Perjanjian::className(), ['nik_penandatangan_denbe' => 'nik']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPoCustomers()
    {
        return $this->hasMany(PoCustomer::className(), ['nik_pm_denbe' => 'nik']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPoSuppliers()
    {
        return $this->hasMany(PoSupplier::className(), ['nik_pm_denbe' => 'nik']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuotations()
    {
        return $this->hasMany(Quotation::className(), ['nik_pm_denbe' => 'nik']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRekenings()
    {
        return $this->hasMany(Rekening::className(), ['nik' => 'nik']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRequests()
    {
        return $this->hasMany(Request::className(), ['nik' => 'nik']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStoks()
    {
        return $this->hasMany(Stok::className(), ['nik_pic_masuk' => 'nik']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStoks0()
    {
        return $this->hasMany(Stok::className(), ['nik_pic_keluar_1' => 'nik']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStoks1()
    {
        return $this->hasMany(Stok::className(), ['nik_pic_keluar_2' => 'nik']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSuratPeringatans()
    {
        return $this->hasMany(SuratPeringatan::className(), ['nik' => 'nik']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTrainings()
    {
        return $this->hasMany(Training::className(), ['nik' => 'nik']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdateKaryawans()
    {
        return $this->hasMany(UpdateKaryawan::className(), ['nik' => 'nik']);
    }

    public function getRole(){
        return $this->jabatan;
    }

    public function upload(){

        if($this->validate()){
            
            if($this->ktp){

                $this->file_ktp = 'uploads/ktp/'.$this->nik.'.pdf';
                $this->ktp->saveAs($this->file_ktp);
                $this->ktp = null;

            }

            if($this->npwp){

                $this->file_npwp = 'uploads/npwp/'.$this->nik.'.pdf';
                $this->npwp->saveAs($this->file_npwp);
                $this->npwp = null;

            }

            if($this->bpjs){

                $this->file_bpjs = 'uploads/bpjs/'.$this->nik.'.pdf';
                $this->bpjs->saveAs($this->file_bpjs);
                $this->bpjs = null;

            }

            if($this->cv){

                $this->file_cv = 'uploads/cv/'.$this->nik.'.pdf';
                $this->cv->saveAs($this->file_cv);
                $this->cv = null;

            }

            if($this->transkrip){

                $this->file_transkrip = 'uploads/transkrip/'.$this->nik.'.pdf';
                $this->transkrip->saveAs($this->file_transkrip);
                $this->transkrip = null;

            }

            if($this->ijazah){

                $this->file_ijazah = 'uploads/ijazah/'.$this->nik.'.pdf';
                $this->ijazah->saveAs($this->file_ijazah);
                $this->ijazah = null;

            }

            return true;

        } else return false;
    }
}
