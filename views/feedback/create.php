<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Feedback $model */

$this->title = 'Обратная связь';
$this->params['breadcrumbs'][] = $this->title;

// Получаем данные пользователя
$user = Yii::$app->user->identity;
?>
<h1><?= Html::encode($this->title) ?></h1>

<div class="feedback-create">
    <p>Если у вас есть вопросы или предложения, пожалуйста, заполните форму ниже:</p>
    
    <div class="user-info">
        <p>
            <strong>Имя:</strong> <?= Html::encode($user->full_name) ?><br>
            <strong>Email:</strong> <?= Html::encode($user->email) ?>
        </p>
    </div>

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'message')->textarea(['rows' => 6])->label('Сообщение') ?>
    
    <?= $form->field($model, 'imageFile')->fileInput()->label('Прикрепить изображение (опционально)') ?>

    <div class="form-group">
        <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
