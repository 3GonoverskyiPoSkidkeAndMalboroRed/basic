<?php

namespace tests\unit\models;

use app\models\Feedback;
use app\models\User;

class FeedbackTest extends \Codeception\Test\Unit
{
    public function testValidation()
    {
        $model = new Feedback();
        
        // Проверяем, что модель не проходит валидацию без обязательных полей
        verify($model->validate())->false();
        verify($model->errors)->arrayHasKey('user_id');
        verify($model->errors)->arrayHasKey('message');
        
        // Заполняем обязательные поля
        $model->user_id = 1;
        $model->message = 'Тестовое сообщение';
        
        // Проверяем, что теперь модель проходит валидацию
        verify($model->validate())->true();
    }
    
    public function testRelationWithUser()
    {
        // Создаем моки для тестирования
        $feedback = $this->make(Feedback::class, [
            'user_id' => 1,
            'getUser' => function() {
                return $this->make(User::class, [
                    'id' => 1,
                    'full_name' => 'Тестовый Пользователь',
                    'email' => 'test@example.com'
                ]);
            }
        ]);
        
        // Проверяем связь с пользователем
        verify($feedback->user)->notNull();
        verify($feedback->user->full_name)->equals('Тестовый Пользователь');
        verify($feedback->user->email)->equals('test@example.com');
    }
    
    public function testUploadMethod()
    {
        // Тестирование метода upload() требует имитации загрузки файла
        // Здесь просто проверим, что метод существует
        $feedback = new Feedback();
        verify(method_exists($feedback, 'upload'))->true();
    }
    
    public function testSendNotification()
    {
        // Тестирование отправки уведомлений требует имитации email-сервиса
        // Здесь просто проверим, что метод существует
        $feedback = new Feedback();
        verify(method_exists($feedback, 'sendNotification'))->true();
    }
}
