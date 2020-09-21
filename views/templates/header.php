<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?= $title; ?></title>
    <link rel="stylesheet" href="<?= LIBS; ?>bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="<?= CSS; ?>font-awesome.min.css">
    <link rel="stylesheet" href="<?= CSS; ?>main.css">
</head>

<body>
    <header id="header">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand <?= ($title == 'Enso Cosmetics') ? 'active' : '' ?>" href="<?= SITE_ROOT . 'home' ?>">
                Enso Cosmetics
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                  <? if (User::checkIfAdminAuthorized()) : ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Админ</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item <?= ($title == 'Список пользователей') ? 'active' : '' ?>" href="<?= SITE_ROOT . 'admin/users'; ?>">Пользователи</a>
                            <a class="dropdown-item <?= ($title == 'Список товаров') ? 'active' : '' ?>" href="<?= SITE_ROOT . 'admin/cosmetics'; ?>">Косметика</a>
                            <a class="dropdown-item <?= ($title == 'Категории каталога') ? 'active' : '' ?>" href="<?= SITE_ROOT . 'admin/categories'; ?>">Категории каталога</a>
                            <a class="dropdown-item <?= ($title == 'Список брендов') ? 'active' : '' ?>" href="<?= SITE_ROOT . 'admin/brands'; ?>">Бренды</a>
                            <a class="dropdown-item <?= ($title == 'Услуги салона') ? 'active' : '' ?>" href="<?= SITE_ROOT . 'admin/services'; ?>">Услуги салона</a>
                            <a class="dropdown-item <?= ($title == 'Изображения') ? 'active' : '' ?>" href="<?= SITE_ROOT . 'admin/images'; ?>">Изображения</a>
                        </div>
                    </li>
                    <? endif; ?>
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
                        <a class="nav-link" href="<?= SITE_ROOT . 'faq' ?>">FAQs</a>
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
                <form name="query" class="form-inline my-2 my-lg-0 <?= ($title == 'Поиск') ? 'active' : '' ?>" method="POST" action="<?= SITE_ROOT . 'search/list' ?>">
                    <input name="inputQ" class="form-control mr-sm-2" type="search" placeholder="Поиск">
                    <button class="btn btn-outline-secondary my-2 my-sm-0 " type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
        </nav>
    </header>
<div id="wrap">
    <div id="main" class="container clear-top">
