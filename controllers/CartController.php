<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\Cart;
use app\models\Product;
use app\models\Order;
use Yii;

class CartController extends Controller
{
    public function actionIndex()
    {
        $cart = Cart::getCart();
        $products = Product::find()->where(['id' => array_keys($cart)])->all();

        return $this->render('index', [
            'cart' => $cart,
            'products' => $products,
        ]);
    }

    public function actionAdd($id)
    {
        Cart::addToCart($id);
        return $this->redirect(['index']);
    }

    public function actionRemove($id)
    {
        Cart::removeFromCart($id);
        return $this->redirect(['index']);
    }

    public function actionClear()
    {
        Cart::clearCart();
        return $this->redirect(['index']);
    }

    public function actionCheckout()
    {
        $model = new \yii\base\DynamicModel(['contact_number']);
        $model->addRule(['contact_number'], 'required')
              ->addRule(['contact_number'], 'string', ['max' => 50]);

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $cart = Cart::getCart(); // Получаем корзину
            if (empty($cart)) {
                Yii::$app->session->setFlash('error', 'Ваша корзина пуста.');
                return $this->redirect(['index']);
            }

            foreach ($cart as $productId => $quantity) {
                $product = Product::findOne($productId);
                if ($product && $product->count >= $quantity) {
                    // Создаем новый заказ
                    $order = new Order();
                    $order->product_id = $productId;
                    $order->user_id = Yii::$app->user->id;
                    $order->status_id = 1; // Предположим, что 1 - это статус "Новый заказ"
                    $order->contact_number = $model->contact_number; // Сохраняем номер телефона

                    if ($order->save()) {
                        // Обновляем количество товара
                        $product->count -= $quantity;
                        if ($product->count <= 0) {
                            $product->status = 0; // Скрываем товар, если его количество 0
                        }
                        $product->save();
                  
                    } else {
                        Yii::$app->session->setFlash('error', 'Ошибка при сохранении заказа.');
                        return $this->redirect(['index']);
                    }
                } else {
                    Yii::$app->session->setFlash('error', 'Недостаточно товара в наличии.');
                    return $this->redirect(['index']);
                }
            }

            Cart::clearCart(); // Очищаем корзину после оформления заказа
            Yii::$app->session->setFlash('success', 'С вами свяжутся для оформления заказа.');
            return $this->redirect(['user/orders']); // Перенаправляем на страницу корзины
        }

        return $this->render('checkout', [
            'model' => $model,
        ]);
    }
} 