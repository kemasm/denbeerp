<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Cuti;

/**
 * CutiSearch represents the model behind the search form about `app\models\Cuti`.
 */
class CutiSearch extends Cuti
{
    public $karyawan;
    public $penyetuju;
    public $admin;
    public $penolak0;

    public $state;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_cuti'], 'integer'],
            [['nik', 'tanggal_awal', 'tanggal_akhir', 'nik_penyetuju', 'keterangan', 'nik_admin'], 'safe'],
            [['karyawan', 'penyetuju', 'admin', 'penolak0', 'state'], 'safe'],
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
        $query = Cuti::find();

        // add conditions that should always apply here

        $query -> joinWith(['karyawan a', 'penyetuju b', 'admin c', 'penolak0 d']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['karyawan'] = [
            'asc' => ['a.nama' => SORT_ASC],
            'desc' => ['a.nama' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['penyetuju'] = [
            'asc' => ['b.nama' => SORT_ASC],
            'desc' => ['b.nama' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['admin'] = [
            'asc' => ['c.nama' => SORT_ASC],
            'desc' => ['c.nama' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['penolak0'] = [
            'asc' => ['d.nama' => SORT_ASC],
            'desc' => ['d.nama' => SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        if(Yii::$app->user->identity->jabatan == 'admin' || Yii::$app->user->identity->jabatan == 'manager' || Yii::$app->user->identity->jabatan == 'hrd'){ 
            //dd($this->status); 
            $query->andFilterWhere([
                'id_cuti' => $this->id_cuti,
                'tanggal_awal' => $this->tanggal_awal,
                'tanggal_akhir' => $this->tanggal_akhir,
            ]);

            $query->andFilterWhere(['like', 'nik', $this->nik])
                ->andFilterWhere(['like', 'nik_penyetuju', $this->nik_penyetuju])
                ->andFilterWhere(['like', 'keterangan', $this->keterangan])
                ->andFilterWhere(['like', 'a.nama', $this->karyawan])
                ->andFilterWhere(['like', 'b.nama', $this->penyetuju])
                ->andFilterWhere(['like', 'c.nama', $this->admin])
                ->andFilterWhere(['like', 'd.nama', $this->penolak0]);

            if($this->state == 'ditolak'){
                $query->andWhere(['not',['penolak' => null]]);
            } else if($this->state == 'disetujui'){
                $query->andWhere(['not', ['nik_penyetuju' => null]])
                    ->andWhere(['not', ['nik_admin' => null]]);
            } else if($this->state == 'menunggu persetujuan'){
                $query->andWhere(['nik_penyetuju' => null],['nik_admin' => null]);
            }

            return $dataProvider;
        } else {
            $query->andFilterWhere([
                'id_cuti' => $this->id_cuti,
                'tanggal_awal' => $this->tanggal_awal,
                'tanggal_akhir' => $this->tanggal_akhir,
                'cuti.nik' => Yii::$app->user->identity->nik,
            ]);

            $query->andFilterWhere(['like', 'nik', $this->nik])
                ->andFilterWhere(['like', 'nik_penyetuju', $this->nik_penyetuju])
                ->andFilterWhere(['like', 'keterangan', $this->keterangan])
                ->andFilterWhere(['like', 'a.nama', $this->karyawan])
                ->andFilterWhere(['like', 'b.nama', $this->penyetuju])
                ->andFilterWhere(['like', 'c.nama', $this->admin])
                ->andFilterWhere(['like', 'd.nama', $this->penolak0]);

            if($this->state == 'ditolak'){
                $query->andWhere(['not',['penolak' => null]]);
            } else if($this->state == 'disetujui'){
                $query->andWhere(['not', ['nik_penyetuju' => null]])
                    ->andWhere(['not', ['nik_admin' => null]]);
            } else if($this->state == 'menunggu persetujuan'){
                $query->andWhere(['nik_penyetuju' => null],['nik_admin' => null]);
            }

            return $dataProvider;
        }

        
    }
}
