<?php
use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Music $model */

$this->title = 'Обновить музыку: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Music', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="music-update">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true])->label('Название', ['class' => 'text-white']) ?>
    <?= $form->field($model, 'artist')->textInput(['maxlength' => true])->label('Исполнитель', ['class' => 'text-white']) ?>
    <?= $form->field($model, 'album')->textInput(['maxlength' => true])->label('Альбом', ['class' => 'text-white']) ?>
    <?= $form->field($model, 'youtube_link')->textInput(['maxlength' => true])->label('Ссылка на YouTube', ['class' => 'text-white']) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success', 'style' => 'font-family: Impact;']) ?>
        <?= Html::a('Отмена', ['index'], ['class' => 'btn btn-danger', 'style' => 'font-family: Impact;']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div> 