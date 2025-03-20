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
        
        // Добавляем условие для отображения только товаров с count > 0
        $dataProvider->query->andWhere(['>', 'count', 0]);

        // Получаем категории с названиями
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
        if ($model === null || $model->count <= 0) { // Добавляем проверку на количество
            throw new \yii\web\NotFoundHttpException('Товар не найден или недоступен.');
        }

        return $this->render('view', [
            'model' => $model,
        ]);
    }
} 