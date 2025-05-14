<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Feedback */

$this->title = 'Сообщение #' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Сообщения обратной связи', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="feedback-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить это сообщение?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute' => 'user_id',
                'value' => $model->user->full_name,
                'label' => 'Пользователь',
            ],
            [
                'attribute' => 'user.email',
                'value' => $model->user->email,
                'label' => 'Email',
            ],
            [
                'attribute' => 'user.phone',
                'value' => $model->user->phone,
                'label' => 'Телефон',
            ],
            [
                'attribute' => 'message',
                'format' => 'ntext',
                'label' => 'Сообщение',
            ],
            [
                'attribute' => 'image',
                'format' => 'html',
                'value' => function ($model) {
                    return $model->image ? 
                        Html::img('@web/uploads/' . $model->image, ['class' => 'img-responsive', 'style' => 'max-width: 500px;']) : 
                        'Нет изображения';
                },
            ],
            [
                'attribute' => 'created_at',
                'format' => ['date', 'php:d.m.Y H:i'],
                'label' => 'Дата создания',
            ],
        ],
    ]) ?>

    <h3>Быстрый ответ</h3>
    
    <div class="contact-form">
        <div class="form-group">
            <?= Html::a('Ответить по Email', 'mailto:' . $model->user->email, ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
</div>
