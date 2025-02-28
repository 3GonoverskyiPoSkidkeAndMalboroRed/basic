<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

?>
<div class="container">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
        <?= ListView::widget([
            'dataProvider' => $dataProvider,
            'itemView' => '_item', // представление для каждого товара
            'options' => ['tag' => false], // убираем обертку
            'layout' => "{items}", // убираем количество записей
            'itemOptions' => [
                'class' => 'col' // добавляем класс для колонки
            ],
        ]); ?>
    </div>
</div> 