<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var array $cart */
/** @var app\models\Product[] $products */

$this->title = 'Корзина';
?>
<div class="cart-index" style="background-color: #000; color: #fff; padding: 20px;">
    <h1><?= Html::encode($this->title) ?></h1>
    
    <?php if (empty($cart)): ?>
        <p>Ваша корзина пуста.</p>
    <?php else: ?>
        <div class="cart-items">
            <?php $subtotal = 0; ?>
            <?php foreach ($products as $product): ?>
                <?php if (isset($cart[$product->id])): ?>
                    <div class="cart-item" style="display: flex; justify-content: space-between; margin-bottom: 20px;">
                        <div>
                            <p>Название: <?= Html::encode($product->title) ?></p>
                            <p>Количество: <?= Html::encode($cart[$product->id]) ?></p>
                            <p>Цена: <?= Html::encode($product->cost) ?>$</p>
                        </div>
                        <div>
                            <?= Html::a('Удалить', ['remove', 'id' => $product->id], ['class' => 'btn btn-danger']) ?>
                        </div>
                    </div>
                    <?php $subtotal += $product->cost * $cart[$product->id]; ?>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>

        <div class="cart-summary" style="margin-top: 20px;">
            <h3>SUBTOTAL - <?= $subtotal ?>$</h3>
            <h3>TOTAL - <?= $subtotal ?>$</h3>
        </div>

        <div class="payment" style="margin-top: 20px;">
            <h2 style="color: red;">
                <?php if (Yii::$app->user->isGuest): ?>
                    <span>Чтобы оформить заказ, вам нужно <a href="<?= \yii\helpers\Url::to(['site/login']) ?>">войти</a>.</span>
                <?php else: ?>
                    <?= Html::a('Оформить заказ', ['order/checkout'], ['class' => 'btn btn-success']) ?>
                <?php endif; ?>
            </h2>
        </div>
    <?php endif; ?>
</div> 