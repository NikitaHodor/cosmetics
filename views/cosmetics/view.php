<? include_once('./views/templates/header.php'); ?>

<div class="card mb-3">
  <div class="row no-gutters">
    <div class="col-md-4">
      <img src="<?= $cosmetic['image_url']; ?>" class="card-img" alt="card-img">
    </div>
    <div class="col-md-8 my-auto">
      <div class="card-body">
        <h5 class="card-title"><?= $cosmetic['cosmetic_name']; ?></h5>
	    <p class="card-text"><?= $cosmetic['cosmetic_description']; ?></p>
	    <hr>
	    <p class="card-brand">Бренд: <?= $cosmetic['brand_name']; ?></p>
	    <p class="card-country">Страна: <?= $cosmetic['country_name']; ?></p>
	    <p class="card-volume">Объём: <?= $cosmetic['cosmetic_volume']; ?> &#13206;</p>
	    <p class="card-price">Цена: <?= $cosmetic['cosmetic_price']; ?> &#8381;</p>
	    <? if (User::checkIfUserAuthorized()) : ?>
	    <div class="row"> 
	    	<a class="btn btn-secondary" onclick="addToCart(<?= $cosmetic['cosmetic_id']; ?>)">Добавить в корзину </a>
	    </div>
	    <? endif; ?>
      </div>
    </div>
  </div>
</div>

<? include_once('./views/templates/footer.php'); ?>
