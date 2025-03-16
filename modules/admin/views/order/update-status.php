<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $order app\models\Order */

$this->title = 'Изменить статус заказа: ' . $order->id;
$this->params['breadcrumbs'][] = ['label' => 'Заказы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<h1><?= Html::encode($this->title) ?></h1>

<div class="order-update-status">

    <p>Выберите новый статус для заказа <?= Html::encode($order->id) ?>:</p>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($order, 'status_id')->dropDownList([
        1 => 'Новый заказ',
        2 => 'В обработке',
        3 => 'Завершен',
        // Добавьте другие статусы по мере необходимости
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
        <?= Html::a('Отмена', ['index'], ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div> 