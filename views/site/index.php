<?php

/** @var yii\web\View $this */

use yii\bootstrap5\Html;
use app\models\Product;

// Получаем товары из базы данных
$newProducts = Product::find()->with('photos')->limit(3)->all(); // Получаем только 3 товара с фотографиями
?>

<div class="site-index">
    <h1><?= Html::encode($this->title) ?></h1>

    <h2>Новые поступления</h2>
    <div class="row">
        <?php foreach ($newProducts as $product): ?>
            <div class="col-md-4">
                <div class="product-item" style="margin-bottom: 20px; border: 1px solid black;">
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
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="web\img\10ft-12ft-14ft-super-slide-e1636564224748.jpg" class="d-block w-100" alt="First slide">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Первый слайд</h5>
                    <p>Некоторый контент для первого слайда.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="web\img\10ft-12ft-14ft-super-slide-e1636564224748.jpg" class="d-block w-100" alt="Second slide">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Второй слайд</h5>
                    <p>Некоторый контент для второго слайда.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="web\img\10ft-12ft-14ft-super-slide-e1636564224748.jpg" class="d-block w-100" alt="Third slide">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Третий слайд</h5>
                    <p>Некоторый контент для третьего слайда.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>

