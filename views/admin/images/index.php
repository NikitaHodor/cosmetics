<? include_once('./views/templates/header.php'); ?>
<div class="container">
   <? if (isset($errors) && !empty($errors)): ?>
    <div>
        <? foreach ($errors as $error): ?>
        <p class="error"> <?= $error; ?> </p>
        <? endforeach; ?>
    </div>
    <? endif; ?>
    <div class="container panel-images-container">
        <div class="row">
			<div class="col mt-1">

				<table class="table shadow">
                    <thead class="thead-dark">
                        <tr>
                            <th>img</th>
                            <th>Действие</th>
                        </tr>
                        <?php foreach ($images as $image): ?>
                        <tr>
                            <td>
                            <img style="width: 6rem;" src="<?= $image ?>" alt="">
                            </td>
                            <td>
                                <a href="" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#ImageEditModal"><i class="fa fa-image"></i></a>
                            </td>
                        </tr>
                        <? endforeach; ?>
                    </thead>
                </table>
			</div>
		</div>
    </div>
</div>

<!-- Modal edit image -->
<div class="modal fade" id="ImageEditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content shadow">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Изменить изображение?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
	        <form enctype="multipart/form-data" action="<?= SITE_ROOT . 'admin/staticEditImg/' . $image ?>" method="post">
	        	<div class="form-group">
	        		<input type="file" class="form-control" name="upload_image">
	        	</div>

	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
	        <button type="submit" name="image_edit_submit" class="btn btn-primary">Добавить</button>
	      </div>
	  		</form>
	    </div>
        </div>
    </div>
</div>


<? include_once('./views/templates/footer.php'); ?>
