<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Order[] $orders */

$this->title = 'Мои заказы';
?>
<h1><?= Html::encode($this->title) ?></h1>

<table class="table">
    <thead>
        <tr>
            <th>Фото</th>
            <th>Название товара</th>
            <th>Статус</th>
            <th>Дата создания</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($orders as $order): ?>
            <tr>
                <td>
                    <?php if ($order->product && $order->product->photos): ?>
                        <?= Html::img('@web/uploads/' . $order->product->photos[0]->file_name, ['alt' => $order->product->title, 'style' => 'width: 100px;']) ?>
                    <?php else: ?>
                        <p>Нет изображения</p>
                    <?php endif; ?>
                </td>
                <td><?= Html::encode($order->product->title) ?></td>
                <td><?= Html::encode($order->status_id) ?></td>
                <td><?= Html::encode($order->created_at) ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table> 