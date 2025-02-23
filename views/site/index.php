<?php

/** @var yii\web\View $this */

use yii\bootstrap5\Html;
use app\models\Product;

// Получаем все товары из базы данных
$products = Product::find()->with('photos')->all();
?>

<div class="site-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <?php foreach ($products as $index => $product): ?>
                <?php if ($product->photos): ?>
                    <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                        <a href="<?= \yii\helpers\Url::to(['store/view', 'id' => $product->id]) ?>">
                            <img src="<?= Yii::getAlias('@web/uploads/' . $product->photos[0]->file_name) ?>" class="d-block w-100" alt="<?= Html::encode($product->title) ?>">
                        </a>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
        <button class="carousel-control-prev btn btn-danger" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next btn btn-danger" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

</div>

