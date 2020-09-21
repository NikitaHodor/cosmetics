<? include_once('./views/templates/header.php'); ?>
<div class="container">
    <div class="container panel-users-container">
        <div class="row">
			<div class="col mt-1">
				<a class="btn btn-dark mb-1" href="<?= SITE_ROOT . 'admin/usersAdd' ?>" data-toggle="modal" data-target="#Modal"><i class="fa fa-user-plus"></i></a>
				<table class="table shadow ">
					<thead class="thead-dark">
						<tr>
							<th>№</th>
							<th>Логин</th>
							<th>Доступ</th>
							<th>Действие</th>
						</tr>
						<?php foreach ($users as $user): ?>
						<tr>
							<td><?=$user['user_id'] ?></td>
							<td><?=$user['user_login'] ?></td>
							<td><?= $user['user_is_admin'] ? 'администратор':'пользователь'; ?></td>
							<td>
								<a href="<?= SITE_ROOT . 'admin/usersEdit/' . $user['user_id'] ?>" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#editModal<?=$user['user_id'] ?>"><i class="fa fa-edit"></i></a>
								<a href="<?= SITE_ROOT . 'admin/usersDelete/' . $user['user_id'] ?>" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#deleteModal<?=$user['user_id'] ?>"><i class="fa fa-trash"></i></a>
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
	        <h5 class="modal-title">Добавить пользователя</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body modal-form">
<!-- delete! form action -->
	        <form action="<?= SITE_ROOT . 'admin/usersAdd' ?>" method="post">
	        	<div class="form-group">
	        		<input type="text" class="form-control" name="user_login" value="" placeholder="Логин">
	        	</div>
	        	<div class="form-group">
	        		<input type="text" class="form-control" name="user_password" value="" placeholder="пароль">
	        	</div>
	        	<div class="form-group">
	        		<select class="form-control" name="user_is_admin">
                            <option value="1">
                                администратор
                            </option>
                            <option value="0">
                                пользователь
                            </option>
                        </select>
	        	</div>

	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
	        <button name="add_submit" class="btn btn-primary">Добавить</button>
<!-- onclick="sendAjax(event, 'user')"  -->
	      </div>
	  		</form>
	    </div>
	  </div>
	</div>

</div>
</div>

<? include_once('./views/templates/footer.php'); ?>
