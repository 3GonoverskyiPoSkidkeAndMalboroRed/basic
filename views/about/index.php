<?php
use yii\helpers\Html;
?>
<div class="about-page">
    <h1><?= Html::encode($this->title) ?></h1>
    <div class="about-content">
        <p>Мы - команда профессионалов, стремящихся предоставить вам лучшие услуги и продукты.</p>
        <p>Наша миссия - сделать вашу жизнь проще и удобнее.</p>
        <div class="about-images">
            <img src="<?= Yii::getAlias('@web/img/a-wild-and-beautiful-cool-horse-in-the-wilderness-7jpmupu98f3sapu3-7jpmupu98f3sapu3.jpg') ?>" alt="О нас" class="img-fluid" style="width: 100%; max-width: 800px;" />
        </div>
        <p>Мы гордимся тем, что работаем с лучшими партнерами и поставщиками.</p>
        <p>Свяжитесь с нами, чтобы узнать больше о наших услугах и предложениях.</p>
    </div>
</div>
