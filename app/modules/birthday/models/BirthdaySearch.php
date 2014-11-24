<?php

namespace app\modules\birthday\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\birthday\models\Birthday;

/**
 * BirthdaySearch represents the model behind the search form about `app\models\Birthday`.
 */
class BirthdaySearch extends Birthday
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['name', 'picture', 'comments', 'birthdate', 'dateofdeath', 'created_at', 'updated_at'], 'safe'],
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
        $query = Birthday::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'birthdate' => $this->birthdate,
            'dateofdeath' => $this->dateofdeath,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'picture', $this->picture])
            ->andFilterWhere(['like', 'comments', $this->comments]);

        return $dataProvider;
    }
}
