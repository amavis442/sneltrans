<?php

namespace app\modules\content\article\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\content\article\models\Article;

/**
 * ArticleSearch represents the model behind the search form about `app\modules\content\article\models\Article`.
 */
class ArticleSearch extends Article
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'author'], 'integer'],
            [['title', 'teaser', 'body', 'status', 'create_at', 'update_at'], 'safe'],
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
        $query = Article::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'author' => $this->author,
            'create_at' => $this->create_at,
            'update_at' => $this->update_at,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'teaser', $this->teaser])
            ->andFilterWhere(['like', 'body', $this->body])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
