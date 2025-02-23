<?php

namespace app\models;

use Yii;

class Cart
{
    public static function addToCart($productId)
    {
        $cart = Yii::$app->session->get('cart', []);
        if (isset($cart[$productId])) {
            $cart[$productId]++;
        } else {
            $cart[$productId] = 1;
        }
        Yii::$app->session->set('cart', $cart);
    }

    public static function removeFromCart($productId)
    {
        $cart = Yii::$app->session->get('cart', []);
        if (isset($cart[$productId])) {
            unset($cart[$productId]);
            Yii::$app->session->set('cart', $cart);
        }
    }

    public static function getCart()
    {
        return Yii::$app->session->get('cart', []);
    }

    public static function clearCart()
    {
        Yii::$app->session->remove('cart');
    }
} 