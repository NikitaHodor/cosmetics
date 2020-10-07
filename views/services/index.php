<? include_once('./views/templates/header.php'); ?>

 <? foreach ($services as $service): ?>
  <div class="card mb-3">
  <div class="row no-gutters">
    <div class="col-md-4">
      <img src="<?= $service['image_url']; ?>" class="card-img" alt="<?= $service['service_name']; ?>">
    </div>
    <div class="col-md-8 my-auto">
      <div class="card-body">
        <h5 class="card-title text-center">
        <a href="<?= SITE_ROOT . 'services/view/' . $service['service_id'] ?>" >
				 <?= $service['service_name']; ?>
                </a>
        </h5>
      </div>
    </div>
  </div>
</div>
    <? endforeach; ?>


<? include_once('./views/templates/footer.php'); ?>
