<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Product $model */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Каталог товаров', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-view" style="padding: 20px; background-color: #f8f9fa; border-radius: 0; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);">

    <div class="product-images" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 10px;">
        <?php if ($model->photos): ?>
            <?php foreach ($model->photos as $photo): ?>
                <?= Html::img('@web/uploads/' . $photo->file_name, [
                    'alt' => $model->title,
                    'class' => 'img-fluid',
                    'style' => 'border: 1px solid #ddd; border-radius: 10px; width: 100%; height: auto;'
                ]) ?>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Нет изображений</p>
        <?php endif; ?>
    </div>

    <div style="padding: 20px; background-color: #fff; border-radius: 0; box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1); margin-top: 20px;">
        <h2 style="color: #333; font-size: 2.5em;"><?= Html::encode($this->title) ?></h2>
        <p style="font-size: 1.5em; color: #555;"><?= Html::encode($model->item_name) ?></p>
        <p style="color: #777; font-size: 1.2em;"><?= Html::encode($model->description) ?></p>
        <p style="font-size: 2em; color: #28a745; font-weight: bold;"><?= Html::encode($model->cost) ?> руб.</p>
        <p style="color: #555; font-size: 1.2em;">Размер: <?= Html::encode($model->size) ?></p>

        <p>
            <?= Html::a('Добавить в корзину', ['cart/add', 'id' => $model->id], ['class' => 'btn btn-primary btn-lg']) ?>
            <?= Html::a('Назад', ['index'], ['class' => 'btn btn-secondary btn-lg']) ?>
        </p>
    </div>

</div> 