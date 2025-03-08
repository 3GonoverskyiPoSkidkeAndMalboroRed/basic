<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Product $model */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Каталог товаров', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-view" style="display: flex; width: 100%; padding: 10px;overflow: hidden;">

    <div class="product-images" style="flex: 1; margin-right: 20px;">
        <?php if ($model->photos): ?>
            <?php foreach ($model->photos as $photo): ?>
                <?= Html::img('@web/uploads/' . $photo->file_name, ['alt' => $model->title, 'class' => 'img-thumbnail', 'style' => 'border: 1px solid white;width: 100%; margin-bottom: 10px;']) ?>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Нет изображений</p>
        <?php endif; ?>
    </div>

    <div style="flex: 2;">
        <h2><?= Html::encode($this->title) ?></h2>
        <p><?= Html::encode($model->item_name) ?></p>
        <p><?= Html::encode($model->description) ?></p>
        <p><?= Html::encode($model->cost) ?> руб.</p>
        <p><?= Html::encode($model->size) ?></p>

        <p>
            <?= Html::a('Добавить в корзину', ['cart/add', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Назад', ['index'], ['class' => 'btn btn-success']) ?>
        </p>
    </div>

</div> 