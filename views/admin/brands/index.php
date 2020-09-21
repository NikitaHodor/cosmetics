<? include_once('./views/templates/header.php'); ?>
<div class="container">
    <div class="container panel-brands-container">
        <div class="row">
			<div class="col mt-1">
				<a class="btn btn-dark mb-1" href="<?= SITE_ROOT . 'admin/brandsAdd' ?>" data-toggle="modal" data-target="#Modal"><i class="fa fa-plus"></i></a>
				<table class="table shadow ">
					<thead class="thead-dark">
						<tr>
							<th>№</th>
							<th>Бренд</th>
							<th>img</th>
							<th>Действие</th>
						</tr>
						<?php foreach ($brands as $brand): ?>
						<tr>
							<td><?=$brand['brand_id'] ?></td>
							<td><?=$brand['brand_name'] ?></td>
							<td><img style="width: 6rem;" src="<?= $brand['image_url'] ?>" alt=""></td>
							<td>
								<a href="<?= SITE_ROOT . 'admin/brandsEdit/' . $brand['brand_id'] ?>" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#editModal<?=$brand['brand_id'] ?>"><i class="fa fa-edit"></i></a>
								<a href="<?= SITE_ROOT . 'admin/brandsDelete/' . $brand['brand_id'] ?>" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#deleteModal<?=$brand['brand_id'] ?>"><i class="fa fa-trash"></i></a>
								<? if(!$brand['image_url']): ?>
                                <a href="<?= SITE_ROOT . 'admin/brandsAddImg/' . $brand['brand_id'] ?>" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#ImageModal<?=$brand['brand_id'] ?>"><i class="fa fa-image"></i></a>
                                <? else : ?>
                                <a href="<?= SITE_ROOT . 'admin/brandsEditImg/' . $brand['brand_id'] ?>" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#ImageEditModal<?=$brand['brand_id'] ?>"><i class="fa fa-image"></i></a>
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
	        <h5 class="modal-title">Добавить бренд</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <form action="<?= SITE_ROOT . 'admin/brandsAdd' ?>" method="post">
	        	<div class="form-group">
	        		<input type="text" class="form-control" name="brand_name" value="" placeholder="Название">
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
