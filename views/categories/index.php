<? include_once('./views/templates/header.php'); ?>

 <? foreach ($categories as $category): ?>
  <div class="card mb-3">
  <div class="row no-gutters">
    <div class="col-md-4">
      <img src="<?= $category['image_url'] ?>" class="card-img" alt="<?= $category['category_name']; ?>">
    </div>
    <div class="col-md-8 my-auto">
      <div class="card-body">
        <h5 class="card-title text-center">
        <a href="<?= SITE_ROOT . 'categories/view/' . $category['category_id'] ?>">
        <?= $category['category_name']; ?>
        </a>
        </h5>
      </div>
    </div>
  </div>
</div>
    <? endforeach; ?>


<? include_once('./views/templates/footer.php'); ?>
