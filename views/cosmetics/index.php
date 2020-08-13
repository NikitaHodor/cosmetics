<? include_once('./views/templates/header.php'); ?>

<div class="container">
    <h1> Главная </h1>

    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Банер - заглушка</h1>
            <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta repellat officiis, ea esse sunt odit cupiditate ipsum ad, nostrum animi aperiam reprehenderit! Esse quis saepe cum eum quam dicta. Error.</p>
        </div>
    </div>

    <div class="card-deck justify-content-center">
        <? foreach ($cosmetics as $cosmetic): ?>
        <!-- Карточка -->
        <a style="color: #272727;" href="<?= SITE_ROOT . 'cosmetics/view/' . $cosmetic['cosmetic_id'] ?>">
            <div class="card bg-dark text-center" style="max-width: 20rem;">
                <!-- Изображение -->
                <img class="card-img" src="../assets/img/cosmetic.jpg" alt="Generic placeholder image">
                <div class="card-img-overlay">
                    <h4 class="card-title">
                        <?= $cosmetic['cosmetic_name']; ?>
                    </h4>
                </div>
            </div><!-- Конец карточки -->
        </a>
        <? endforeach; ?>
    </div>
</div>

<? include_once('./views/templates/footer.php'); ?>
