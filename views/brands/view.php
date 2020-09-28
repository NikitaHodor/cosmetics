<? include_once('./views/templates/header.php'); ?>

<div class="container mt-4">
    <div class="row">
       <? foreach ($brandCosm as $cosmetic): ?>
        <div class="col-md-4 mb-3 d-flex">
              <div class="card main_card flex-fill">
                    <img src="<?= $cosmetic['image_url'] ?>" class="card-img-top main_card_img" alt="card-img">
                    <div class="card-body">
                           <h6>
                              <a href="<?= SITE_ROOT . 'cosmetics/view/' . $cosmetic['cosmetic_id'] ?>">
                                <?= $cosmetic['cosmetic_name']; ?>
                            </a>
                           </h6>
                            <p class="card-price">Цена: <?= $cosmetic['cosmetic_price']; ?> &#8381;</p>
                    </div>
                </div>
        </div>
        <? endforeach; ?>
    </div>
</div>

<? include_once('./views/templates/footer.php'); ?>
