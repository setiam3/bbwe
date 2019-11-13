<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\MemberPodcastBlog;

/**
 * PodcastBlogSearch represents the model behind the search form of `app\models\MemberPodcastBlog`.
 */
class PodcastBlogSearch extends MemberPodcastBlog
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'idmember', 'blog', 'podcast', 'uploaded_times', 'daily', 'weekly', 'monthly'], 'integer'],
            [['datetime'], 'safe'],
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
        $query = MemberPodcastBlog::find();

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
            'datetime' => $this->datetime,
            'idmember' => $this->idmember,
            'blog' => $this->blog,
            'podcast' => $this->podcast,
            'uploaded_times' => $this->uploaded_times,
            'daily' => $this->daily,
            'weekly' => $this->weekly,
            'monthly' => $this->monthly,
        ]);

        return $dataProvider;
    }
}
