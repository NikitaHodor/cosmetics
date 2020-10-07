<? include_once('./views/templates/header.php'); ?>
     <? foreach ($brands as $brand): ?>
  <div class="card col-md-6 mb-3 mx-auto">
    <div class="card-body">
         <a href="<?= SITE_ROOT . 'brands/view/' . $brand['brand_id'] ?>">
        <img src="<?= $brand['image_url']; ?>" class="card-img" alt="<?= $brand['brand_name']; ?>">
        </a>
    </div>

</div>
    <? endforeach; ?>
<? include_once('./views/templates/footer.php'); ?>
