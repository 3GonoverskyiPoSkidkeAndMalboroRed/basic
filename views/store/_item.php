<?php

use yii\helpers\Html;
use yii\helpers\Url;

/** @var app\models\Product $model */

?>
<div class="item" style="width: 100%; margin-bottom: 20px; border: 1px solid #ccc; padding: 10px; border-radius: 0;">
    <a href="<?= Url::to(['view', 'id' => $model->id]) ?>" style="text-decoration: none; color: inherit;">
        <div class="product-image" style="height: 400px; overflow: hidden;">
            <?php if ($model->photos): ?>
                <?= Html::img('@web/uploads/' . $model->photos[0]->file_name, [
                    'alt' => $model->title,
                    'class' => 'img-thumbnail',
                    'style' => 'width: 100%; height: 100%; object-fit: cover;'
                ]) ?>
            <?php endif; ?>
        </div>
        <div style="padding: 7px">
            <h5 style="margin: 10px 0; color: black;"><?= Html::encode($model->title) ?></h5>
            <p><?= Html::encode($model->item_name) ?></p>
            <p style="margin: 5px 0; color: black;"><?= Html::encode($model->cost) ?> руб.</p>
        </div>
    </a>
</div>
