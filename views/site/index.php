<?php

/** @var yii\web\View $this */

use yii\helpers\Html;
use app\models\Product;
use app\models\News;

// Получаем товары из базы данных
$newProducts = Product::find()->with('photos')->limit(3)->all(); // Получаем только 3 товара с фотографиями

?>

        <h1><?= Html::encode($this->title) ?></h1>
        <h2 style="text-align: center;">Новые поступления</h2>
        <div class="row">
            <?php foreach ($newProducts as $product): ?>
                <div class="col-md-4 mb-4">
                    <div class="product-item" style="margin-bottom: 20px;">
                        <a href="<?= \yii\helpers\Url::to(['store/view', 'id' => $product->id]) ?>" style="text-decoration: none; color: inherit;">
                            <div class="product-image" style="height: 100%; overflow: hidden;">
                                <?php if ($product->photos): ?>
                                    <?= Html::img('@web/uploads/' . $product->photos[0]->file_name, [
                                        'alt' => $product->title,
                                        'class' => 'img-fluid',
                                        'style' => 'width: 100%; height: auto; object-fit: cover; border-radius: 0;'
                                    ]) ?>
                                <?php endif; ?>
                            </div>
                            <div style="padding: 7px;">
                                <h5 style="margin: 10px 0; color: white;"><?= Html::encode($product->title) ?></h5>
                                <p style="color: white;"><?= Html::encode($product->item_name) ?></p>
                            </div>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <h2 style="text-align: center;">Новости</h2>
        <div class="row">
            <?php $newsItems = News::find()->limit(3)->all(); // Получаем последние 3 новости ?>
            <?php foreach ($newsItems as $news): ?>
                <div class="col-md-4 mb-4">
                    <div class="news-item" style="margin-bottom: 20px;">
                        <h5 style="color: white; text-align: center;"><?= Html::encode($news->title) ?></h5>
                        <p style="color: white; text-align: center;"><?= Html::encode($news->content) ?></p>
                        <?php if ($news->image_path): ?>
                            <?= Html::img('@web/uploads/' . $news->image_path, [
                                'alt' => $news->title,
                                'class' => 'img-fluid',
                                'style' => 'width: 100%; height: auto; object-fit: cover; border-radius: 0;'
                            ]) ?>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

</div>

