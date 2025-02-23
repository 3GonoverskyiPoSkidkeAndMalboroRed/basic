<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Product $model */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Каталог товаров', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php if ($model->photos): ?>
        <div class="product-image">
            <?= Html::img('@web/uploads/' . $model->photos[0]->file_name, ['alt' => $model->title, 'class' => 'img-thumbnail', 'width' => '300', 'height' => '300']) ?>
        </div>
    <?php endif; ?>

    <p>Цена: <?= Html::encode($model->cost) ?> руб.</p>
    <p>Количество: <?= Html::encode($model->count) ?></p>
    <p>Категория: <?= Html::encode($model->category->title) ?></p>

    <p><?= Html::a('Назад', ['index'], ['class' => 'btn btn-success']) ?></p>

</div> 