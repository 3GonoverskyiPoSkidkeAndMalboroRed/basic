<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\Cart;
use app\models\Product;

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
} 