<?php

use yii\helpers\Html;
use app\models\Product;

/** @var yii\web\View $this */
/** @var app\models\Product $model */

$this->title = $model->title;
?>
<div class="product-view" style="background-color: #000; color: #fff;">
    <div class="row">
        <div class="col-md-12">
            <div class="product-images" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 0;">
                <?php if ($model->photos): ?>
                    <?php foreach ($model->photos as $photo): ?>
                        <?= Html::img('@web/uploads/' . $photo->file_name, [
                            'alt' => $model->title,
                            'class' => 'img-fluid',
                            'style' => 'width: 100%; height: auto; margin-bottom: 10px;'
                        ]) ?>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>Нет изображений</p>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-md-6 ">
            <h2 style="color: white; font-size: 2.5em;"><?= Html::encode($this->title) ?></h2>
            <p style="color: white; font-size: 1.5em; margin-top: 10px;"><?= Html::encode($model->item_name) ?></p>
            <p style="color: white; font-size: 1.2em; margin-top: 10px;"><?= Html::encode($model->description) ?></p>
            
            <p style="color: white; font-size: 1.2em; margin-top: 10px;">Размер: <?= Html::encode(Product::$sizes[$model->size]) ?></p>
            <p style="color: white; font-size: 1.2em; margin-top: 10px;">Категория: <?= Html::encode($model->category->title) ?></p>
            <p style="font-size: 2em; color:rgb(160, 2, 2); font-weight: bold; margin-top: 10px;"><?= Html::encode($model->cost) ?> руб.</p>

            <p>
                <?= Html::a('Добавить в корзину', ['cart/add', 'id' => $model->id], ['class' => 'btn btn-primary btn-lg']) ?>
                <?= Html::a('Назад', ['index'], ['class' => 'btn btn-secondary btn-lg']) ?>
            </p>
        </div>
    </div>
</div> 