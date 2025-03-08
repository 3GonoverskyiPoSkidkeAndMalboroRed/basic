<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Order;

class UserController extends Controller
{
    public function actionOrders()
    {
        // Получаем заказы текущего пользователя с информацией о статусе
        $orders = Order::find()->where(['user_id' => Yii::$app->user->id])->with(['product', 'status'])->all();

        return $this->render('orders', [
            'orders' => $orders,
        ]);
    }
} 