<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $musicList app\models\Music[] */

$this->title = 'Music';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="music-background">
    <div class="music-index">
        <h1><?= Html::encode($this->title) ?></h1>

        <ul>
            <?php foreach ($musicList as $music): ?>
                <li>
                    <?= Html::a(Html::encode($music->title), ['view', 'id' => $music->id]) ?> - <?= Html::encode($music->artist) ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div> 