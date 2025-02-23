<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Product $model */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Каталог товаров', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-view" style="display: flex; width: 100%; padding: 10px;overflow: hidden;">

    <?php if ($model->photos): ?>
        <div class="product-image" style="flex: 1; margin-right: 20px;">
            <?= Html::img('@web/uploads/' . $model->photos[0]->file_name, ['alt' => $model->title, 'class' => 'img-thumbnail', 'style' => 'width: 100%']) ?>
        </div>
    <?php endif; ?>

    <div style="flex: 2;">
        <h2><?= Html::encode($this->title) ?></h2>
        <p><?= Html::encode($model->item_name) ?></p>
        <p><?= Html::encode($model->description) ?></p>
        <p><?= Html::encode($model->cost) ?> руб.</p>
        <p><?= Html::encode($model->size) ?></p>

        <p><?= Html::a('Назад', ['index'], ['class' => 'btn btn-success']) ?></p>
    </div>

</div> 