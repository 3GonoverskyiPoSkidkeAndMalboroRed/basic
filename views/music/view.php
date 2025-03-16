<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $music app\models\Music */

$this->title = $music->title;
$this->params['breadcrumbs'][] = ['label' => 'Music', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="music-view">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <strong>Artist:</strong> <?= Html::encode($music->artist) ?><br>
        <strong>Album:</strong> <?= Html::encode($music->album) ?>
    </p>
</div> 