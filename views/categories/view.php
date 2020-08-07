<? include_once('./views/templates/header.php'); ?>

	<div class="card" style="width: 18rem;">
  <img src="..." class="card-img-top" alt="...">
	  <div class="card-body">
	    <h5 class="card-title"><?= $category['cosmetic_name']; ?></h5>
	    <p class="card-text"><?= $category['cosmetic_description']; ?></p>
	    <div class="row"> 
	    	<a class="btn btn-primary" onclick="addToCart(<?= $category['cosmetic_id']; ?>)">Добавить в корзину </a>
	    </div>
	    <? if (User::checkIfUserAuthorized()) : ?>
		    <a href="<?= SITE_ROOT . 'cosmetics/edit/' . $category['cosmetic_id']; ?>" class="btn btn-primary">Редактировать</a>
		    <a class="btn btn-danger" onclick="deleteCosmeetic(<?= $category['cosmetic_id']; ?>, '<?= SITE_ROOT; ?>')">Удалить</a>
		<? endif; ?>
	  </div>
	</div>
	
<? include_once('./views/templates/footer.php'); ?>