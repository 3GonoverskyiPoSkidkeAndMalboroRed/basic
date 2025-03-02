<?php

namespace app\modules\admin\controllers;

use app\models\Product;
use app\modules\admin\models\ProductSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Category;
use yii\web\UploadedFile;
use Yii;
use app\models\Photo;

/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Product models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Product model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Product model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Product();
        $categories = Category::find()->select(['title', 'id'])->indexBy('id')->column();

        if ($model->load(Yii::$app->request->post())) {
            $photos = UploadedFile::getInstances($model, 'photos');
            if ($model->save()) {
                foreach ($photos as $photo) {
                    $photoModel = new Photo();
                    $photoModel->product_id = $model->id;
                    $photoModel->file_name = $photo->baseName . '.' . $photo->extension;
                    $photo->saveAs('uploads/' . $photoModel->file_name);
                    $photoModel->save();
                }
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'categories' => $categories,
        ]);
    }

    /**
     * Updates an existing Product model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $categories = Category::find()->select(['title', 'id'])->indexBy('id')->column();

        if ($this->request->isPost && $model->load($this->request->post())) {
            if ($model->save()) {
                // Обновление порядка фотографий
                $photos = UploadedFile::getInstances($model, 'photos');
                foreach ($photos as $index => $photo) {
                    $photoModel = new Photo();
                    $photoModel->product_id = $model->id;
                    $photoModel->file_name = $photo->baseName . '.' . $photo->extension;
                    $photoModel->order = $index; // Устанавливаем порядок
                    $photo->saveAs('uploads/' . $photoModel->file_name);
                    $photoModel->save();
                }
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('update', [
            'model' => $model,
            'categories' => $categories,
        ]);
    }

    /**
     * Deletes an existing Product model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Product::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionUploadImage()
    {
        $model = new Photo();
        $model->product_id = Yii::$app->request->post('id'); // Получаем ID товара, если нужно

        if (Yii::$app->request->isPost) {
            $image = UploadedFile::getInstanceByName('file'); // Получаем файл
            if ($image) {
                $model->file_name = $image->baseName . '.' . $image->extension;
                if ($model->save()) {
                    $image->saveAs('uploads/' . $model->file_name);
                    return json_encode(['link' => '@web/uploads/' . $model->file_name]);
                }
            }
        }
        return json_encode(['error' => 'Ошибка загрузки']);
    }

    public function actionUpdateOrder()
    {
        $order = Yii::$app->request->post('order'); // Получаем новый порядок
        foreach ($order as $index => $id) {
            $photo = Photo::findOne($id);
            if ($photo) {
                $photo->order = $index; // Устанавливаем новый порядок
                $photo->save();
            }
        }
        return $this->redirect(['index']);
    }
}
