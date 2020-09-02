<header class="main-header">
    <!--
       <div class="header-top">
           <div class="container text-right">
               <div class="header-contact__item"><span class="header-contact__icon fa fa-envelope mx-10"></span><a href="mailto:info@aperture.com" class="header-contact__link">info@aperture.com</a></div>
               <div class="header-contact__item"><span class="header-contact__icon fa fa-phone mx-10"></span><a href="tel:+78121234567" class="header-contact__link">+7 (812) 123-45-67</a></div>
           </div>
       </div>
-->
    <div class="header-bottom">
        <div class="container">
            <nav class="main-nav clearfix">
                <div class="nav-header">
                    <a href="<?= SITE_ROOT . 'cosmetics/list' ?>" class="logo <?= ($title == 'Enso Cosmetics') ? 'active' : '' ?>">Enso Cosmetics</a>
                    <button type="button" class="main-menu__btn navbar-toggle collapsed" data-toggle="collapse" data-target="#menu-collapse" aria-expanded="false">
                        <span class="sr-only">Меню</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="menu-collapse">
                    <ul class="main-menu">
                        <li class="main-menu__item <?= ($title == 'Каталог') ? 'active' : '' ?>"><a href="<?= SITE_ROOT . 'categories/list' ?>" class="main-menu__link">Каталог</a></li>
                        <li class="main-menu__item <?= ($title == 'Бренды') ? 'active' : '' ?>"><a href="<?= SITE_ROOT . 'brands/list' ?>" class="main-menu__link">Бренды</a></li>
                        <li class="main-menu__item <?= ($title == 'Салон') ? 'active' : '' ?>"><a href="<?= SITE_ROOT . 'services/list' ?>" class="main-menu__link">Салон</a></li>
                        <li class="main-menu__item <?= ($title == 'FAQs') ? 'active' : '' ?>"><a href="<?= SITE_ROOT . 'faq' ?>" class="main-menu__link">FAQs</a></li>
                        <li class="main-menu__item <?= ($title == 'Корзина') ? 'active' : '' ?>"><a href="<?= SITE_ROOT . 'cart' ?>" class="main-menu__link"><i class="fa fa-shopping-cart"></i></a></li>
                        <? if (User::checkIfUserAuthorized()) : ?>
                        <li class="main-menu__item"><a href="<?= SITE_ROOT . 'logout' ?>" class="main-menu__link">Выход</a></li>
                        <? else : ?>
                        <li class="main-menu__item dropdown">
                            <a class="main-menu__link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i></a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item <?= ($title == 'Регистрация') ? 'active' : '' ?>" href="<?= SITE_ROOT . 'register' ?>">Регистрация</a>
                                <a class="dropdown-item <?= ($title == 'Авторизация') ? 'active' : '' ?>" href="<?= SITE_ROOT . 'auth' ?>">Авторизация</a>
                            </div>
                        </li>
                        <? endif; ?>
                    </ul>
                    <form name="query" class="form-inline my-2 my-lg-0 <?= ($title == 'Поиск') ? 'active' : '' ?>" method="POST" action="<?= SITE_ROOT . 'search' ?>">
                        <input name="inputQ" class="form-control mr-sm-2" type="search" placeholder="Поиск">
                        <button class="btn btn-outline-secondary my-2 my-sm-0 " type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </div>
            </nav>
        </div>
    </div>
</header>
