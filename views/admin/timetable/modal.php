<!-- Modal Edit-->
<div class="modal fade" id="editModal<?=$timetable['timetable_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content shadow">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Редактировать запись № <?=$timetable['timetable_id'] ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= SITE_ROOT . 'admin/timetableEdit/' . $timetable['timetable_id'] ?>" method="post">
        	<div class="form-group">
                   <label for="spec">Специалист</label>
                   <select name="spec">
                       <? foreach ($services as $serv): ?>
                    <option value="<?= $serv['specialist_id'] ?>"><?= $serv['specialist_name']; ?></option>
                    <? endforeach; ?>
                   </select>

                </div>
                <div class="form-group">
                   <label for="servItem">Услуга</label>
                   <select name="servItem">
                       <? foreach ($serviceItems as $servItem): ?>
                    <option value="<?= $servItem['id'] ?>"><?= $servItem['name']; ?></option>
                    <? endforeach; ?>
                   </select>

                </div>
                <div class="form-group">
                   <label for="status">Статус</label>
                   <select name="status">
                    <option value="запись">запись</option>
                    <option value="свободно">свободно</option>
                   </select>
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
<div class="modal fade" id="deleteModal<?=$timetable['timetable_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content shadow">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Удалить запись № <?=$timetable['timetable_id'] ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
        <form action="<?= SITE_ROOT . 'admin/timetableDelete/' . $timetable['timetable_id'] ?>" method="post">
        	<button type="submit" name="delete_submit" class="btn btn-danger">Удалить</button>
    	</form>
      </div>
    </div>
  </div>
</div>
