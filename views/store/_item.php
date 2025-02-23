<?php

use yii\helpers\Html;
use yii\helpers\Url;

/** @var app\models\Product $model */

?>
<div class="item" style="width: 319.5px; border: 1px solid #ccc; padding: 10px; border-radius: 5px; overflow: hidden;">
    <a href="<?= Url::to(['view', 'id' => $model->id]) ?>" style="text-decoration: none; color: inherit;">
        <?php if ($model->photos): ?>
            <div class="product-image">
                <?= Html::img('@web/uploads/' . $model->photos[0]->file_name, ['alt' => $model->title, 'class' => 'img-thumbnail', 'style' => 'border: 1px solid #ccc; border-radius: 0; width: 100%; height: auto;']) ?>
            </div>
        <?php endif; ?>
        <h3><?= Html::encode($model->title) ?></h3>
        <p>Цена: <?= Html::encode($model->cost) ?> руб.</p>
    </a>
</div> 