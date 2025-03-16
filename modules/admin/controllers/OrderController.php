<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\web\Controller;
use app\models\Order;
use yii\data\ActiveDataProvider;

class OrderController extends Controller
{
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Order::find()->with(['product', 'status', 'user']),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionUpdateStatus($id)
    {
        $order = Order::findOne($id);
        if ($order === null) {
            throw new \yii\web\NotFoundHttpException('Заказ не найден.');
        }

        if (Yii::$app->request->isPost || Yii::$app->request->get('status')) {
            $status = Yii::$app->request->get('status');
            if ($status) {
                // Устанавливаем новый статус
                switch ($status) {
                    case 'in_progress':
                        $order->status_id = 2; // В обработке
                        break;
                    case 'rejected':
                        $order->status_id = 4; // Отклонен
                        break;
                    case 'completed':
                        $order->status_id = 3; // Выполнен
                        break;
                }
                if ($order->save()) {
                    Yii::$app->session->setFlash('success', 'Статус заказа изменен.');
                    return $this->redirect(['index']);
                }
            }
        }

        return $this->render('update-status', [
            'order' => $order,
        ]);
    }
} 