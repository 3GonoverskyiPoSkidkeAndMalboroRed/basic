<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100 ">
<?php $this->beginBody() ?>

<header id="header">
    <?php
    NavBar::begin([
        'brandLabel' => Html::img('@web/img/rop.gif', ['alt' => 'Логотип', 'style' => 'height: 40px; border-radius: 50%;']),
        'brandUrl' => Yii::$app->homeUrl,
        'options' => ['class' => 'navbar-expand-md navbar-dark bg-black fixed-top']
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav '],
        'items' => [  
            
            ['label' => 'Каталог', 'url' => ['/store/index']],


            
            
            Yii::$app->user->isGuest
                ? ['label' => 'Регистрация', 'url' => ['/site/register']]
                : '',




            !Yii::$app->user->isGuest
                ? ['label' => 'Корзина', 'url' => ['/cart/index']]
                : ['label' => 'Корзина', 'url' => ['/cart/index']],

            Yii::$app->user->isGuest && Yii::$app->user->identity && !Yii::$app->user->identity->isAdmin
            ?['label' => 'Magazine', 'url' => ['/magazine/index']]
            : '',

            !Yii::$app->user->isGuest && !Yii::$app->user->identity->isAdmin
                ? ['label' => 'Мои заказы', 'url' => ['/user/orders']]
                : '',


                !Yii::$app->user->isGuest && Yii::$app->user->identity->isAdmin
                ? ['label' => 'Админка', 'url' => ['/admin']]
                : '',

            Yii::$app->user->isGuest
                ? ['label' => 'Вход', 'url' => ['/site/login']]
                : '<li class="nav-item">'
                    . Html::beginForm(['/site/logout'])
                    . Html::submitButton(
                        'Выход (' . Yii::$app->user->identity->login . ')',
                        ['class' => 'nav-link btn btn-link logout']
                    )
                    . Html::endForm()
                    . '</li>'
        ]
    ]);
    NavBar::end();
    ?>
</header>

<main id="main" class="flex-shrink-0" role="main">
    <div class="container">
        <?php if (!empty($this->params['breadcrumbs'])): ?>
            <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
        <?php endif ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<footer id="footer" class="mt-auto py-3 bg-black border-top border-white ">
    <div class="container">
        <div class="row text-muted">
            <div class="col-md-6 text-center  text-white">&copy; My Company <?= date('Y') ?></div>
            <div class="col-md-6 text-center  text-white"><?= Yii::powered() ?></div>
        </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
