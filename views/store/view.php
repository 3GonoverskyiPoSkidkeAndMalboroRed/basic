<?php

use yii\helpers\Html;
use app\models\Product;

/** @var yii\web\View $this */
/** @var app\models\Product $model */

$this->title = $model->title;
?>
<div class="product-view">
    <div class="row">
        <div class="col-md-12">
            <div class="product-images">
                <?php if ($model->photos): ?>
                    <?php foreach ($model->photos as $photo): ?>
                        <?= Html::img('@web/uploads/' . $photo->file_name, [
                            'alt' => $model->title,
                            'class' => 'img-fluid',
                        ]) ?>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>Нет изображений</p>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-md-6">
            <h2 class="product-title"><?= Html::encode($this->title) ?></h2>
            <p class="product-item-name"><?= Html::encode($model->item_name) ?></p>
            <p class="product-description"><?= Html::encode($model->description) ?></p>
            <p class="product-size">Размер: <?= Html::encode(Product::$sizes[$model->size]) ?></p>
            <p class="product-category">Категория: <?= Html::encode($model->category->title) ?></p>
            <p class="product-cost"><?= Html::encode($model->cost) ?> руб.</p>

            <p>
                <?= Html::a('Добавить в корзину', ['cart/add', 'id' => $model->id], ['class' => 'btn btn-minimalist btn-lg']) ?>
                <?= Html::a('Назад', ['index'], ['class' => 'btn btn-minimalist btn-lg']) ?>
            </p>
        </div>
    </div>
</div> 