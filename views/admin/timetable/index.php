<? include_once('./views/templates/header.php'); ?>
<div class="container">
    <div class="container panel-timetable-container">
        <div class="timetable"></div>
    </div>
    <!-- Modal -->
	<div class="modal fade" tabindex="-1" role="dialog" id="Modal">
	  <div class="modal-dialog modal-dialog-centered" role="document">
	    <div class="modal-content shadow">
	      <div class="modal-header">
	        <h5 class="modal-title">Записаться на</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <form action="" method="post">
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
	        <button type="submit" name="add_submit" class="btn btn-primary">Подтвердить</button>
	      </div>
	  		</form>
	    </div>
	  </div>
	</div>

</div>
</div>

<? include_once('./views/templates/footer.php'); ?>
