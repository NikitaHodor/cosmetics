<? include_once('./views/templates/header.php'); ?>

<h1> Бренды </h1>
 <? foreach ($brands as $brand): ?>
  <div class="card mb-3">
  <div class="row no-gutters">
    <div class="col-md-4">
      <img src="../assets/img/cosmetic2.jpg" class="card-img" alt="card-img">
    </div>
    <div class="col-md-8 my-auto">
      <div class="card-body">
        <h5 class="card-title text-center">
        <a href="<?= SITE_ROOT . 'brands/view/' . $brand['brand_id'] ?>">
        <?= $brand['brand_name']; ?>
        </a>
        </h5>
      </div>
    </div>
  </div>
</div>
    <? endforeach; ?>


<? include_once('./views/templates/footer.php'); ?>
