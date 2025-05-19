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
        if ($model === null || $model->count <= 0) {
            throw new \yii\web\NotFoundHttpException('Товар не найден или недоступен.');
        }
        
        // Устанавливаем OpenGraph мета-теги для продукта
        $this->view->title = $model->title;
        $this->view->params['meta_description'] = mb_substr(strip_tags($model->description), 0, 160);
        
        // OpenGraph мета-теги
        $this->view->registerMetaTag(['property' => 'og:title', 'content' => $model->title]);
        $this->view->registerMetaTag(['property' => 'og:description', 'content' => mb_substr(strip_tags($model->description), 0, 160)]);
        
        // Если у продукта есть изображения
        if ($model->photos && !empty($model->photos)) {
            $imageUrl = 'https://neverovp11isp222.h1n.ru/uploads/' . $model->photos[0]->file_name;
            $this->view->registerMetaTag(['property' => 'og:image', 'content' => $imageUrl]);
        }
        
        $this->view->registerMetaTag(['property' => 'og:url', 'content' => Yii::$app->request->absoluteUrl]);
        $this->view->registerMetaTag(['property' => 'og:type', 'content' => 'product']);

        return $this->render('view', [
            'model' => $model,
        ]);
    }
} 