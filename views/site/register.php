<?php

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\RegisterForm $model */
/** @var ActiveForm $form */
?>
<style>
body {
    font-family: 'Helvetica', sans-serif; /* Устанавливаем шрифт Helvetica для всего тела страницы */
}

.site-register {
    max-width: 400px;
    margin: auto;
    padding: 20px;
    border-radius: 5px;
}

.site-register h3 {
    text-align: center;
    margin-bottom: 20px;
    font-family: 'Impact', sans-serif; /* Устанавливаем шрифт Impact для заголовка */
}

.site-register .form-group {
    margin-bottom: 15px;
}

.site-register .btn {
    width: 100%;
}
</style>

<div class="site-register">

    <h3>Регистрация</h3>

    <p class="text-center">
        <?= Html::a('Вход, если уже есть аккаунт', ['/site/login'], ['class' => 'link-primary']) ?>
    </p>

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'login')->textInput(['autofocus' => true]) ?>
        <?= $form->field($model, 'password')->passwordInput() ?>
        <?= $form->field($model, 'full_name') ?>
        <?= $form->field($model, 'phone')->widget(\yii\widgets\MaskedInput::class, [
            'mask' => '+7(999)-999-99-99',]) ?>
        <?= $form->field($model, 'email') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Регистрация', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div>
