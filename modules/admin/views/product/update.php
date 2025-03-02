<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\ListView;

/** @var yii\web\View $this */
/** @var app\models\Product $model */
/** @var array $categories */

$this->title = 'Редактировать товар: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Товары', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'categories' => $categories,
    ]) ?>

    <h2>Фотографии</h2>
    <div id="sortable">
        <?= ListView::widget([
            'dataProvider' => new \yii\data\ArrayDataProvider([
                'allModels' => $model->photos,
                'pagination' => false,
            ]),
            'itemView' => function ($model) {
                return Html::img('@web/uploads/' . $model->file_name, ['class' => 'img-thumbnail', 'style' => 'width: 100px; height: auto; margin-right: 10px;']);
            },
        ]); ?>
    </div>

</div>

<script>
    $(function() {
        $("#sortable").sortable({
            update: function(event, ui) {
                // Здесь вы можете отправить AJAX-запрос для обновления порядка
            }
        });
    });
</script>
