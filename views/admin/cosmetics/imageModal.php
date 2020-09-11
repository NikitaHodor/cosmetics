<!-- Modal image -->
<div class="modal fade" id="ImageModal<?=$cosmetic['cosmetic_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content shadow">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">добавить изображение  товара № <?=$cosmetic['cosmetic_id'] ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
	        <form enctype="multipart/form-data" action="<?= SITE_ROOT . 'admin/cosmetics/' . $cosmetic['cosmetic_id'] ?>" method="post">
	        	<div class="form-group">
	        		<input type="file" class="form-control" name="upload_image">
	        	</div>

	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
	        <button type="submit" name="image_add_submit" class="btn btn-primary">Добавить</button>
	      </div>
	  		</form>
	    </div>
        </div>
    </div>
</div>


<!-- Modal image update -->
<div class="modal fade" id="ImageModalUpdate<?=$cosmetic['cosmetic_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content shadow">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">изменить изображение товара № <?=$cosmetic['cosmetic_id'] ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
	        <form enctype="multipart/form-data" action="<?= SITE_ROOT . 'admin/cosmetics/' . $cosmetic['cosmetic_id'] ?>" method="post">
	        	<div class="form-group">
	        		<input type="file" class="form-control" name="upload_image">
	        	</div>

	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
	        <button type="submit" name="image_update_submit" class="btn btn-primary">Добавить</button>
	      </div>
	  		</form>
	    </div>
        </div>
    </div>
</div>
