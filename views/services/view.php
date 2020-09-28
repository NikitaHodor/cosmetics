<? include_once('./views/templates/header.php'); ?>
<? foreach ($service_items as $service_item): ?>
<div class="card mb-3">
  <div class="row no-gutters">
    <div class="col-md-4">
      <img src="<?= $service_item['image_url']; ?>" class="card-img" alt="card-img">
    </div>
    <div class="col-md-8 my-auto">
      <div class="card-body">
        <h5 class="card-title"><?= $service_item['name']; ?></h5>
	    <p class="card-text"><?= $service_item['description']; ?></p>
	    <hr class="card_hr">
	    <p class="card-price">Цена от: <?= $service_item['price']; ?> &#8381;</p>
	    <? if (User::checkIfUserAuthorized()) : ?>
	    <div class="row">
	    	<a class="btn btn-secondary" data-toggle="modal" data-target="#Modal">запись к специалисту </a>
	    </div>
	    <? endif; ?>
      </div>
    </div>
  </div>
</div>
<? endforeach; ?>

<!-- Modal -->
	<div class="modal fade" tabindex="-1" role="dialog" id="Modal">
	  <div class="modal-dialog modal-dialog-centered" role="document">
	    <div class="modal-content shadow">
	      <div class="modal-header">
	        <h5 class="modal-title">Расписание</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">


	        		<div class="timetable"></div>

	    </div>
	  </div>
	</div>

</div>

<? include_once('./views/templates/footer.php'); ?>
