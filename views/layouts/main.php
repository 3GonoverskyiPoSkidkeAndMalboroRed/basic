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
    <link href="/css/site.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
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

    // Левое меню
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav me-auto'],
        'items' => [  
            ['label' => '<span style="font-family: Impact; font-size: 1.2em;">Каталог</span>', 'url' => ['/store/index'], 'encode' => false],
            ['label' => '<span style="font-family: Impact; font-size: 1.2em;">Музыка</span>', 'url' => ['/music/index'], 'encode' => false],
            
            Yii::$app->user->isGuest
                ? ['label' => '<span style="font-family: Impact; font-size: 1.2em">Регистрация</span>', 'url' => ['/site/register'], 'encode' => false]
                : '',



            !Yii::$app->user->isGuest && Yii::$app->user->identity->isAdmin
                ? ['label' => '<span style="font-family: Impact; font-size: 1.2em">Админка</span>', 'url' => ['/admin'], 'encode' => false]
                : '',
        ]
    ]);

    // Правое меню (корзина и вход/выход)
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav ms-auto'],
        'items' => [
            !Yii::$app->user->isGuest
                ? ['label' => '<span style="font-family: Impact; font-size: 1.2em">Корзина</span>', 'url' => ['/cart/index'], 'encode' => false]
                : ['label' => '<span style="font-family: Impact; font-size: 1.2em">Корзина</span>', 'url' => ['/cart/index'], 'encode' => false],


                !Yii::$app->user->isGuest && !Yii::$app->user->identity->isAdmin
                ? ['label' => '<span style="font-family: Impact; font-size: 1.2em">Мои заказы</span>', 'url' => ['/user/orders'], 'encode' => false]
                : '',
                
            Yii::$app->user->isGuest
                ? ['label' => '<span style="font-family: Impact; font-size: 1.2em">Вход</span>', 'url' => ['/site/login'], 'encode' => false]
                : '<li class="nav-item">'
                    . Html::beginForm(['/site/logout'])
                    . Html::submitButton(
                        '<span style="font-family: Impact; font-size: 1.2em">Выход (' . Yii::$app->user->identity->login . ')</span>',
                        ['class' => 'nav-link btn btn-link logout', 'encode' => false]
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
