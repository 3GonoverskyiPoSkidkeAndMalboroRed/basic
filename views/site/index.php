<?php

/** @var yii\web\View $this */

use yii\helpers\Html;
use app\models\Product;
use app\models\News;

// Получаем товары из базы данных
$newProducts = Product::find()->with('photos')->limit(3)->all(); // Получаем только 3 товара с фотографиями

?>

<h1><?= Html::encode($this->title) ?></h1>

<div class="new-arrivals">
    <h2 class="new-arrivals-title">НОВЫЕ ПОСТУПЛЕНИЯ</h2>
    <div class="row">
        <?php foreach ($newProducts as $product): ?>
            <div class="col-md-4 mb-4">
                <div class="product-item new-arrival-item">
                    <a href="<?= \yii\helpers\Url::to(['store/view', 'id' => $product->id]) ?>" class="catalog-link">
                        <div class="product-image">
                            <?php if ($product->photos): ?>
                                <?= Html::img('@web/uploads/' . $product->photos[0]->file_name, [
                                    'alt' => $product->title,
                                    'class' => 'img-fluid',
                                ]) ?>
                            <?php else: ?>
                                <div class="catalog-no-image">
                                    <p>Нет изображения</p>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div style="padding: 7px;">
                            <h5 class="product-title"><?= Html::encode($product->title) ?></h5>
                            <p class="product-item-name"><?= Html::encode($product->item_name) ?></p>
                        </div>
                    </a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<h2 class="news-container">Новости</h2>
<div class="row">
    <?php $newsItems = News::find()->limit(3)->all(); // Получаем последние 3 новости ?>
    <?php foreach ($newsItems as $news): ?>
        <div class="col-md-4 mb-4">
            <div class="news-item">
                <h5 class="news-title"><?= Html::encode($news->title) ?></h5>
                <p class="news-content"><?= Html::encode($news->content) ?></p>
            </div>
        </div>
    <?php endforeach; ?>
</div>

</div>

