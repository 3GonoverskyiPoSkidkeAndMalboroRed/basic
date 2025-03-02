<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Product $model */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="product-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'count',
            'cost',
            'category_id',
            'size',
            [
                'label' => 'Описание',
                'format' => 'raw',
                'value' => $model->description,
            ],
            'status',
            [
                'label' => 'Фотографии',
                'format' => 'raw',
                'value' => function ($model) {
                    $photos = $model->photos;
                    $output = '';
                    foreach ($photos as $photo) {
                        $output .= Html::img('@web/uploads/' . $photo->file_name, ['alt' => $model->title, 'class' => 'img-thumbnail', 'style' => 'width: 100px; height: auto; margin-right: 10px;']);
                    }
                    return $output;
                },
            ],
        ],
    ]) ?>

</div>
