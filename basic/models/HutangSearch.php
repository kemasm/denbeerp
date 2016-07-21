<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Hutang;

/**
 * HutangSearch represents the model behind the search form about `app\models\Hutang`.
 */
class HutangSearch extends Hutang
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['no_penyetujuan', 'jumlah', 'periode', 'id'], 'integer'],
            [['nik', 'tanggal_pengajuan', 'jaminan', 'file_surat_perjanjian', 'status', 'manager_nik', 'admin_nik', 'penolak_nik'], 'safe'],
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
        $query = Hutang::find();

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
            'no_penyetujuan' => $this->no_penyetujuan,
            'jumlah' => $this->jumlah,
            'tanggal_pengajuan' => $this->tanggal_pengajuan,
            'periode' => $this->periode,
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'nik', $this->nik])
            ->andFilterWhere(['like', 'jaminan', $this->jaminan])
            ->andFilterWhere(['like', 'file_surat_perjanjian', $this->file_surat_perjanjian])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'manager_nik', $this->manager_nik])
            ->andFilterWhere(['like', 'admin_nik', $this->admin_nik])
            ->andFilterWhere(['like', 'penolak_nik', $this->penolak_nik]);

        return $dataProvider;
    }
}
