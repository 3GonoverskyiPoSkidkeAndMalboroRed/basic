<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Сообщения обратной связи';
?>
<div class="feedback-index">

    <h1 style="margin-top: 20px;"><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            
            [
                'attribute' => 'user_id',
                'value' => function ($model) {
                    return $model->user->full_name;
                },
                'label' => 'Пользователь',
            ],
            [
                'attribute' => 'user.email',
                'value' => function ($model) {
                    return $model->user->email;
                },
                'label' => 'Email',
            ],
            [
                'attribute' => 'message',
                'format' => 'ntext',
                'contentOptions' => ['style' => 'max-width: 300px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;'],
                'value' => function ($model) {
                    return mb_substr($model->message, 0, 100) . (mb_strlen($model->message) > 100 ? '...' : '');
                },
            ],
            [
                'attribute' => 'image',
                'format' => 'html',
                'value' => function ($model) {
                    return $model->image ? Html::img(Url::to('@web/uploads/' . $model->image), ['width' => '100px']) : 'Нет изображения';
                },
            ],
            [
                'attribute' => 'created_at',
                'format' => ['date', 'php:d.m.Y H:i'],
                'label' => 'Дата создания',
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {delete}',
                'buttons' => [
                    'view' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, [
                            'title' => 'Просмотр',
                            'data-pjax' => '0',
                        ]);
                    },
                    'delete' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                            'title' => 'Удалить',
                            'data-confirm' => 'Вы уверены, что хотите удалить это сообщение?',
                            'data-method' => 'post',
                            'data-pjax' => '0',
                        ]);
                    },
                ],
            ],
        ],
    ]); ?>
</div>
