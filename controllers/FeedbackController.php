<?php

namespace app\controllers;

use Yii;
use app\models\Feedback;
use app\models\User;
use yii\web\Controller;
use yii\web\UploadedFile;
use yii\filters\AccessControl;

class FeedbackController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'actions' => ['create'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * Создание нового сообщения обратной связи
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Feedback();
        $model->user_id = Yii::$app->user->id;

        if ($model->load(Yii::$app->request->post())) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            
            if ($model->upload() && $model->save()) {
                // Отправляем уведомление администратору
                $model->sendNotification();
                
                Yii::$app->session->setFlash('success', 'Спасибо за ваше сообщение. Мы свяжемся с вами в ближайшее время.');
                return $this->redirect(['/user/orders']);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }
}
