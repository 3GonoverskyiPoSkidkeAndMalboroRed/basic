<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\Product;
use app\models\Category;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\data\ActiveDataProvider;
use yii\web\UploadedFile;

class ProductController extends Controller
{
    public function actionCreate()
    {
        $model = new Product();
        $categories = Category::find()->select(['id', 'title'])->indexBy('id')->column();

        if ($model->load(Yii::$app->request->post())) {
            $model->image = UploadedFile::getInstance($model, 'image'); // Получите загружаемый файл
            if ($model->image) { // Убедитесь, что файл загружен
                if ($model->validate() && $model->save()) {
                    $imagePath = $model->upload(); // Загрузите изображение
                    if ($imagePath) {
                        // Сохраните путь к изображению в таблице Photo
                        $model->savePhoto($model->image->baseName . '.' . $model->image->extension);
                    }
                    Yii::$app->session->setFlash('success', 'Товар успешно добавлен.');
                    return $this->redirect(['index']); // Перенаправление на страницу списка товаров
                }
            } else {
                Yii::$app->session->setFlash('error', 'Ошибка загрузки изображения.'); // Сообщение об ошибке
            }
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

    public function actionUpdate($id)
    {
        $model = $this->findModel($id); // Найти модель по ID
        $categories = Category::find()->select(['id', 'title'])->indexBy('id')->column();

        if ($model->load(Yii::$app->request->post())) {
            $model->image = UploadedFile::getInstance($model, 'image'); // Получите загружаемый файл
            if ($model->image) { // Убедитесь, что файл загружен
                if ($model->validate() && $model->save()) {
                    $imagePath = $model->upload(); // Загрузите изображение
                    if ($imagePath) {
                        // Сохраните путь к изображению в таблице Photo
                        $model->savePhoto($model->image->baseName . '.' . $model->image->extension);
                    }
                    Yii::$app->session->setFlash('success', 'Товар успешно обновлен.');
                    return $this->redirect(['index']); // Перенаправление на страницу списка товаров
                }
            } else {
                Yii::$app->session->setFlash('error', 'Ошибка загрузки изображения.'); // Сообщение об ошибке
            }
        }

        return $this->render('update', [
            'model' => $model,
            'categories' => $categories,
        ]);
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete(); // Удалить модель по ID
        Yii::$app->session->setFlash('success', 'Товар успешно удален.'); // Сообщение об успешном удалении
        return $this->redirect(['index']); // Перенаправление на страницу списка товаров
    }

    protected function findModel($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('Запрашиваемая страница не найдена.');
    }

    // Добавьте другие методы, такие как actionIndex, actionUpdate и т.д.
} 