<?php
/** @var yii\web\View $this */

use yii\bootstrap5\Html;

?>
<h1>Панель управления Интернет магазином</h1>

<p>
  <?= Html::a('Категории', ['/admin/category'], ['class' => 'btn btn-info']) ?>
  <?= Html::a('Товары', ['/admin/product'], ['class' => 'btn btn-info']) ?>
</p>
