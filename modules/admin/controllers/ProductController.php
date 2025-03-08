<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\Product;
use app\models\Category;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\data\ActiveDataProvider;

class ProductController extends Controller
{
    public function actionCreate()
    {
        $model = new Product();
        $categories = Category::find()->select(['id', 'title'])->indexBy('id')->column();

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->save()) {
            Yii::$app->session->setFlash('success', 'Товар успешно добавлен.');
            return $this->redirect(['index']); // Перенаправление на страницу списка товаров
        }

        return $this->render('create', [
            'model' => $model,
            'categories' => $categories,
        ]);
    }

    public function actionIndex()
    {
        $dataProvider = new \yii\data\ActiveDataProvider([
            'query' => Product::find(), // Убедитесь, что здесь нет условия по статусу
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    // Добавьте другие методы, такие как actionIndex, actionUpdate и т.д.
} 