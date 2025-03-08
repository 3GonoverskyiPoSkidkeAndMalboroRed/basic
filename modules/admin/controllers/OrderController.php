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
            'query' => Order::find()->with(['product', 'status', 'user']), // Предполагается, что у вас есть связь с моделью User
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionUpdate($id)
    {
        $order = Order::findOne($id);
        if ($order === null) {
            throw new \yii\web\NotFoundHttpException('Заказ не найден.');
        }

        if (Yii::$app->request->isPost) {
            $order->status_id = Yii::$app->request->post('status_id'); // Получите новый статус из формы
            if ($order->save()) {
                Yii::$app->session->setFlash('success', 'Статус заказа изменен.');
                return $this->redirect(['index']);
            }
        }

        return $this->render('update', [
            'order' => $order,
        ]);
    }

    public function actionAdminOrders()
    {
        // Получаем все заказы с информацией о статусе
        $orders = Order::find()->with(['product', 'status', 'user'])->all();

        return $this->render('admin-orders', [
            'orders' => $orders,
        ]);
    }

    public function actionMyOrders()
    {
        // Получаем все заказы с информацией о статусе
        $orders = Order::find()->with(['product', 'status', 'user'])->all();

        return $this->render('my-orders', [
            'orders' => $orders,
        ]);
    }

    public function actionUpdateStatus($id)
    {
        $order = Order::findOne($id);
        if ($order === null) {
            throw new \yii\web\NotFoundHttpException('Заказ не найден.');
        }

        if (Yii::$app->request->isPost) {
            $order->status_id = Yii::$app->request->post('Order')['status_id']; // Получите новый статус из формы
            if ($order->save()) {
                Yii::$app->session->setFlash('success', 'Статус заказа изменен.');
                return $this->redirect(['my-orders']);
            }
        }

        return $this->render('update-status', [
            'order' => $order,
        ]);
    }
} 