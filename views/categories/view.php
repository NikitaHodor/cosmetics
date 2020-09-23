<? include_once('./views/templates/header.php'); ?>

<div class="container mt-4">
    <div class="row">
       <? foreach ($categoryCosm as $cosmetic): ?>
        <div class="col-auto mb-3">
              <div class="card main_card">
                    <img src="<?= $cosmetic['image_url'] ?>" class="card-img-top main_card_img" alt="card-img">
                    <div class="card-body">
                        <span class="card-text">
                            <a href="<?= SITE_ROOT . 'cosmetics/view/' . $cosmetic['cosmetic_id'] ?>">
                                <?= $cosmetic['cosmetic_name']; ?>
                            </a>
                        </span>
                    </div>
                </div>
        </div>
        <? endforeach; ?>
    </div>
</div>

<? include_once('./views/templates/footer.php'); ?>
