<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;

/** @var yii\web\View $this */
/** @var yii\base\DynamicModel $model */

$this->title = 'Оформление заказа';
?>
<style>
    h1 {
        font-family: 'Impact', sans-serif; /* Устанавливаем шрифт Impact для заголовка */
        color: white; /* Цвет заголовка */
        text-align: center; /* Центрирование заголовка */
        margin-top: 1rem; /* Отступ сверху */
    }
    body {
        font-family: 'Helvetica', sans-serif; /* Устанавливаем шрифт Helvetica для всего тела страницы */
    }
</style>

<h1><?= Html::encode($this->title) ?></h1>

<div class="order-checkout">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'contact_number')->widget(MaskedInput::class, [
        'mask' => '+7(999)-999-99-99',
        'options' => [
            'placeholder' => 'Введите номер телефона',
            'maxlength' => true,
        ],
    ])->label('Номер телефона') ?>

    <div class="form-group" style="margin-top: 0.3rem;">
        <?= Html::submitButton('Подтвердить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>

<?php if (Yii::$app->session->hasFlash('success')): ?>
    <div class="alert alert-success">
        <?= Yii::$app->session->getFlash('success') ?>
    </div>
<?php endif; ?>
