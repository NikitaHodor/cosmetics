<!-- Modal Edit-->
<div class="modal fade" id="editModal<?=$cosmetic['cosmetic_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content shadow">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Редактировать запись № <?= $cosmetic['cosmetic_id'] ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= SITE_ROOT . 'admin/cosmetics/' . $cosmetic['cosmetic_id'] ?>" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" name="edit_cosmetic_name" value="<?=$cosmetic['cosmetic_name'] ?>" placeholder="Наименование">
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="edit_cosmetic_type">
                            <? foreach ($types as $type): ?>
                            <option value="<?= $type['type_id']; ?>">
                                <?=  $type['type_name']; ?>
                            </option>
                            <? endforeach ; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="edit_cosmetic_category">
                            <? foreach ($categories as $category): ?>
                            <option value="<?= $category['category_id'] ?>">
                                <?=  $category['category_name']; ?>
                            </option>
                            <? endforeach ; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="edit_cosmetic_brand">
                            <? foreach ($brands as $brand): ?>
                            <option value="<?= $brand['brand_id']; ?>">
                                <?= $brand['brand_name'] ?>
                            </option>
                            <? endforeach ; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="edit_cosmetic_price" value="<?=$cosmetic['cosmetic_price'] ?>" placeholder="Цена">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="edit_cosmetic_volume" value="<?=$cosmetic['cosmetic_volume'] ?>" placeholder="Объём">
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="edit_cosmetic_country">
                            <? foreach ($countries as $country): ?>
                            <option value="<?=  $country['country_id']; ?>">
                                <?=  $country['country_name']; ?>
                            </option>
                            <? endforeach ; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="edit_cosmetic_description" value="<?=$cosmetic['cosmetic_description'] ?>" placeholder="Описание">
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
<div class="modal fade" id="deleteModal<?=$cosmetic['cosmetic_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content shadow">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Удалить запись № <?=$cosmetic['cosmetic_id'] ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                <form action="<?= SITE_ROOT . 'admin/cosmetics/' . $cosmetic['cosmetic_id'] ?>" method="post">
                    <button type="submit" name="delete_submit" class="btn btn-danger">Удалить</button>
                </form>
            </div>
        </div>
    </div>
</div>
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
<!-- Modal edit image -->
<div class="modal fade" id="ImageEditModal<?=$cosmetic['cosmetic_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content shadow">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Изменить изображение  товара № <?=$cosmetic['cosmetic_id'] ?></h5>
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
	        <button type="submit" name="image_edit_submit" class="btn btn-primary">Добавить</button>
	      </div>
	  		</form>
	    </div>
        </div>
    </div>
</div>
