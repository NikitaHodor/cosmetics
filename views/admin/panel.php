<? include_once('./views/templates/header.php'); ?>
<div class="container panel-container">
    <h1> Панель администратора </h1>
    <nav class="navbar">
        <ul class="navbar-nav">
        <li class="nav-item">
            <a href="<?= SITE_ROOT . 'admin/users/'; ?>" class="nav-link">
                Пользователи
            </a>
        </li>
        <li class="nav-item">
            <a href="<?= SITE_ROOT . 'admin/cosmetics/'; ?>" class="nav-link">
                Косметика
            </a>
        </li>
        <li class="nav-item">
            <a href="<?= SITE_ROOT . 'admin/categories/'; ?>" class="nav-link">
                Категории каталога
            </a>
        </li>
        <li class="nav-item">
            <a href="<?= SITE_ROOT . 'admin/brands/'; ?>" class="nav-link">
                Бренды
            </a>
        </li>
        <li class="nav-item">
            <a href="<?= SITE_ROOT . 'admin/services/'; ?>" class="nav-link">
                Услуги салона
            </a>
        </li>
    </ul>
    </nav>




</div>


<? include_once('./views/templates/footer.php'); ?>
