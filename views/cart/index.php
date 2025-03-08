<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var array $cart */
/** @var app\models\Product[] $products */


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
                        <div style="display: flex; align-items: center;">
                            <?php if ($product->photos): ?>
                                <?= Html::img('@web/uploads/' . $product->photos[0]->file_name, [
                                    'alt' => $product->title,
                                    'style' => 'width: 20%; height: auto; margin-right: 10px;'
                                ]) ?>
                            <?php endif; ?>
                            <div>
                                <p style="margin: 0;">
                                    <?= Html::encode($product->title) ?> - <?= Html::encode($product->item_name) ?>
                                </p>
                                <p>Цена: <?= Html::encode($product->cost) ?>$</p>
                                <?= Html::a('Удалить', ['remove', 'id' => $product->id], ['class' => 'btn btn-danger']) ?>
                            </div>
                        </div>

                           

                    </div>
                    <?php $subtotal += $product->cost * $cart[$product->id]; ?>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>

        <div class="cart-summary" style="margin-top: 20px;">
            <h3>К оплате - <?= $subtotal ?>$</h3>
        </div>

        <div class="payment" style="margin-top: 20px;">
            <h2 style="color: red;">
                <?php if (Yii::$app->user->isGuest): ?>
                    <span>Чтобы оформить заказ, вам нужно <a href="<?= \yii\helpers\Url::to(['site/login']) ?>">войти</a>.</span>
                <?php else: ?>
                    <?= Html::a('Оформить заказ', ['cart/checkout'], ['class' => 'btn btn-success']) ?>
                <?php endif; ?>
            </h2>
        </div>
    <?php endif; ?>
</div> 