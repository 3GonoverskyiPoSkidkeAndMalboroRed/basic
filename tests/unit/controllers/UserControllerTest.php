<?php

namespace tests\unit\controllers;

use app\controllers\UserController;
use app\models\Order;
use Yii;

class UserControllerTest extends \Codeception\Test\Unit
{
    protected $controller;
    
    protected function _before()
    {
        $this->controller = new UserController('user', Yii::$app);
    }
    
    public function testActionOrders()
    {
        // Проверяем, что у контроллера есть нужный метод
        verify(method_exists($this->controller, 'actionOrders'))->true();
    }
}
