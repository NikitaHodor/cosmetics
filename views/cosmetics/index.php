<? include_once('./views/templates/header.php'); ?>

<div class="container">
    <h1> Главная </h1>
    <div class="container">
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-4">Банер - заглушка</h1>
                <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta repellat officiis, ea esse sunt odit cupiditate ipsum ad, nostrum animi aperiam reprehenderit! Esse quis saepe cum eum quam dicta. Error.</p>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="card-deck">
            <? foreach ($cosmetics as $cosmetic): ?>
            <div class="card text-center border-dark">
                <img src="../assets/img/cosmetic.jpg" class="card-img-top" alt="card-img">
                <div class="card-img-overlay">
                    <span class="card-title">
                        <a href="<?= SITE_ROOT . 'cosmetics/view/' . $cosmetic['cosmetic_id'] ?>">
                            <?= $cosmetic['cosmetic_name']; ?>
                        </a>
                    </span>
                </div>
            </div>
            <? endforeach; ?>
        </div>
    </div>
</div>

<? include_once('./views/templates/footer.php'); ?>
