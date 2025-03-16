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
            [['id', 'count', 'cost', 'category_id'], 'integer'],
            [['title', 'item_name', 'description', 'size'], 'safe'],
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
              ->andFilterWhere(['count' => $this->count])
              ->andFilterWhere(['cost' => $this->cost])
              ->andFilterWhere(['category_id' => $this->category_id])
              ->andFilterWhere(['like', 'title', $this->title])
              ->andFilterWhere(['like', 'item_name', $this->item_name])
              ->andFilterWhere(['like', 'description', $this->description])
              ->andFilterWhere(['like', 'size', $this->size]);

        return $dataProvider;
    }
} 