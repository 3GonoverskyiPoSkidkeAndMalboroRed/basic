<?php
use yii\helpers\Html;

/** @var app\models\Music $model */
?>

<?= Html::beginTag('a', [
    'href' => $model->youtube_link,
    'target' => '_blank',
    'class' => 'music-card'
]) ?>
    <div class="youtube-thumbnail">
        <?php if ($model->getYoutubeThumbnail()): ?>
            <img src="<?= $model->getYoutubeThumbnail() ?>" 
                 alt="<?= Html::encode($model->title) ?>"
            >
            <p class="music-title-text">
                <?= Html::encode($model->title) ?>
            </p>
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
<?= Html::endTag('a') ?>