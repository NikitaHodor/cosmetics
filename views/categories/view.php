<? include_once('./views/templates/header.php'); ?>

<div class="container">
   <div class="row">
       <? foreach ($categoryCosm as $cosmetic): ?>
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
<? endforeach; ?>
   </div>

</div>


<? include_once('./views/templates/footer.php'); ?>
