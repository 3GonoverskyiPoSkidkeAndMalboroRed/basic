<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
$this->title = 'О нас';
?>
<h1><?= Html::encode($this->title) ?></h1>

<div class="about-content">
    <p>Мы - команда профессионалов, стремящихся предоставить вам лучшие услуги и продукты.</p>
    <p>Наша миссия - сделать вашу жизнь проще и удобнее.</p>
    <img src="<?= Yii::getAlias('@web/uploads/about_image1.jpg') ?>" alt="О нас" class="img-fluid" />
    <img src="<?= Yii::getAlias('@web/uploads/about_image2.jpg') ?>" alt="О нас" class="img-fluid" />
    <p>Мы гордимся тем, что работаем с лучшими партнерами и поставщиками.</p>
</div> 