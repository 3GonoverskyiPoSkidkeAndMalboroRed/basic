<?php

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;
use froala\froalaeditor\FroalaEditor;
use froala\froalaeditor\FroalaEditorWidget;

/** @var yii\web\View $this */
/** @var app\models\Product $model */
/** @var yii\widgets\ActiveForm $form */
/** @var array $categories */

?>

<div class="product-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->widget(FroalaEditorWidget::class, [
        'options' => [
            'toolbarInline' => false,
            'toolbarVisibleWithoutSelection' => true,
            'height' => 300,
        ],
    ]) ?>

    <?= $form->field($model, 'size')->dropDownList(['prompt' => 'Выберите размер', 'S' => 'S', 'M' => 'M', 'L' => 'L', 'Onesize' => 'Onesize']) ?>

    <?= $form->field($model, 'category_id')->dropDownList($categories, ['prompt' => 'Выберите категорию']) ?>

    <?= $form->field($model, 'cost')->textInput() ?>

    <?= $form->field($model, 'count')->textInput() ?>

    <?= $form->field($model, 'item_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'photos[]')->fileInput(['multiple' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
