<?php

use yii\helpers\Html;
use app\models\Product;

/** @var yii\web\View $this */
/** @var app\models\Product $model */

$this->title = $model->title;
?>
<style>
.zoom {
  transition: transform 0.3s; /* Animation */
  margin: 0 auto;
}

.zoom:hover {
  transform: scale(1.5); /* (150% zoom) */
  margin-top: 2rem;
  margin-bottom: 7rem;
}

/* Отключаем эффект увеличения на мобильных устройствах */
@media (max-width: 768px) {
  .zoom:hover {
    transform: none; /* Убираем увеличение */
    margin-top: 0; /* Убираем отступы */
    margin-bottom: 0; /* Убираем отступы */
  }
}
</style>

<div class="product-view">
    <div class="row">
        <div class="col-md-12">
            <div class="product-images">
                <?php if ($model->photos): ?>
                    <?php foreach ($model->photos as $photo): ?>
                        <?= Html::img('@web/uploads/' . $photo->file_name, [
                            'alt' => $model->title,
                            'class' => 'img-fluid zoom',
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
                <?= Html::a(Html::img('@web/img/cart.svg', ['alt' => 'Добавить в корзину', 'class' => 'img-fluid', 'style' => 'filter: brightness(0) invert(1);']), ['cart/add', 'id' => $model->id], ['class' => 'btn btn-minimalist btn-lg']) ?>
            </p>
        </div>
    </div>
</div> 