<? include_once('./views/templates/header.php'); ?>


	<div class="card" style="width: 18rem;">
  <img src=" <?= $cosmetic['image_url']; ?>" class="card-img-top" alt="...">
	  <div class="card-body">
	    <h5 class="card-title"><?= $cosmetic['cosmetic_name']; ?></h5>
	    <p class="card-text"><?= $cosmetic['cosmetic_description']; ?></p>
	    <? if (User::checkIfUserAuthorized()) : ?>
	    <div class="row">
	    	<a class="btn btn-secondary" onclick="addToCart(<?= $cosmetic['cosmetic_id']; ?>)">Добавить в корзину </a>
	    </div>
	    <? endif; ?>
	  </div>
	</div>

<? include_once('./views/templates/footer.php'); ?>
