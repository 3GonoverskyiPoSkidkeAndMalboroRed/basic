<?php

use yii\helpers\Html;
use yii\helpers\Url;

/** @var app\models\Product $model */

?>
<div class="item" style="width: 319.25px; height: 444.22px; margin-bottom: 20px; border: 1px solid #ccc;">
    <a href="<?= Url::to(['view', 'id' => $model->id]) ?>" style="text-decoration: none; color: inherit; height: 100%;">
        <div class="product-image" style="height: 70%;">
            <?php if ($model->photos): ?>
                <?= Html::img('@web/uploads/' . $model->photos[0]->file_name, ['alt' => $model->title, 'class' => 'img-thumbnail', 'style' => 'border: 1px solid white; border-radius: 0; width: 100%; height: 100%; object-fit: cover;']) ?>
            <?php endif; ?>
        </div>
        <div style="padding: 10px; height: 30%;">
            <h3 style="margin: 10px 0; color: black;"><?= Html::encode($model->title) ?></h3>
            <p style="margin: 5px 0; color: black;">Цена: <?= Html::encode($model->cost) ?> руб.</p>
        </div>
    </a>
</div> 