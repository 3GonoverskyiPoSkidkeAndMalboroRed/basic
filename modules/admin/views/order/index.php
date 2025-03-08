<?php

use yii\helpers\Html;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Заказы';
?>
<h1><?= Html::encode($this->title) ?></h1>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'summary' => '',
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        'id',
        'product.title',
        'status.title',
        'created_at',
        'user.full_name',
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{work} {reject} {complete}',
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