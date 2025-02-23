<?php

use yii\helpers\Html;

/** @var app\models\Product $model */

?>
<div class="item">
    <h3><?= Html::encode($model->title) ?></h3>
    <p>Цена: <?= Html::encode($model->cost) ?> руб.</p>
    
    <?php if ($model->photos): ?>
        <div class="product-image">
            <?= Html::img('@web/uploads/' . $model->photos[0]->file_name, ['alt' => $model->title, 'class' => 'img-thumbnail', 'width' => '319.5', 'height' => '319.5']) ?>
        </div>
    <?php endif; ?>
    
    <p><?= Html::a('Просмотреть', ['view', 'id' => $model->id], ['class' => 'btn btn-primary']) ?></p>
</div> 