<!-- Modal Edit-->
<div class="modal fade" id="editModal<?=$serviceItem['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content shadow">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Редактировать запись № <?= $serviceItem['id'] ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= SITE_ROOT . 'admin/serviceItemsEdit/' . $serviceItem['id'] ?>" method="post">
                    <div class="form-group">
	        		<input type="text" class="form-control" name="edit_name" value="<?= $serviceItem['name'] ?>" placeholder="Название">
	        	</div>
	        	<div class="form-group">
                            <select class="form-control" name="edit_service">
                                <? foreach ($services as $service): ?>
                                <option value="<?= $service['service_id'] ?>">
                                    <?=  $service['service_name']; ?>
                                </option>
                                <? endforeach ; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control" name="edit_price" value="<?= $serviceItem['price'] ?>" placeholder="Цена">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="edit_description" value="<?= $serviceItem['description'] ?>" placeholder="Описание">
                        </div>
                    <div class="modal-footer">
                        <button type="submit" name="edit-submit" class="btn btn-primary">Обновить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- DELETE MODAL -->
<div class="modal fade" id="deleteModal<?=$serviceItem['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content shadow">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Удалить запись № <?=$serviceItem['id'] ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                <form action="<?= SITE_ROOT . 'admin/serviceItemsDelete/' . $serviceItem['id'] ?>" method="post">
                    <button type="submit" name="delete_submit" class="btn btn-danger">Удалить</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal image -->
<div class="modal fade" id="ImageModal<?=$serviceItem['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content shadow">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">добавить изображение  услуге № <?=$serviceItem['id'] ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
	        <form enctype="multipart/form-data" action="<?= SITE_ROOT . 'admin/serviceItemsAddImg/' . $serviceItem['id'] ?>" method="post">
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
<!-- Modal edit image -->
<div class="modal fade" id="ImageEditModal<?=$serviceItem['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content shadow">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Изменить изображение  услуги № <?=$serviceItem['id'] ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
	        <form enctype="multipart/form-data" action="<?= SITE_ROOT . 'admin/serviceItemsEditImg/' . $serviceItem['id'] ?>" method="post">
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
