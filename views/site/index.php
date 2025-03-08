<?php

/** @var yii\web\View $this */

use yii\bootstrap5\Html;
use app\models\Product;
use app\models\News;

// Получаем товары из базы данных
$newProducts = Product::find()->with('photos')->limit(3)->all(); // Получаем только 3 товара с фотографиями
?>

<div class="container-fluid" style="padding: 0;">
    <h1><?= Html::encode($this->title) ?></h1>

    <h2>Новые поступления</h2>
    <div class="row">
        <?php foreach ($newProducts as $product): ?>
            <div class="col-md-4">
                <div class="product-item" style="margin-bottom: 20px; border: 1px solid black; border-radius: 0;">
                    <a href="<?= \yii\helpers\Url::to(['store/view', 'id' => $product->id]) ?>" style="text-decoration: none; color: inherit;">
                        <div class="product-image" style="height: 100%; overflow: hidden; border: none;">
                            <?php if ($product->photos): ?>
                                <?= Html::img('@web/uploads/' . $product->photos[0]->file_name, [
                                    'alt' => $product->title,
                                    'class' => 'img-thumbnail',
                                    'style' => 'width: 100%; height: 100%; object-fit: cover; border: none;'
                                ]) ?>
                            <?php endif; ?>
                        </div>
                        <div style="padding: 7px; border-top: 1px solid black;">
                            <h5 style="margin: 10px 0; color: black;"><?= Html::encode($product->title) ?></h5>
                            <p><?= Html::encode($product->item_name) ?></p>
                        </div>
                    </a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <h2 style="margin-top: 150px;">Новости</h2>
    <div class="row">
        <?php $news = News::find()->limit(3)->all(); ?>
        <?php foreach ($news as $item): ?>
            <div class="col-md-4">
                <div class="news-item" style="margin-bottom: 20px; border: 1px solid black; border-radius: 0;">
                    <h5><?= Html::encode($item->title) ?></h5>
                    <p><?= Html::encode($item->content) ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

