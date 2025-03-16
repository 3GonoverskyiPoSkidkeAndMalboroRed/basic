<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $newsItems app\models\News[] */

$this->title = 'Новости';
?>
<h1><?= Html::encode($this->title) ?></h1>
<p>
    <?= Html::a('Создать новость', ['create'], ['class' => 'btn btn-success']) ?>
</p>
<table class="table">
    <thead>
        <tr>
            <th>Заголовок</th>
            <th>Содержимое</th>
            <th>Дата создания</th>
            <th>Действия</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($newsItems as $news): ?>
            <tr>
                <td><?= Html::encode($news->title) ?></td>
                <td><?= Html::encode($news->content) ?></td>
                <td><?= Html::encode($news->created_at) ?></td>
                <td>
                    <?= Html::a('Обновить', ['update', 'id' => $news->id], ['class' => 'btn btn-primary']) ?>
                    <?= Html::a('Удалить', ['delete', 'id' => $news->id], [
                        'class' => 'btn btn-danger',
                        'data' => [
                            'confirm' => 'Вы уверены, что хотите удалить эту новость?',
                            'method' => 'post',
                        ],
                    ]) ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
