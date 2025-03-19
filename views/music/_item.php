<?php
use yii\helpers\Html;

/** @var app\models\Music $model */
?>

<?= Html::beginTag('a', [
    'href' => $model->youtube_link,
    'target' => '_blank',
    'style' => '
        display: block;
        text-decoration: none;
        background-color: #111;
        border: 1px solid #333;
        padding: 15px;
        border-radius: 10px;
        transition: all 0.3s ease;
    ',
    'onmouseover' => 'this.style.transform="scale(1.02)"; this.style.borderColor="rgb(160, 2, 2)";',
    'onmouseout' => 'this.style.transform="scale(1)"; this.style.borderColor="#333";',
]) ?>

    
    <div class="youtube-thumbnail" style="margin-bottom: 15px; position: relative;">
        <?php if ($model->getYoutubeThumbnail()): ?>
            <img src="<?= $model->getYoutubeThumbnail() ?>" 
                 alt="<?= Html::encode($model->title) ?>" 
                 style="width: 100%; height: auto; border-radius: 5px;"
                 
            >
            <p style="color: white; font-family: Impact; margin-top: 15px; font-size: 1;">
        <?= Html::encode($model->title) ?>
        </p>
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

    <?php if (!Yii::$app->user->isGuest && Yii::$app->user->identity->isAdmin): ?>
        <div class="admin-buttons" style="margin-top: 10px; display: flex; gap: 10px;" onclick="event.stopPropagation();">
            <?= Html::a('Изменить', ['update', 'id' => $model->id], [
                'class' => 'btn btn-primary',
                'style' => 'flex: 1; font-family: Impact;',
                'onclick' => 'event.preventDefault(); window.location.href=this.href;'
            ]) ?>
            <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'style' => 'flex: 1; font-family: Impact;',
                'data' => [
                    'confirm' => 'Вы уверены, что хотите удалить этот элемент?',
                    'method' => 'post',
                ],
                'onclick' => 'event.preventDefault(); if(confirm("Вы уверены, что хотите удалить этот элемент?")) window.location.href=this.href;'
            ]) ?>
        </div>
    <?php endif; ?>
<?= Html::endTag('a') ?>