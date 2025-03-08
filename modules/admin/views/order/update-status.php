<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Order $order */

$this->title = 'Изменение статуса заказа';
?>
<h1><?= Html::encode($this->title) ?></h1>

<div class="order-update-status">
    <p>Заказ ID: <?= Html::encode($order->id) ?></p>
    <p>Текущий статус: <?= Html::encode($order->status->title) ?></p>

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($order, 'status_id')->dropDownList([
        1 => 'Новый заказ',
        2 => 'В обработке',
        3 => 'Завершен',
        // Добавьте другие статусы по мере необходимости
    ], ['prompt' => 'Выберите статус']) ?>
    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div> 