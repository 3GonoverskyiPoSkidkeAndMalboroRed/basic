<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Feedback $model */

$this->title = 'Обратная связь';

// Получаем данные пользователя
$user = Yii::$app->user->identity;
?>
<style>
    .feedback-create {
        max-width: 600px; /* Максимальная ширина формы */
        margin: auto; /* Центрирование формы */
        padding: 20px; /* Отступы внутри формы */
    }

    .feedback-create h1 {
        text-align: center; /* Центрирование заголовка */
        font-family: 'Impact', sans-serif; /* Шрифт заголовка */
    }

    .feedback-create p {
        font-size: 16px; /* Размер шрифта для текста */
    }

    .feedback-form .form-group {
        margin-bottom: 15px; /* Отступы между полями формы */
    }

    .btn-success {
        background-color: #28a745; /* Цвет кнопки отправки */
        border-color: #28a745; /* Цвет рамки кнопки */
    }

    body {
        font-family: Helvetica;
    }
    .btn-success:hover {
        background-color: #218838; /* Цвет кнопки при наведении */
        border-color: #1e7e34; /* Цвет рамки кнопки при наведении */
    }

    /* Адаптивные стили */
    @media (max-width: 768px) {
        .feedback-create {
            padding: 10px; /* Уменьшаем отступы на мобильных устройствах */
        }
        .feedback-create h1 {
            font-size: 24px; /* Уменьшаем размер заголовка */
        }
        .feedback-create p {
            font-size: 14px; /* Уменьшаем размер текста */
        }
    }
</style>

<h1 style="font-family: 'Impact', sans-serif; margin-top: 0.5em;"><?= Html::encode($this->title) ?></h1>

<div class="feedback-create">
   
    
    <div class="user-info">
        <p>
            <strong>Имя:</strong> <?= Html::encode($user->full_name) ?><br>
            <strong>Email:</strong> <?= Html::encode($user->email) ?>
        </p>
    </div>

    <div class="feedback-form">
        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
        
        <?= $form->field($model, 'message')->textarea(['rows' => 6, 'placeholder' => 'Введите ваше сообщение здесь...']) ?>

        
        <div class="form-group">
            <?= Html::submitButton('Отправить', ['class' => 'btn btn-success', 'style' => 'font-family: Helvetica']) ?>
        </div>
        
        <?php ActiveForm::end(); ?>
    </div>
</div>
