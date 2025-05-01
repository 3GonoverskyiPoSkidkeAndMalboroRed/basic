<?php
use yii\helpers\Html;

/** @var app\models\Music $model */
?>

    <div class="card" style="width: 18rem; background-color: #000; color: #fff;">
        <?php if ($model->getYoutubeThumbnail()): ?>
            <a href="<?= $model->youtube_link ?>" class="youtube-thumbnail" style="text-decoration: none; color: white; font-family: Impact;">
                <img src="<?= $model->getYoutubeThumbnail() ?>" class="card-img-top" alt="<?= Html::encode($model->title) ?>">
                <div class="card-body">
                    <p class="card-text" style="font-family: Impact;"><?= Html::encode($model->title) ?></p>
                </div>
            </a>
        <?php else: ?>
            <div class="no-image">
                Превью недоступно
            </div>
        <?php endif; ?>
    </div>

    <?php if (!Yii::$app->user->isGuest && Yii::$app->user->identity->isAdmin): ?>
        <div class="admin-buttons" onclick="event.stopPropagation();">
            <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger admin-button',
                'data' => [
                    'confirm' => 'Вы уверены, что хотите удалить этот элемент?',
                    'method' => 'post',
                ],
                'onclick' => 'event.preventDefault(); if(confirm("Вы уверены, что хотите удалить этот элемент?")) window.location.href=this.href;'
            ]) ?>
        </div>
    <?php endif; ?>