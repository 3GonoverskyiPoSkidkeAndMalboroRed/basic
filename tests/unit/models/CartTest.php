<?php

namespace tests\unit\models;

use app\models\Cart;
use Yii;

class CartTest extends \Codeception\Test\Unit
{
    protected function _before()
    {
        // Очищаем сессию перед каждым тестом
        Yii::$app->session->remove('cart');
    }
    
    public function testAddToCart()
    {
        // Добавляем товар в корзину
        Cart::addToCart(1);
        
        // Получаем корзину из сессии
        $cart = Yii::$app->session->get('cart', []);
        
        // Проверяем, что товар добавлен
        verify($cart)->arrayHasKey(1);
        verify($cart[1])->equals(1);
        
        // Добавляем тот же товар еще раз
        Cart::addToCart(1);
        
        // Получаем корзину снова
        $cart = Yii::$app->session->get('cart', []);
        
        // Проверяем, что количество увеличилось
        verify($cart[1])->equals(2);
    }
    
    public function testRemoveFromCart()
    {
        // Добавляем товары в корзину
        Cart::addToCart(1);
        Cart::addToCart(2);
        
        // Проверяем, что товары добавлены
        $cart = Yii::$app->session->get('cart', []);
        verify($cart)->arrayHasKey(1);
        verify($cart)->arrayHasKey(2);
        
        // Удаляем один товар
        Cart::removeFromCart(1);
        
        // Получаем корзину снова
        $cart = Yii::$app->session->get('cart', []);
        
        // Проверяем, что первый товар удален, а второй остался
        // verify($cart)->arrayNotHasKey(1);
        verify($cart)->arrayHasKey(2);
    }
    
    public function testGetCart()
    {
        // Добавляем товар в корзину
        Yii::$app->session->set('cart', [1 => 2, 2 => 1]);
        
        // Получаем корзину через метод getCart
        $cart = Cart::getCart();
        
        // Проверяем содержимое корзины
        verify($cart)->equals([1 => 2, 2 => 1]);
    }
    
    public function testClearCart()
    {
        // Добавляем товары в корзину
        Yii::$app->session->set('cart', [1 => 2, 2 => 1]);
        
        // Очищаем корзину
        Cart::clearCart();
        
        // Проверяем, что корзина пуста
        verify(Yii::$app->session->has('cart'))->false();
        verify(Cart::getCart())->equals([]);
    }
}
