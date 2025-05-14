<?php

use yii\helpers\Html;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Заказы';
?>
<h1 style="margin-top: 20px;"><?= Html::encode($this->title) ?></h1>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'summary' => '',
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        [
            'attribute' => 'id',
            'label' => 'ID Заказа',
        ],
        [
            'attribute' => 'product.title',
            'label' => 'Название товара',
        ],
        [
            'attribute' => 'product.item_name',
            'label' => 'Название товара',
        ],
        [
            'attribute' => 'status.title',
            'label' => 'Статус',
        ],
        [
            'attribute' => 'created_at',
            'label' => 'Дата создания',
        ],
        [
            'attribute' => 'user.full_name',
            'label' => 'Пользователь',
        ],
        [
            'attribute' => 'contact_number',
            'label' => 'Номер телефона',
        ],
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{work} {reject} {complete}',
            'header' => 'Изменить статус',
            'buttons' => [
                'work' => function ($url, $model) {
                    if ($model->status_id == 1) { // Статус "Новая"
                        return Html::a('В работу', ['update-status', 'id' => $model->id, 'status' => 'in_progress'], ['class' => 'btn btn-warning']);
                    }
                },
                'reject' => function ($url, $model) {
                    if ($model->status_id == 1) { // Статус "Новая"
                        return Html::a('Отклонить', ['update-status', 'id' => $model->id, 'status' => 'rejected'], ['class' => 'btn btn-danger']);
                    }
                },
                'complete' => function ($url, $model) {
                    if ($model->status_id == 2) { // Статус "В обработке"
                        return Html::a('Выполнено', ['update-status', 'id' => $model->id, 'status' => 'completed'], ['class' => 'btn btn-success']);
                    }
                },
            ],
        ],
    ],
]); ?> 