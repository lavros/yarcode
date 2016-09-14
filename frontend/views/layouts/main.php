<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use kartik\alert\AlertBlock;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= empty($this->title) ? '' : Html::encode($this->title) . ' | ' ?>Some Agency</title>

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
    <?php $this->head() ?>
</head>
<body id="page-top">
<?php $this->beginBody() ?>

<?php
NavBar::begin([
    'brandLabel' => 'Some Agency',
    'brandUrl' => '#page-top',
    'brandOptions' => [
        'class' => 'page-scroll',
    ],
    'options' => [
        'id' => 'mainNav',
        'class' => 'navbar navbar-default navbar-custom navbar-fixed-top',
    ],
]);
$linkOptions = ['class' => 'page-scroll'];

// Need for fix scrollspy on index page.
$linkPrefix = Yii::$app->location->isHome ? '' : '/';

$menuItems = [
    [
        'label' => 'Services',
        'url' => "{$linkPrefix}#services",
        'linkOptions' => $linkOptions,
    ],
    [
        'label' => 'Portfolio',
        'url' => "{$linkPrefix}#portfolio",
        'linkOptions' => $linkOptions,
    ],
    [
        'label' => 'About',
        'url' => "{$linkPrefix}#about",
        'linkOptions' => $linkOptions,
    ],
    [
        'label' => 'Team',
        'url' => "{$linkPrefix}#team",
        'linkOptions' => $linkOptions,
    ],
    [
        'label' => 'Contact',
        'url' => "{$linkPrefix}#contact",
        'linkOptions' => $linkOptions,
    ],
];
echo Nav::widget([
    'options' => ['class' => 'navbar-nav navbar-right'],
    'items' => $menuItems,
    'encodeLabels' => false,
]);
NavBar::end();
?>
<!-- Header -->
<header>
    <div class="container">
        <div class="intro-text">
            <div class="intro-lead-in">Welcome To Our Studio!</div>
            <div class="intro-heading">It's Nice To Meet You</div>
            <a href="<?= $linkPrefix ?>#services" class="page-scroll btn btn-xl">Tell Me More</a>
        </div>
    </div>
</header>
<?= $content ?>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <span class="copyright">&copy; Some Agency <?= date('Y') ?></span>
            </div>
            <div class="col-md-4">
                <ul class="list-inline social-buttons">
                    <li><a href="#"><i class="fa fa-twitter"></i></a>
                    </li>
                    <li><a href="#"><i class="fa fa-facebook"></i></a>
                    </li>
                    <li><a href="#"><i class="fa fa-linkedin"></i></a>
                    </li>
                </ul>
            </div>
            <div class="col-md-4">
                <ul class="list-inline quicklinks">
                    <li><?= Html::a('Privacy Policy', Url::to(['site/privacy-policy'])) ?></li>
                    <li><?= Html::a('Terms of Use', Url::to(['site/terms-of-use'])) ?></li>
                </ul>
            </div>
        </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
