<?php

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Product */
/* @var $form yii\widgets\ActiveForm */
/* @var $categories array */

$this->title = 'Обновить товар: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Товары', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<h1><?= Html::encode($this->title) ?></h1>

<div class="product-update">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'item_name')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'count')->textInput() ?>
    <?= $form->field($model, 'cost')->textInput() ?>
    <?= $form->field($model, 'category_id')->dropDownList($categories, ['prompt' => 'Выберите категорию']) ?>
    <?= $form->field($model, 'size')->dropDownList([0 => 'XS', 1 => 'S', 2 => 'M', 3 => 'L', 4 => 'XL', 5 => 'XXL', 6 => 'One size'], ['prompt' => 'Выберите размер']) ?>
    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
    <?= $form->field($model, 'image')->fileInput() ?>

    <?php if ($model->hasErrors()): ?>
        <div class="alert alert-danger">
            <strong>Ошибка!</strong> Пожалуйста, исправьте следующие ошибки:
            <ul>
                <?php foreach ($model->getErrors() as $errors): ?>
                    <?php foreach ($errors as $error): ?>
                        <li><?= Html::encode($error) ?></li>
                    <?php endforeach; ?>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
        <?= Html::a('Отмена', ['index'], ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>