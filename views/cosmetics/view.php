<? include_once('./views/templates/header.php'); ?>

	<div class="card" style="width: 18rem;">
  <img src="..." class="card-img-top" alt="...">
	  <div class="card-body">
	    <h5 class="card-title"><?= $cosmetic['cosmetic_name']; ?></h5>
	    <p class="card-text"><?= $cosmetic['cosmetic_description']; ?></p>
	    <div class="row"> 
	    	<a class="btn btn-primary" onclick="addToCart(<?= $cosmetic['cosmetic_id']; ?>)">Добавить в корзину </a>
	    </div>
	    <? if (User::checkIfUserAuthorized()) : ?>
		    <a href="<?= SITE_ROOT . 'cosmetics/edit/' . $cosmetic['cosmetic_id']; ?>" class="btn btn-primary">Редактировать</a>
		    <a href="<?= SITE_ROOT . 'cosmetics/delete/' . $cosmetic['cosmetic_id']; ?>" class="btn btn-danger" onclick="deleteCosmeetic(<?= $cosmetic['cosmetic_id']; ?>, '<?= SITE_ROOT; ?>')">Удалить</a>
		<? endif; ?>
	  </div>
	</div>
	
<? include_once('./views/templates/footer.php'); ?>