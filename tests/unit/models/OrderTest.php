<?php

namespace tests\unit\models;

use app\models\Order;
use app\models\Product;
use app\models\User;
use app\models\Status;

class OrderTest extends \Codeception\Test\Unit
{
    public function testValidation()
    {
        $model = new Order();
        
        // Проверяем, что модель не проходит валидацию без обязательных полей
        verify($model->validate())->false();
        verify($model->errors)->arrayHasKey('user_id');
        verify($model->errors)->arrayHasKey('product_id');
        verify($model->errors)->arrayHasKey('status_id');
        verify($model->errors)->arrayHasKey('contact_number');
        
        // Заполняем обязательные поля
        $model->user_id = 1;
        $model->product_id = 1;
        $model->status_id = 1;
        $model->contact_number = '+7(999)-999-99-99';
        
        // Проверяем, что теперь модель проходит валидацию
        verify($model->validate())->true();
    }
    
    public function testRelations()
    {
        // Создаем моки для тестирования
        $order = $this->make(Order::class, [
            'user_id' => 1,
            'product_id' => 1,
            'status_id' => 1,
            'getUser' => function() {
                return $this->make(User::class, [
                    'id' => 1,
                    'full_name' => 'Тестовый Пользователь'
                ]);
            },
            'getProduct' => function() {
                return $this->make(Product::class, [
                    'id' => 1,
                    'title' => 'Тестовый товар'
                ]);
            },
            'getStatus' => function() {
                return $this->make(Status::class, [
                    'id' => 1,
                    'title' => 'Новый'
                ]);
            }
        ]);
        
        // Проверяем связи
        verify($order->user)->notNull();
        verify($order->user->full_name)->equals('Тестовый Пользователь');
        
        verify($order->product)->notNull();
        verify($order->product->title)->equals('Тестовый товар');
        
        verify($order->status)->notNull();
        verify($order->status->title)->equals('Новый');
    }
}
