<? include_once('./views/templates/header.php'); ?>

<div class="container">
    <h1> Косметика </h1>
    <div class="card-deck">
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
