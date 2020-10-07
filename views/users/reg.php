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
  <div class="form-group text-center">
    <button type="submit" class="btn btn-secondary">Зарегистрироваться</button>
  </div>
  <div class="form-group text-center">
    <label for="terms_of_usage"><small>Согласие на обработку данных</small></label>
    <input required type="checkbox" name="terms_of_usage">
  </div>
  

</form>
</div>

<? include_once('./views/templates/footer.php'); ?>
