<?php

namespace app\controllers;

use Yii;
use app\models\Music;
use yii\web\Controller;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;

class MusicController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'actions' => ['create', 'update', 'delete'],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                            return Yii::$app->user->identity->isAdmin;
                        }
                    ],
                    [
                        'actions' => ['index', 'view'],
                        'allow' => true,
                        'roles' => ['?', '@'],
                    ],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Music::find(),
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        $model = $this->findModel($id);
        
        // Устанавливаем OpenGraph мета-теги для музыки
        $this->view->title = $model->title;
        
        // OpenGraph мета-теги
        $this->view->registerMetaTag(['property' => 'og:title', 'content' => $model->title]);
        $this->view->registerMetaTag(['property' => 'og:description', 'content' => 'Музыка: ' . $model->title]);
        
        // Получаем thumbnail для YouTube видео
        $thumbnailUrl = $model->getYoutubeThumbnail();
        if ($thumbnailUrl) {
            $this->view->registerMetaTag(['property' => 'og:image', 'content' => $thumbnailUrl]);
        }
        
        $this->view->registerMetaTag(['property' => 'og:url', 'content' => Yii::$app->request->absoluteUrl]);
        $this->view->registerMetaTag(['property' => 'og:type', 'content' => 'music.song']);

        return $this->render('view', [
            'model' => $model,
        ]);
    }

    public function actionCreate()
    {
        $model = new Music();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Музыка успешно добавлена');
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Музыка успешно обновлена');
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        Yii::$app->session->setFlash('success', 'Музыка успешно удалена');
        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Music::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('Запрашиваемая страница не существует.');
    }
} 