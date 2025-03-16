<?php

use app\models\Category;
use yii\helpers\Html;
use yii\widgets\ListView;
use yii\widgets\ActiveForm;
use app\modules\admin\models\ProductSearch; // Импортируем модель поиска
use app\models\Product; // Импортируем модель продукта

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */
/** @var app\modules\admin\models\ProductSearch $searchModel */
/** @var array $categories */

?>
<div class="container">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin([
        'method' => 'get',
        'action' => ['store/index'],
        'options' => ['class' => 'form-inline'],
    ]); ?>
    
    <div class="form-group">
        <?= $form->field($searchModel, 'size')->dropDownList(Product::$sizes, ['prompt' => 'Выберите размер']) ?>
    </div>
    
    <div class="form-group">
        <?= $form->field($searchModel, 'category_id')->dropDownList(Category::getCategories(), ['prompt' => 'Выберите категорию']) ?>
    </div>
    
    <?php ActiveForm::end(); ?>

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
        <?= ListView::widget([
            'dataProvider' => $dataProvider,
            'itemView' => '_item',
            'options' => ['tag' => false],
            'layout' => "{items}",
            'itemOptions' => [
                'class' => 'col'
            ],
        ]); ?>
    </div>
</div>

<script>
    // Отправка формы при изменении значения в выпадающих списках
    document.querySelectorAll('.form-inline select').forEach(function(select) {
        select.addEventListener('change', function() {
            this.form.submit();
        });
    });
</script> 