<? include_once('./views/templates/header.php'); ?>

<div id="wrap">
    <div id="main" class="container clear-top">
<h1> Каталог </h1>
 <? foreach ($categories as $category): ?>
  <div class="card mb-3">
  <div class="row no-gutters">
    <div class="col-md-4">
      <img src="../assets/img/cosmetic2.jpg" class="card-img" alt="card-img">
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
    </div>
</div>

<? include_once('./views/templates/footer.php'); ?>
