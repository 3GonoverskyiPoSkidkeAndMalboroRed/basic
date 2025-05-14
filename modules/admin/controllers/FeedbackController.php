<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\Feedback;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * FeedbackController для управления сообщениями обратной связи в админ-панели
 */
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
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                            return Yii::$app->user->identity->isAdmin;
                        }
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Отображает список всех сообщений
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Feedback::find()->with('user')->orderBy(['created_at' => SORT_DESC]),
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Просмотр деталей одного сообщения
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException если сообщение не найдено
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Удаление сообщения
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException если сообщение не найдено
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        
        // Если есть изображение, удаляем его
        if ($model->image && file_exists(Yii::getAlias('@webroot/uploads/' . $model->image))) {
            unlink(Yii::getAlias('@webroot/uploads/' . $model->image));
        }

        $model->delete();
        
        Yii::$app->session->setFlash('success', 'Сообщение успешно удалено.');
        
        return $this->redirect(['index']);
    }

    /**
     * Находит модель Feedback по первичному ключу
     * @param integer $id
     * @return Feedback модель
     * @throws NotFoundHttpException если модель не найдена
     */
    protected function findModel($id)
    {
        if (($model = Feedback::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('Запрашиваемая страница не существует.');
    }
}
