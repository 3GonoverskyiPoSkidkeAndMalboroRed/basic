<?php

use app\models\Product;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\widgets\ActiveForm;
/** @var yii\web\View $this */
/** @var app\modules\admin\models\ProductSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
    <?= Html::a('Назад', ['/admin/shop'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Создать товар', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php $form = ActiveForm::begin([
        'method' => 'get',
        'action' => ['index'],
    ]); ?>

    <?= $form->field($searchModel, 'size')->dropDownList([
        '' => 'Выберите размер',
        'S' => 'S',
        'M' => 'M',
        'L' => 'L',
        'Onesize' => 'Onesize',
    ])->label('Размер') ?>

    <?= $form->field($searchModel, 'category_id')->dropDownList($categories, ['prompt' => 'Выберите категорию'])->label('Категория') ?>

    <div class="form-group">
        <?= Html::submitButton('Фильтровать', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'title',
            'count',
            'cost',
            'category_id',
            'size',
            'description',
            //'status',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Product $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
