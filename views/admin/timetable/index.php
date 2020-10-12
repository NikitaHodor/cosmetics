<? include_once('./views/templates/header.php'); ?>
<div class="container">
   <div class="spec-list container">
       <nav aria-label="Page navigation">
  <ul class="pagination justify-content-center">
    <? foreach ($services as $serv): ?>
    <li class="page-item">
    <a class="page-link" href="<?= SITE_ROOT . 'timetable/' . $serv['service_id'] ?>"><?= $serv['specialist_name']; ?></a>
    </li>
    <? endforeach; ?>
    <li class="page-item">
    <a class="btn btn-dark mb-1" href="<?= SITE_ROOT . 'admin/timetableAdd' ?>" data-toggle="modal" data-target="#Modal"><i class="fa fa-plus"></i></a>
    </li>
  </ul>
</nav>
   </div>

<!--
    <div class="container panel-timetable-container">
        <div class="timetable"></div>
    </div>
-->


    <!-- Modal -->
	<div class="modal fade" tabindex="-1" role="dialog" id="Modal">
	  <div class="modal-dialog modal-dialog-centered" role="document">
	    <div class="modal-content shadow">
	      <div class="modal-header">
	        <h5 class="modal-title">Добавить время для записи</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <form action="<?= SITE_ROOT . 'admin/timetableAdd' ?>" method="post">
	        <div class="form-group">
                   <label for="spec">Специалист</label>
                   <select name="spec">
                       <? foreach ($services as $serv): ?>
                    <option value="<?= $serv['specialist_id'] ?>"><?= $serv['specialist_name']; ?></option>
                    <? endforeach; ?>
                   </select>

                </div>
	        	<div class="form-group">
	        	<label for="day">День недели</label>
	        	<select name="day" id="datesArr"></select>
	        	<script>
                    function calendarMaker(dateArr = []) {
    const d = new Date();
    let date = d.getDate();
    const month = d.getMonth();
    const year = d.getFullYear();
    const daysInMonth = new Date(year, month + 1, 0).getDate();
    const weekLength = 7;
    //    let dateArr = [];

    function getSevenDays(date, counter = 0) {
        if (date > daysInMonth || counter >= weekLength) {
            return dateArr;
        } else {
            dateArr.push(date);
            getSevenDays(date + 1, counter + 1);
        }

    }
    getSevenDays(date);

    dateArr.forEach(function (element, index) {
        dateArr[index] = `${year}-${month+1}-${element}`;
    });

    return dateArr;
}
                    let arr = calendarMaker();
                    let thatSelect = document.getElementById('datesArr');

                    arr.forEach(function(elem){
                        let opt = document.createElement('option');
                        thatSelect.append(opt);
                        opt.appendChild(document.createTextNode(elem));
                    })
                    </script>
	        	</div>
                <div class="form-group">
                   <label for="start-time">Начало</label>
                    <input type="time" name="start-time" min="09:00" max="21:00">
                </div>
                <div class="form-group">
                   <label for="end-time">Конец</label>
                    <input type="time" name="end-time" min="09:00" max="21:00">
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
