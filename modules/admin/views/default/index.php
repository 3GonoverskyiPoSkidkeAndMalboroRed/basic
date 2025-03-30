<?php

use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = 'Панель администратора';
?>
<h1><?= Html::encode($this->title) ?></h1>
<p>Добро пожаловать в панель администратора!</p>

<div class="dashboard">
    <div class="row">
        <div class="col-md-4">
            <?= Html::a('Управление товарами', ['/admin/product/index'], ['class' => 'btn btn-info btn-block']) ?>
        </div>
        <div class="col-md-4">
            <?= Html::a('Перейти к заказам', ['/admin/order/index'], ['class' => 'btn btn-primary btn-block']) ?>
        </div>
        <div class="col-md-4">
            <?= Html::a('Управление новостями', ['/news/index'], ['class' => 'btn btn-success btn-block']) ?>
        </div>
        <div class="col-md-4">
            <?= Html::a('Управление категориями', ['/admin/category/index'], ['class' => 'btn btn-warning btn-block']) ?>
        </div>
    </div>
</div>

