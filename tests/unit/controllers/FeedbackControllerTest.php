<?php

namespace tests\unit\controllers;

use app\controllers\CartController;
use app\models\Cart;
use app\models\Order;
use app\models\Product;
use Yii;

class CartControllerTest extends \Codeception\Test\Unit
{
    protected $controller;
    
    protected function _before()
    {
        $this->controller = new CartController('cart', Yii::$app);
        Yii::$app->session->remove('cart');
    }
    
    public function testActionIndex()
    {
        // Проверяем, что у контроллера есть нужный метод
        verify(method_exists($this->controller, 'actionIndex'))->true();
    }
    
    public function testActionAdd()
    {
        // Проверяем, что у контроллера есть нужный метод
        verify(method_exists($this->controller, 'actionAdd'))->true();
    }
    
    public function testActionRemove()
    {
        // Проверяем, что у контроллера есть нужный метод
        verify(method_exists($this->controller, 'actionRemove'))->true();
    }
    
    public function testActionClear()
    {
        // Проверяем, что у контроллера есть нужный метод
        verify(method_exists($this->controller, 'actionClear'))->true();
    }
    
    public function testActionCheckout()
    {
        // Проверяем, что у контроллера есть нужный метод
        verify(method_exists($this->controller, 'actionCheckout'))->true();
    }
}
