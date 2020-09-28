<? include_once('./views/templates/header.php'); ?>
<div class="container">
    <div class="container panel-service_items-container">
        <div class="row">
			<div class="col mt-1">
				<a class="btn btn-dark mb-1" href="<?= SITE_ROOT . 'admin/serviceItemsAdd' ?>" data-toggle="modal" data-target="#Modal"><i class="fa fa-plus"></i></a>
				<table class="table shadow ">
					<thead class="thead-dark">
						<tr>
							<th>№</th>
							<th>Название</th>
							<th>Цена</th>
							<th>Описание</th>
							<th>img</th>
							<th>Действие</th>
						</tr>
						<?php foreach ($serviceItems as $serviceItem): ?>
						<tr>
							<td><?=$serviceItem['id'] ?></td>
							<td><?=$serviceItem['name'] ?></td>
							<td><?=$serviceItem['price'] ?></td>
							<td><?=$serviceItem['description'] ?></td>
							<td><img style="width: 6rem;" src="<?= $serviceItem['image_url'] ?>" alt=""></td>
							<td>
								<a href="<?= SITE_ROOT . 'admin/serviceItemsEdit/' . $serviceItem['id'] ?>" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#editModal<?=$serviceItem['id'] ?>"><i class="fa fa-edit"></i></a>
								<a href="<?= SITE_ROOT . 'admin/serviceItemsDelete/' . $serviceItem['id'] ?>" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#deleteModal<?=$serviceItem['id'] ?>"><i class="fa fa-trash"></i></a>
								<? if(!$serviceItem['image_url']): ?>
                                <a href="<?= SITE_ROOT . 'admin/serviceItemsAddImg/' . $serviceItem['id'] ?>" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#ImageModal<?=$serviceItem['id'] ?>"><i class="fa fa-image"></i></a>
                                <? else : ?>
                                <a href="<?= SITE_ROOT . 'admin/serviceItemsEditImg/' . $serviceItem['id'] ?>" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#ImageEditModal<?=$serviceItem['id'] ?>"><i class="fa fa-image"></i></a>
                                <? endif; ?>
                                <?php require 'modal.php'; ?>
							</td>
						</tr>
						<? endforeach; ?>
					</thead>
				</table>
			</div>
		</div>
    </div>
    <!-- Modal -->
	<div class="modal fade" tabindex="-1" role="dialog" id="Modal">
	  <div class="modal-dialog modal-dialog-centered" role="document">
	    <div class="modal-content shadow">
	      <div class="modal-header">
	        <h5 class="modal-title">Добавить услугу</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <form action="<?= SITE_ROOT . 'admin/serviceItemsAdd' ?>" method="post">
	        	<div class="form-group">
	        		<input type="text" class="form-control" name="name" value="" placeholder="Название">
	        	</div>
	        	<div class="form-group">
                            <select class="form-control" name="service">
                                <? foreach ($services as $service): ?>
                                <option value="<?= $service['service_id'] ?>">
                                    <?=  $service['service_name']; ?>
                                </option>
                                <? endforeach ; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control" name="price" value="" placeholder="Цена">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="description" value="" placeholder="Описание">
                        </div>

	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
	        <button type="submit" name="add_submit" class="btn btn-primary">Добавить</button>
	      </div>
	  		</form>
	    </div>
	  </div>
	</div>

</div>
</div>

<? include_once('./views/templates/footer.php'); ?>
