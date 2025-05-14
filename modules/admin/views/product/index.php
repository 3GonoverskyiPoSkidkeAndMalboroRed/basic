<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Список товаров';
?>
<h1 style="margin-top: 20px;"><?= Html::encode($this->title) ?></h1>

<p>
    <?= Html::a('Добавить товар', ['create'], ['class' => 'btn btn-success']) ?>
</p>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        'id',
        'title',
        'item_name',
        'count',
        'cost',
        'category.title', // Предполагаем, что у вас есть связь с моделью Category
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{update} {delete}',
        ],
    ],
    
]); 
?> 