<?php

use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = 'Панель администратора';
?>
<h1><?= Html::encode($this->title) ?></h1>
<p>Добро пожаловать в панель администратора!</p>

<p>
    <?= Html::a('Перейти к заказам', ['/admin/order/index'], ['class' => 'btn btn-primary']) ?>
    <?= Html::a('Создать товар', ['/admin/product/create'], ['class' => 'btn btn-success']) ?>
    <?= Html::a('Список товаров', ['/admin/product/index'], ['class' => 'btn btn-info']) ?>

</p>

