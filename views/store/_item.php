<?php

use yii\helpers\Html;
use yii\helpers\Url;
use app\models\Product;

/** @var app\models\Product $model */

?>
<div class="item" style="background-color: #111; border: 1px solid #333; padding: 15px; border-radius: 10px; transition: all 0.3s ease;">
    <a href="<?= Url::to(['view', 'id' => $model->id]) ?>" style="text-decoration: none; color: inherit;">
        <div class="order-image" style="margin-bottom: 15px; overflow: hidden; border-radius: 5px;">
            <?php if ($model->photos): ?>
                <?= Html::img('@web/uploads/' . $model->photos[0]->file_name, [
                    'alt' => $model->title,
                    'style' => 'width: 100%; height: auto; border-radius: 5px; transition: transform 0.3s ease;'
                ]) ?>
            <?php else: ?>
                <div style="width: 100%; height: 200px; background-color: #222; display: flex; align-items: center; justify-content: center; border-radius: 5px;">
                    <p style="color: #666; margin: 0;">Нет изображения</p>
                </div>
            <?php endif; ?>
        </div>

        <div class="order-info">
            <h3 style="color: white; font-family: Impact; margin: 0 0 10px 0;">
                <?= Html::encode($model->title) ?>
            </h3>

            <div class="order-details" style="display: grid; gap: 5px;">
                <div style="display: flex; justify-content: space-between;">

                    <span style="color: white; font-family: Impact;">
                        <?= Html::encode($model->item_name) ?>
                    </span>
                </div>

                <div style="display: flex; justify-content: space-between;">
             <span style="color: white; font-family: Impact;">
                        <?= Html::encode(Product::$sizes[$model->size]) ?>
                    </span>
                </div>

                <div style="display: flex; justify-content: space-between;">

                    <span style="color: white; font-family: Impact;">
                        <?= Html::encode($model->category->title) ?>
                    </span>
                </div>

                <div style="display: flex; justify-content: space-between;">

                    <span style="color: rgb(160, 2, 2); font-family: Impact; font-size: 1.2em;">
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
