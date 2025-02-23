<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

?>
<div class="store-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(319.25px, 1fr)); gap: 45px;">
        <?= ListView::widget([
            'dataProvider' => $dataProvider,
            'itemView' => '_item', // представление для каждого товара
            'options' => ['tag' => false], // убираем обертку
            'layout' => "{items}", // убираем количество записей
        ]); ?>
    </div>

</div> 