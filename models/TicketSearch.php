<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Ticket;

/**
 * UsersSearch represents the model behind the search form about `app\models\Userss`.
 */
class TicketSearch extends Ticket
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'npm'], 'integer'],
            [['nama_acara', 'waktu_acara', 'tempat_acara', 'guest_star', 'nama', 'status'], 'safe'],
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
        $query = Ticket::find();

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
            'id' => $this->id,
            'npm' => $this->npm,
        ]);

        $query->andFilterWhere(['like', 'nama_acara', $this->nama_acara])
            ->andFilterWhere(['like', 'waktu_acara', $this->waktu_acara])
            ->andFilterWhere(['like', 'tempat_acara', $this->tempat_acara])
            ->andFilterWhere(['like', 'guest_star', $this->guest_star])
            ->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
