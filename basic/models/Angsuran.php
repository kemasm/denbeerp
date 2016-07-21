<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "angsuran".
 *
 * @property integer $id
 * @property integer $jumlah_angsuran
 * @property integer $hutang_id
 *
 * @property Hutang $hutang
 */
class Angsuran extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'angsuran';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['jumlah_angsuran', 'hutang_id'], 'integer'],
            [['hutang_id'], 'exist', 'skipOnError' => true, 'targetClass' => Hutang::className(), 'targetAttribute' => ['hutang_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'jumlah_angsuran' => 'Jumlah Angsuran',
            'hutang_id' => 'Hutang ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHutang()
    {
        return $this->hasOne(Hutang::className(), ['id' => 'hutang_id']);
    }
}
