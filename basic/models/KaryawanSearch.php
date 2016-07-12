<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Karyawan;

/**
 * KaryawanSearch represents the model behind the search form about `app\models\Karyawan`.
 */
class KaryawanSearch extends Karyawan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nik', 'nama', 'password', 'tanggal_lahir', 'tempat_lahir', 'no_identitas', 'jenis_kelamin', 'email', 'status_pernikahan', 'tanggal_masuk', 'file_ktp', 'file_npwp', 'file_bpjs', 'file_cv', 'file_ijazah', 'file_transkrip', 'status_karyawan', 'jabatan'], 'safe'],
            [['sisa_cuti', 'gaji', 'no_lokasi'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Karyawan::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'tanggal_lahir' => $this->tanggal_lahir,
            'tanggal_masuk' => $this->tanggal_masuk,
            'sisa_cuti' => $this->sisa_cuti,
            'gaji' => $this->gaji,
            'no_lokasi' => $this->no_lokasi,
        ]);

        $query->andFilterWhere(['like', 'nik', $this->nik])
            ->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'password', $this->password])
            ->andFilterWhere(['like', 'tempat_lahir', $this->tempat_lahir])
            ->andFilterWhere(['like', 'no_identitas', $this->no_identitas])
            ->andFilterWhere(['like', 'jenis_kelamin', $this->jenis_kelamin])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'status_pernikahan', $this->status_pernikahan])
            ->andFilterWhere(['like', 'file_ktp', $this->file_ktp])
            ->andFilterWhere(['like', 'file_npwp', $this->file_npwp])
            ->andFilterWhere(['like', 'file_bpjs', $this->file_bpjs])
            ->andFilterWhere(['like', 'file_cv', $this->file_cv])
            ->andFilterWhere(['like', 'file_ijazah', $this->file_ijazah])
            ->andFilterWhere(['like', 'file_transkrip', $this->file_transkrip])
            ->andFilterWhere(['like', 'status_karyawan', $this->status_karyawan])
            ->andFilterWhere(['like', 'jabatan', $this->jabatan]);

        return $dataProvider;
    }
}
