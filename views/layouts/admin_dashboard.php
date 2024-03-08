<?php

/**
 * @var yii\web\View $this
 * @var string $content
 */

use app\models\User;
use app\assets\AppAsset;
use app\widgets\FooterWidget;
use app\widgets\LoadingSpinnerWidget;
use app\widgets\MainHeaderWidget;
use app\widgets\ShoppingCartWidget;

AppAsset::register($this);
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Rokon - Shop Left Sidebar</title>
    <meta name="description" content="Morden Bootstrap HTML5 Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="../img/favicon.ico">

    <!-- ======= All CSS Plugins here ======== -->
    <link rel="stylesheet" href="../css/plugins/swiper-bundle.min.css">
    <link rel="stylesheet" href="../css/plugins/glightbox.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800&family=Work+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">

    <!-- Plugin css -->
    <link rel="stylesheet" href="../css/vendor/bootstrap.min.css">

    <!-- Custom Style CSS -->
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
<?php $this->beginBody() ?>

<?= LoadingSpinnerWidget::widget() ?>

<header class="header__section">
    <?= MainHeaderWidget::widget() ?>
    <?= ShoppingCartWidget::widget() ?>
</header>

<main class="main__content_wrapper">
    <section class="breadcrumb__section breadcrumb__bg">
        <div class="container">
            <div class="row row-cols-1">
                <div class="col">
                    <div class="breadcrumb__content">
                        <h1 class="breadcrumb__content--title mb-10">Admin Dashboard</h1>
                        <ul class="breadcrumb__content--menu d-flex">
                            <li class="breadcrumb__content--menu__items">
                                <a href="#">Home</a>
                            </li>
                            <li class="breadcrumb__content--menu__items">
                                <span class="text__secondary">
                                    Admin Dashboard
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--    TODO via modal -->

    <?php if (Yii::$app->session->hasFlash('success')): ?>
        <div class="alert alert-success alert-dismissable">
            <h4><i class="icon fa fa-check"></i>Saved!</h4>
            <?= Yii::$app->session->getFlash('success') ?>
        </div>
    <?php endif; ?>

    <?php if (Yii::$app->session->hasFlash('error')): ?>
        <div class="alert alert-danger alert-dismissable">
            <h4><i class="icon fa fa-check"></i>Error!</h4>
            <?= Yii::$app->session->getFlash('error') ?>
        </div>
    <?php endif; ?>

    <section class="my__account--section section--padding">
        <div class="container">
            <div class="my__account--section__inner border-radius-10 d-flex">
                <div class="account__left--sidebar">
                    <h2 class="account__content--title h3 mb-20">Actions</h2>
                    <ul class="account__menu">
                        <li class="account__menu--list">
                            <a href="/admin/user">Users</a>
                        </li>
                        <li class="account__menu--list">
                            <a href="/admin/permission">Permissions</a>
                        </li>
                        <li class="account__menu--list">
                            <a href="/admin/vendor">Vendors</a>
                        </li>
                        <li class="account__menu--list">
                            <a href="/admin/category">Categories</a>
                        </li>
                        <li class="account__menu--list">
                            <a href="/admin/product">Products</a>
                        </li>
                    </ul>
                </div>
                <div class="account__wrapper">
                    <?= $content ?>
                </div>
            </div>
        </div>
    </section>
</main>

<!-- Start footer section -->
<footer class="footer__section footer__bg">
    <?= FooterWidget::widget() ?>
</footer>
<!-- End footer section -->

<!-- Scroll top bar -->
<button id="scroll__top"><svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M112 244l144-144 144 144M256 120v292"/></svg></button>

<!-- All Script JS Plugins here  -->
<script src="../js/vendor/popper.js" defer="defer"></script>
<script src="../js/vendor/bootstrap.min.js" defer="defer"></script>

<script src="../js/plugins/swiper-bundle.min.js" defer="defer"></script>
<script src="../js/plugins/glightbox.min.js" defer="defer"></script>

<!-- Customscript js -->
<script src="../js/script.js" defer="defer"></script>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
