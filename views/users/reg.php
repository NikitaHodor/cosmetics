<? include_once('./views/templates/header.php'); ?>


<? if (isset($errors) && !empty($errors)): ?>
<div>
    <? foreach ($errors as $error): ?>
    <p class="error"> <?= $error; ?> </p>
    <? endforeach; ?>
</div>
<? endif; ?>
<div class="container reg-container col-md-6">
<form method="POST" class="reg-form">
  <div class="form-group">
    <label for="user_login">Логин</label>
    <input required type="text" class="form-control" name="user_login"
    value="<?= isset($_POST['user_login']) ? $_POST['user_login'] : ""; ?>">
  </div>
  <div class="form-group">
    <label for="user_password">Пароль</label>
    <input required type="password" class="form-control" name="user_password"
    value="<?= isset($_POST['user_password']) ? $_POST['user_password'] : ""; ?>">
  </div>
  <div class="form-group">
    <label for="cosmetic_volume">Повторите пароль</label>
    <input required type="password" class="form-control" name="user_password_repeat"
    value="<?= isset($_POST['user_password_repeat']) ? $_POST['user_password_repeat'] : ""; ?>">
  </div>
  <div class="form-group">
    <label for="terms_of_usage">Согласие на обработку данных</label>
    <input required type="checkbox" name="terms_of_usage">
  </div>
  
  <button type="submit" class="btn btn-secondary">Зарегистрироваться</button>
</form>
</div>

<? include_once('./views/templates/footer.php'); ?>
