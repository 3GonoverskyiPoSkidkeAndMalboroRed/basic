<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Order[] $orders */

$this->title = 'Мои заказы';
?>
<div style="background-color: black; padding: 20px;">
    <h1 style="color: white; font-family: Impact; margin-bottom: 30px;"><?= Html::encode($this->title) ?></h1>

    <div class="orders-container" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 20px;">
        <?php foreach ($orders as $order): ?>
            <div class="order-card" style="background-color: #111; border: 1px solid #333; padding: 15px; border-radius: 10px;">
                <div class="order-image" style="margin-bottom: 15px;">
                    <?php if ($order->product && $order->product->photos): ?>
                        <?= Html::img('@web/uploads/' . $order->product->photos[0]->file_name, [
                            'alt' => $order->product->title,
                            'style' => 'width: 100%; height: auto; border-radius: 5px;'
                        ]) ?>
                    <?php else: ?>
                        <div style="width: 100%; height: 200px; background-color: #222; display: flex; align-items: center; justify-content: center; border-radius: 5px;">
                            <p style="color: #666; margin: 0;">Нет изображения</p>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="order-info">
                    <h3 style="color: white; font-family: Impact; margin: 0 0 10px 0;">
                        <?= Html::encode($order->product->title) ?>
                    </h3>
                    <p style="color: white; font-family: Impact; margin: 0 0 10px 0;">
                        <?= Html::encode($order->product->item_name) ?>
                    </p>
                    <div class="order-details" style="display: grid; gap: 5px;">
                        <div style="display: flex; justify-content: space-between;">
                            <span style="color: #888;">Статус:</span>
                            <span style="color: white; font-family: Impact;">
                                <?= Html::encode($order->status->title) ?>
                            </span>
                        </div>

                        <div style="display: flex; justify-content: space-between;">
                            <span style="color: #888;">Дата заказа:</span>
                            <span style="color: white; font-family: Impact;">
                                <?= Html::encode(Yii::$app->formatter->asDate($order->created_at, 'php:d.m.Y')) ?>
                            </span>
                        </div>

                        <div style="display: flex; justify-content: space-between;">
                            <span style="color: #888;">Время заказа:</span>
                            <span style="color: white; font-family: Impact;">
                                <?= Html::encode(Yii::$app->formatter->asTime($order->created_at, 'php:H:i')) ?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div> 