<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        // var_dump(Yii::$app->security->generatePasswordHash('password')); die;

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            Yii::$app->session->setFlash('success', 'Пользователь успешно авторизован!');
            // Проверяем, является ли пользователь администратором
            if (Yii::$app->user->identity->isAdmin) {
                return $this->redirect('/admin'); // Перенаправление для администраторов
            } else {
                return $this->redirect('/user/orders'); // Перенаправление для обычных пользователей
            } 
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }


    
    public function actionLogout()
    {
        Yii::$app->user->logout();

        Yii::$app->session->setFlash('success', 'Вы успешно вышли из системы');
        return $this->goHome();
    }


    
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }


    
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionRegister()
    {
        $model = new \app\models\RegisterForm();
        if ($model->load(Yii::$app->request->post())) {

            if ($user = $model->userRegister()) {
                Yii::$app->user->login($user);
                Yii::$app->session->setFlash('success', 'Пользователь успешно зарегистрирован!');
                return $this->redirect('/account');
            }
            
        }
        return $this->render('register', ['model' => $model]);
    }
}
