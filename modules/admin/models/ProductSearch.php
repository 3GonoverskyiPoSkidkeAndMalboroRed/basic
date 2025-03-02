<?php

namespace app\modules\admin\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Product;

/**
 * ProductSearch represents the model behind the search form of `app\models\Product`.
 */
class ProductSearch extends Product
{
    public $size;
    public $category_id;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'count', 'cost', 'category_id', 'status'], 'integer'],
            [['title', 'description', 'size'], 'safe'],
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
        $query = Product::find()->with('category');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere(['id' => $this->id])
              ->andFilterWhere(['like', 'title', $this->title])
              ->andFilterWhere(['like', 'description', $this->description])
              ->andFilterWhere(['size' => $this->size])
              ->andFilterWhere(['category_id' => $this->category_id]);

        return $dataProvider;
    }
}
