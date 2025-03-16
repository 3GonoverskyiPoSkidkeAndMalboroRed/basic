<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $music app\models\Music */

$this->title = 'Обновить музыку: ' . $music->title;
$this->params['breadcrumbs'][] = ['label' => 'Music', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="music-update">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="music-form">
        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($music, 'title')->textInput(['maxlength' => true]) ?>
        <?= $form->field($music, 'artist')->textInput(['maxlength' => true]) ?>
        <?= $form->field($music, 'album')->textInput(['maxlength' => true]) ?>

        <div class="form-group">
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
            <?= Html::a('Отмена', ['index'], ['class' => 'btn btn-danger']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div> 