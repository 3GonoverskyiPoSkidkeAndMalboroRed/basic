<?php
use yii\helpers\Html;

/** @var app\models\Music $model */
?>

<div class="music-card" style="background-color: #111; border: 1px solid #333; padding: 15px; border-radius: 10px; transition: all 0.3s ease;">
    <h3 style="color: white; font-family: Impact; margin-bottom: 15px;">
        <?= Html::encode($model->title) ?>
    </h3>
    
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
</div> 