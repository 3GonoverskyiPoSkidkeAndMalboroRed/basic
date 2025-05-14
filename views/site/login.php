<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */

/** @var app\models\LoginForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = 'Вход';
?>
<style>
body {
    font-family: 'Helvetica', sans-serif; /* Устанавливаем шрифт Helvetica для всего тела страницы */
}

.site-login {
    max-width: 400px;
    margin: auto;
    padding: 20px;
    border-radius: 5px;
}

.site-login h3 {
    text-align: center;
    margin-bottom: 20px;
    font-family: 'Impact', sans-serif; /* Устанавливаем шрифт Impact для заголовка */
}

.site-login .form-group {
    margin-bottom: 15px;
}

.site-login .btn {
    width: 100%;
}
</style>

<div class="site-login">
    <h3><?= Html::encode($this->title) ?></h3>

    <p class="text-center">
        <?= Html::a('Регистрация, если у вас нет аккаунта', ['/site/register'], ['class' => 'link-primary']) ?>
    </p>

    <div class="row justify-content-center">
        <div >
            <?php $form = ActiveForm::begin([
                'id' => 'login-form',
                'fieldConfig' => [
                    'template' => "{label}\n{input}\n{error}",
                    'labelOptions' => ['class' => 'col-form-label'],
                    'inputOptions' => ['class' => 'form-control'],
                    'errorOptions' => ['class' => 'invalid-feedback'],
                ],
            ]); ?>

            <?= $form->field($model, 'login')->textInput(['autofocus' => true]) ?>

            <?= $form->field($model, 'password')->passwordInput() ?>



            <div class="form-group">
                <div>
                    <?= Html::submitButton('Вход', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>
            </div>

            <?php ActiveForm::end(); ?>

            <div style="color:#999;">
                В системе зарегистрирован пользователь <strong>adminka/password</strong> и <strong>user/123123</strong>.
            </div>

        </div>
    </div>
</div>
