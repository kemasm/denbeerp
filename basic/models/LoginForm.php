<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class LoginForm extends Model
{
    public $nik;
    public $nama;
    public $password;
    public $rememberMe = true;

    private $_user = false;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['nik', 'nama', 'password'], 'required'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if ($user){
                if (!$user->validatePassword($this->password)) {
                    $this->addError($attribute, 'Password salah.');
                }
            } else {
                $nik_exist=true;
                $nama_exist=true;
                if (!Karyawan::findByNIK($this->nik)){
                    $this->addError('nik', 'NIK salah.');
                    $nik_exist=false;
                }
                if (!Karyawan::findByNama($this->nama)){
                    $this->addError('nama', 'Nama salah.');
                    $nama_exist=false;
                }
                if ($nik_exist && $nama_exist){
                    $this->addError('nik', 'NIK dan Nama tidak sesuai.');
                }
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     * @return boolean whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600*24*30 : 0);
        }
        return false;
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = Karyawan::findByNIKNama($this->nik,$this->nama);
        }

        return $this->_user;
    }
}
