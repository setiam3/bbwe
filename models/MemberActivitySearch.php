<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\MemberActivity;

/**
 * MemberActivitySearch represents the model behind the search form of `app\models\MemberActivity`.
 */
class MemberActivitySearch extends MemberActivity
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'idmember', 'activity', 'inactivity', 'reported_abuse', 'daily', 'weekly', 'monthly', 'increase', 'decrease'], 'integer'],
            [['date_activity'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = MemberActivity::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query->joinwith(['member']),
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
            'idmember' => $this->idmember,
            'member.name' => $this->idmember,
            'activity' => $this->activity,
            'inactivity' => $this->inactivity,
            'reported_abuse' => $this->reported_abuse,
            'daily' => $this->daily,
            'weekly' => $this->weekly,
            'monthly' => $this->monthly,
            'increase' => $this->increase,
            'decrease' => $this->decrease,
            'date_activity' => $this->date_activity,
        ]);
        //print_r($query);die;
        return $dataProvider;
    }
}
