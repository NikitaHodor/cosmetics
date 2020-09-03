<? include_once('./views/templates/header.php'); ?>


	<div class="card" style="width: 18rem;">
  <img src="..." class="card-img-top" alt="...">
	  <div class="card-body">
	    <h5 class="card-title"><?= $cosmetic['cosmetic_name']; ?></h5>
	    <p class="card-text"><?= $cosmetic['cosmetic_description']; ?></p>
	    <div class="row"> 
	    	<a class="btn btn-secondary" onclick="addToCart(<?= $cosmetic['cosmetic_id']; ?>)">Добавить в корзину </a>
	    </div>
	    <? if (User::checkIfAdminAuthorized()) : ?>
		    <a href="<?= SITE_ROOT . 'cosmetics/edit/' . $cosmetic['cosmetic_id']; ?>" class="btn btn-primary">Редактировать</a>
		    <a class="btn btn-danger" onclick="deleteCosmetic(<?= $cosmetic['cosmetic_id']; ?>, '<?= SITE_ROOT; ?>')">Удалить</a>
		<? endif; ?>
	  </div>
	</div>

<? include_once('./views/templates/footer.php'); ?>
