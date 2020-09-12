<? include_once('./views/templates/header.php'); ?>
<div class="container">
   <? if (isset($errors) && !empty($errors)): ?>
    <div>
        <? foreach ($errors as $error): ?>
        <p class="error"> <?= $error; ?> </p>
        <? endforeach; ?>
    </div>
    <? endif; ?>
    <h1> Категории каталога </h1>
    <div class="container panel-categories-container">
        <div class="row">
			<div class="col mt-1">
				<button class="btn btn-success mb-1" data-toggle="modal" data-target="#Modal"><i class="fa fa-plus"></i></button>
				<table class="table shadow ">
					<thead class="thead-dark">
						<tr>
							<th>№</th>
							<th>Название</th>
							<th>img</th>
							<th>Действие</th>
						</tr>
						<?php foreach ($categories as $category): ?>
						<tr>
							<td><?=$category['category_id'] ?></td>
							<td><?=$category['category_name'] ?></td>
							<td><img style="width: 6rem;" src="<?=$category['image_url'] ?>" alt=""></td>
							<td>
								<a href="<?= SITE_ROOT . 'admin/categories/' . $category['category_id'] ?>" class="btn btn-success btn-sm" data-toggle="modal" data-target="#editModal<?=$category['category_id'] ?>"><i class="fa fa-edit"></i></a>
								<a href="<?= SITE_ROOT . 'admin/categories/' . $category['category_id'] ?>" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal<?=$category['category_id'] ?>"><i class="fa fa-trash"></i></a>
								<a href="<?= SITE_ROOT . 'admin/categories/' . $category['category_id'] ?>" class="btn btn-success btn-sm" data-toggle="modal" data-target="#ImageModal<?=$category['category_id'] ?>"><i class="fa fa-image"></i></a>
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
	        <h5 class="modal-title">Добавить категорию</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <form action="" method="post">
	        	<div class="form-group">
	        		<input type="text" class="form-control" name="category_name" value="" placeholder="Название">
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
