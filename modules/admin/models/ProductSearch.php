<?php

namespace app\modules\admin\models;

use app\models\Product;
use yii\base\Model;
use yii\data\ActiveDataProvider;

class ProductSearch extends Product
{
    public function rules()
    {
        return [
            [['id', 'category_id'], 'integer'],
            [['title', 'description'], 'safe'],
        ];
    }

    public function search($params)
    {
        $query = Product::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere(['id' => $this->id])
              ->andFilterWhere(['category_id' => $this->category_id])

              ->andFilterWhere(['like', 'title', $this->title])
              ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
} 