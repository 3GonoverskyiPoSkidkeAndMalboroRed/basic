<?php
use yii\helpers\Html;

/** @var app\models\Music $model */
?>

<div class="music-card" style="background-color: #111; border: 1px solid #333; padding: 15px; border-radius: 10px; transition: all 0.3s ease;">
    <h3 style="color: white; font-family: Impact; margin-bottom: 15px;">
        <?= Html::encode($model->title) ?>
    </h3>
    
    <div class="youtube-thumbnail" style="margin-bottom: 15px; position: relative;">
        <?php if ($model->getYoutubeThumbnail()): ?>
            <img src="<?= $model->getYoutubeThumbnail() ?>" 
                 alt="<?= Html::encode($model->title) ?>" 
                 style="width: 100%; height: auto; border-radius: 5px;"
            >

            </div>
        <?php else: ?>
            <div style="
                width: 100%;
                height: 200px;
                background-color: #222;
                display: flex;
                align-items: center;
                justify-content: center;
                border-radius: 5px;
                color: #666;
                font-family: Impact;
            ">
                Превью недоступно
            </div>
        <?php endif; ?>
    </div>
    
    <div class="youtube-link" style="margin-top: 10px;">
        <?= Html::a(
            'Смотреть на YouTube',
            $model->youtube_link,
            [
                'class' => 'btn btn-danger',
                'target' => '_blank',
                'style' => 'width: 100%; font-family: Impact;'
            ]
        ) ?>
    </div>

    <?php if (!Yii::$app->user->isGuest && Yii::$app->user->identity->isAdmin): ?>
        <div class="admin-buttons" style="margin-top: 10px; display: flex; gap: 10px;">
            <?= Html::a('Изменить', ['update', 'id' => $model->id], [
                'class' => 'btn btn-primary',
                'style' => 'flex: 1; font-family: Impact;'
            ]) ?>
            <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'style' => 'flex: 1; font-family: Impact;',
                'data' => [
                    'confirm' => 'Вы уверены, что хотите удалить этот элемент?',
                    'method' => 'post',
                ],
            ]) ?>
        </div>
    <?php endif; ?>
</div>