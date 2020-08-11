<!DOCTYPE html>
<html>

<head>
    <title> <?= $title; ?></title>
    <link rel="stylesheet" href="<?= LIBS ?>bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="<?= CSS ?>main.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand <?= ($title == 'Enso Cosmetics') ? 'active' : '' ?>" href="<?= SITE_ROOT . 'cosmetics/list' ?>">
            Enso Cosmetics
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
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
            </ul>
<!--    Приклеить функционал к форме!!!   доработать ссылку в кнопке, а то костыль     -->
            <form name="search" class="form-inline my-2 my-lg-0" method="POST">
                <input name="query" class="form-control mr-sm-2" type="search" placeholder="Search">
                <button class="btn btn-outline-secondary my-2 my-sm-0 " type="submit"><a class="<?= ($title == 'Поиск') ? 'active' : '' ?>" href="<?= SITE_ROOT . 'search' ?>">Search</a></button>
            </form>
        </div>
    </nav>
