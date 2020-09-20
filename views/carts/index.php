<? include_once('./views/templates/header.php'); ?>


<? if (!User::checkIfUserAuthorized()) : ?>
   <h3> Пожалуйста авторизуйтесь или зарегистрируйтесь! </h3>
   <? else: ?>
    <? if (!$cart): ?>
    <h3> Ваша корзина пуста</h3>
    <? else: ?>
    <? if (isset($errors) && !empty($errors)): ?>
    <div>
        <? foreach ($errors as $error): ?>
        <p class="error"> <?= $error; ?> </p>
        <? endforeach; ?>
    </div>
    <? endif; ?>
    <div class="row">
       <div class="container cart-container col-md-8">
        <form method="POST" class="cart-form">
            <div class="form-group">
                <label>Имя</label>
                <input type="text" class="form-control" name="user_name" value="<?= isset($_POST['user_name']) ? $_POST['user_name'] : ""; ?>">
            </div>
            <div class="form-group">
                <label>Телефон</label>
                <input type="text" class="form-control" name="user_phone" value="<?= isset($_POST['user_phone']) ? $_POST['user_phone']: ""; ?>">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="user_email" value="<?= isset($_POST['user_email']) ? $_POST['user_email']: ""; ?>">
            </div>
            <h3> Детали заказа: </h3>
            <table class="table">
                <thead>
                    <tr>
                        <th>
                            Название
                        </th>
                        <th>
                            Цена
                        </th>
                        <th>
                            Количество
                        </th>
                        <th>
                            Сумма
                        </th>
                    </tr>
                </thead>
                <tbody id="cartCont">
                    <? foreach ($cosmeticList as $cosmetic): ?>
                    <tr>
                        <td> <?= $cosmetic['cosmetic_name']; ?></td>
                        <td> <?= $cosmetic['cosmetic_price']; ?></td>
                        <td><a class="btn btn-sm" onclick="delFromCart(<?= $cosmetic['cosmetic_id'] ?> , '<?= SITE_ROOT; ?>')">-</a> <?= $cart[$cosmetic['cosmetic_id']]; ?> <a class="btn btn-sm" onclick="addToCart(<?= $cosmetic['cosmetic_id'] ?> , '<?= SITE_ROOT; ?>')">+</a></td>
                        <td> <?= $cosmetic['cosmetic_price'] * $cart[$cosmetic['cosmetic_id']]; ?></td>
                    </tr>
                    <? endforeach; ?>
                </tbody>
            </table>

                <button name="submit" type="submit" class="btn btn-secondary">Заказать</button>

        </form>
        </div>
    </div>

<? endif; ?>
<? endif; ?>

<? include_once('./views/templates/footer.php'); ?>
