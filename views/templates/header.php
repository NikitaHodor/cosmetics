<!DOCTYPE html>
<html>

<head>
    <title> <?= $title; ?></title>
    <link rel="stylesheet" href="<?= LIBS ?>bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="<?= CSS ?>main.css">
</head>

<body>
    <nav class="navbar top navbar-expand-sm navbar-dark bg-dark">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="navbar-header <?= ($title == 'Enso Cosmetics') ? 'active' : '' ?>">
                <a class="navbar-brand" href="<?= SITE_ROOT . 'cosmetics/list' ?>">Enso Cosmetics</a>
            </div>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item <?= ($title == 'Каталог') ? 'active' : '' ?>">
                    <a class="nav-link" href="<?= SITE_ROOT . 'categories/list' ?>">Каталог</a>
                </li>
                <li class="nav-item <?= ($title == 'Бренды') ? 'active' : '' ?>">
                    <a class="nav-link" href="<?= SITE_ROOT . 'brands/list' ?>">Бренды</a>
                </li>
                <li class="nav-item <?= ($title == 'Салон') ? 'active' : '' ?>">
                    <a class="nav-link" href="<?= SITE_ROOT . 'services/list' ?>">Салон</a>
                </li>
                <li class="nav-item <?= ($title == 'FAQs') ? 'active' : '' ?>">
                    <a class="nav-link" href="<?= SITE_ROOT . '' ?>">FAQs</a>
                </li>
                <li class="nav-item <?= ($title == 'Корзина') ? 'active' : '' ?>">
                    <a class="nav-link" href="<?= SITE_ROOT . 'cart' ?>"><i class="fa fa-shopping-cart"></i></a>
                </li>
                <? if (User::checkIfUserAuthorized()) : ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= SITE_ROOT . 'logout' ?>">Выход</a>
                </li>
                <? else : ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i></a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item <?= ($title == 'Регистрация') ? 'active' : '' ?>" href="<?= SITE_ROOT . 'register' ?>">Регистрация</a>
                        <a class="dropdown-item <?= ($title == 'Авторизация') ? 'active' : '' ?>" href="<?= SITE_ROOT . 'auth' ?>">Авторизация</a>
                    </div>
                </li>

                <? endif; ?>
        </div>
    </nav>
