<?php

use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = 'Панель администратора';
?>
<h1><?= Html::encode($this->title) ?></h1>

<div class="dashboard">
    <div class="row">
        <div class="col-md-4 mb-3">
            <?= Html::a('Управление товарами', ['/admin/product/index'], ['class' => 'btn btn-info btn-block h-100']) ?>
        </div>
        <div class="col-md-4 mb-3">
            <?= Html::a('Перейти к заказам', ['/admin/order/index'], ['class' => 'btn btn-primary btn-block h-100']) ?>
        </div>
        <div class="col-md-4 mb-3">
            <?= Html::a('Управление новостями', ['/news/index'], ['class' => 'btn btn-success btn-block h-100']) ?>
        </div>
        <div class="col-md-4 mb-3">
            <?= Html::a('Управление категориями', ['/admin/category/index'], ['class' => 'btn btn-warning btn-block h-100']) ?>
        </div>
        <div class="col-md-4 mb-3">
            <?= Html::a('Обратная связь', ['/admin/feedback/index'], ['class' => 'btn btn-warning btn-block h-100']) ?>
        </div>
    </div>
</div>

