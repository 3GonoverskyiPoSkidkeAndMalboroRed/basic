<?php
use yii\helpers\Html;
use yii\widgets\ListView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Музыка';
?>

<div class="music-index">
    <h1 class="music-title"><?= Html::encode($this->title) ?></h1>

    <?php if (!Yii::$app->user->isGuest && Yii::$app->user->identity->isAdmin): ?>
        <div class="mb-3">
            <?= Html::a('Добавить музыку', ['create'], [
                'class' => 'btn btn-success',
                'style' => 'font-family: Impact;'
            ]) ?>
        </div>
    <?php endif; ?>

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => '_item',
        'layout' => "{items}\n{pager}",
        'options' => [
            'class' => 'music-grid'
        ],
        'itemOptions' => [
            'class' => 'music-grid-item'
        ],
    ]) ?>
</div>

<style>
.music-grid {
    display: grid;
    gap: 20px;
    padding: 0 15px;
}

/* Мобильные устройства */
@media (max-width: 576px) {
    .music-grid {
        grid-template-columns: 1fr;
    }
}

/* Планшеты */
@media (min-width: 577px) and (max-width: 768px) {
    .music-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

/* Небольшие десктопы */
@media (min-width: 769px) and (max-width: 992px) {
    .music-grid {
        grid-template-columns: repeat(3, 1fr);
    }
}

/* Средние и большие десктопы */
@media (min-width: 993px) {
    .music-grid {
        grid-template-columns: repeat(4, 1fr);
    }
}

.music-grid-item {
    margin: 0 !important;
    padding: 0 !important;
}

/* Стили для пагинации */
.pagination {
    margin-top: 20px;
    justify-content: center;
}

.pagination li {
    margin: 0 5px;
}

.pagination li a, .pagination li span {
    color: white;
    background-color: #111;
    border: 1px solid #333;
    padding: 8px 12px;
    border-radius: 5px;
    text-decoration: none;
    font-family: Impact;
}

.pagination li.active a {
    background-color: rgb(160, 2, 2);
    border-color: rgb(160, 2, 2);
}

.pagination li a:hover {
    background-color: #333;
    border-color: rgb(160, 2, 2);
}
</style> 