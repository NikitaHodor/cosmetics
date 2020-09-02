<? include_once('./views/templates/header.php'); ?>


	<? if (isset($errors) && !empty($errors)): ?>
		<div> 
			<? foreach ($errors as $error): ?>
				<p class="error"> <?= $error; ?> </p>
			<? endforeach; ?>
		</div>
	<? endif; ?>
	<div class="container auth-container col-md-6">
	<form method="POST" class="auth-form">
		<div class="form-group">
		    <label>Логин</label>
		    <input type="text" class="form-control" name="user_login" 
		    	value="<?= isset($_POST['user_login']) ? $_POST['user_login'] : ""; ?>">
		</div>
		<div class="form-group">
		    <label>Пароль</label>
		    <input type="password" class="form-control" name="user_password" 
		    	value="<?= isset($_POST['user_password']) ? $_POST['user_password']: ""; ?>">
		</div>
	    <button type="submit" class="btn btn-secondary">Авторизироваться</button>
	</form>
	</div>

<? include_once('./views/templates/footer.php'); ?>
