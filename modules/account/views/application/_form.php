<?php

use app\models\PayType;
use app\models\Service;
use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Application $model */
/** @var yii\widgets\ActiveForm $form */

// Yii::debug(PayType::getPayTypes());

?>

<div class="application-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <div class='d-flex gap-4'>
        <?= $form->field($model, 'date')->textInput(['type' => 'date' ]) ?>
    
        <?= $form->field($model, 'time')->textInput(['type' => 'time' ]) ?>
    </div>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->widget(\yii\widgets\MaskedInput::class, [
    'mask' => '+7(999)-999-99-99',]) ?> 

    <?# $form->field($model, 'other')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'service_id')->dropDownList(Service::getServices() , ['prompt' => 'Выберете вариант услуги']) ?>

    <?= $form->field($model, 'pay_type_id')->dropDownList(PayType::getPayTypes(), ['prompt' => 'Выберете тип оплаты']) ?>

    <div class="form-group">
        <?= Html::submitButton('Создать', ['class' => 'btn btn-outline-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
