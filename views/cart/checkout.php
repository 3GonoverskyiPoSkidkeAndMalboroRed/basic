<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var yii\base\DynamicModel $model */

$this->title = 'Оформление заказа';
?>
<h1><?= Html::encode($this->title) ?></h1>

<div class="order-checkout">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'contact_number')->textInput(['maxlength' => true, 'placeholder' => 'Введите номер телефона']) ?>

    <div class="form-group">
        <?= Html::submitButton('Подтвердить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>

<?php if (Yii::$app->session->hasFlash('success')): ?>
    <div class="alert alert-success">
        <?= Yii::$app->session->getFlash('success') ?>
    </div>
<?php endif; ?>
