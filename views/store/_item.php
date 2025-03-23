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
