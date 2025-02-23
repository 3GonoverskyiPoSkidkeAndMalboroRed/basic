<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Product $model */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Каталог товаров', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-view" style="border: 1px solid #ccc; width: 300px; padding: 10px; border-radius: 5px; overflow: hidden;">

    <?php if ($model->photos): ?>
        <div class="product-image">
            <?= Html::img('@web/uploads/' . $model->photos[0]->file_name, ['alt' => $model->title, 'class' => 'img-thumbnail', 'style' => 'border: 1px solid #ccc; border-radius: 0; width: 100%; height: auto;']) ?>
        </div>
    <?php endif; ?>
    <h2><?= Html::encode($this->title) ?></h2>
    <p>Цена: <?= Html::encode($model->cost) ?> руб.</p>
    <p>Количество: <?= Html::encode($model->count) ?></p>
    <p>Категория: <?= Html::encode($model->category->title) ?></p>

    <p><?= Html::a('Назад', ['index'], ['class' => 'btn btn-success']) ?></p>

</div> 