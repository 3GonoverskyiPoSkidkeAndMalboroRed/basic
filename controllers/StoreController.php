<?php

namespace app\controllers;

use app\models\Product;
use yii\web\Controller;
use yii\data\ActiveDataProvider;

class StoreController extends Controller
{
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Product::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        $model = Product::findOne($id);
        if ($model === null) {
            throw new \yii\web\NotFoundHttpException('Товар не найден.');
        }

        return $this->render('view', [
            'model' => $model,
        ]);
    }
} 