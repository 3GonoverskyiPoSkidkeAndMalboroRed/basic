<?php

use yii\helpers\Html;
use yii\helpers\Url;
use app\models\Product;

/** @var app\models\Product $model */

?>
<div class="catalog-item">
    <a href="<?= Url::to(['view', 'id' => $model->id]) ?>" class="catalog-link">
        <div class="catalog-image-container">
            <?php if ($model->photos): ?>
                <?= Html::img('@web/uploads/' . $model->photos[0]->file_name, [
                    'alt' => $model->title,
                    'class' => 'catalog-image'
                ]) ?>
            <?php else: ?>
                <div class="catalog-no-image">
                    <p>Нет изображения</p>
                </div>
            <?php endif; ?>
        </div>

        <div class="catalog-info">
            <h3 class="catalog-title">
                <?= Html::encode($model->title) ?>
            </h3>

            <div class="catalog-details">
                <div class="catalog-detail-row">
                    <span class="catalog-item-name">
                        <?= Html::encode($model->item_name) ?>
                    </span>
                </div>

                <div class="catalog-detail-row">
                    <span class="catalog-size">
                        <?= Html::encode(Product::$sizes[$model->size]) ?>
                    </span>
                </div>

                <div class="catalog-detail-row">
                    <span class="catalog-category">
                        <?= Html::encode($model->category->title) ?>
                    </span>
                </div>

                <div class="catalog-detail-row">
                    <span class="catalog-price">
                        <?= Html::encode($model->cost) ?> руб.
                    </span>
                </div>
            </div>
        </div>
    </a>
</div>

<style>
.item:hover {
    transform: translateY(-5px);
    box-shadow: 0 5px 15px rgba(255, 255, 255, 0.1);
    border-color: rgb(160, 2, 2);
}

.item:hover img {
    transform: scale(1.05);
}

.item:hover .order-info h3 {
    color: rgb(160, 2, 2) !important;
}
</style>
