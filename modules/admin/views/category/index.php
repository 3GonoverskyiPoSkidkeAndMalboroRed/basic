<?php
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Категории';
?>
<h1><?= Html::encode($this->title) ?></h1>

<p>
    <?= Html::a('Создать категорию', ['create'], ['class' => 'btn btn-success']) ?>
</p>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        'title',
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{update} {delete}',
            'buttons' => [
                'update' => function ($url, $model) {
                    return Html::a('Редактировать', $url, ['class' => 'btn btn-primary']);
                },
                'delete' => function ($url, $model) {
                    return Html::a('Удалить', $url, [
                        'class' => 'btn btn-danger',
                        'data' => [
                            'confirm' => 'Вы уверены, что хотите удалить эту категорию?',
                            'method' => 'post',
                        ],
                    ]);
                },
            ],
        ],
    ],
]); ?> 