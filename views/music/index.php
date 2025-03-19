<?php
use yii\helpers\Html;
use yii\widgets\ListView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Музыка';
?>

<div class="music-index" style="background-color: #000; color: #fff; padding: 20px;">
    <h1 style="color: white; font-family: Impact; text-align: center; margin-bottom: 30px;">
        <?= Html::encode($this->title) ?>
    </h1>

    <?php if (!Yii::$app->user->isGuest && Yii::$app->user->identity->isAdmin): ?>
        <div style="margin-bottom: 20px;">
            <?= Html::a('Добавить музыку', ['create'], [
                'class' => 'btn btn-success',
                'style' => 'font-family: Impact;'
            ]) ?>
        </div>
    <?php endif; ?>

    <div class="music-container" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 20px;">
        <?= ListView::widget([
            'dataProvider' => $dataProvider,
            'itemView' => '_item',
            'layout' => "{items}\n{pager}",
            'itemOptions' => ['class' => 'music-item'],
        ]) ?>
    </div>
</div> 