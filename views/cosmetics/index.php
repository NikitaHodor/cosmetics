<? include_once('./views/templates/header.php'); ?>


        <h1> Главная </h1>
        <div class="container jumbo-container">
            <div class="jumbotron jumbo-banner fluid">
                <div class="container jumbo-text">
                    <h1>Баннер - заглушка</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta repellat officiis, ea esse sunt odit cupiditate ipsum ad, nostrum animi aperiam reprehenderit! Esse quis saepe cum eum quam dicta. Error.</p>
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


<? include_once('./views/templates/footer.php'); ?>
