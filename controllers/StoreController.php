<?php

namespace app\controllers;

use app\models\Product;
use app\models\Category;
use yii\web\Controller;
use yii\data\ActiveDataProvider;

class StoreController extends Controller
{
    public function actionIndex()
    {
        $searchModel = new \app\modules\admin\models\ProductSearch();
        $dataProvider = $searchModel->search(\Yii::$app->request->queryParams);

        // Убедитесь, что здесь нет условия по статусу
        // $dataProvider->query->andWhere(['status' => 1]); // Удалите или закомментируйте эту строку

        $categories = Category::find()->select(['id', 'title'])->indexBy('id')->column();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'categories' => $categories,
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