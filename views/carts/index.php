<? include_once('./views/templates/header.php'); ?>



    <? if (!$cart): ?>
    <h3> Ваша корзина пуста</h3>
    <? else: ?>
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
                            ID
                        </th>
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
                        <th>
                            Действие
                        </th>
                    </tr>
                </thead>
                <tbody id="cartCont">
                    <? foreach ($cosmeticList as $cosmetic): ?>
                    <tr>
                        <td> <?= $cosmetic['cosmetic_id']; ?></td>
                        <td> <?= $cosmetic['cosmetic_name']; ?></td>
                        <td> <?= $cosmetic['cosmetic_price']; ?></td>
                        <td> <?= $cart[$cosmetic['cosmetic_id']]; ?></td>
                        <td> <?= $cosmetic['cosmetic_price'] * $cart[$cosmetic['cosmetic_id']]; ?></td>
                        <td><a class="btn btn-danger" onclick="delFromCart(<?= $cosmetic['cosmetic_id'] ?> , '<?= SITE_ROOT; ?>')">Убрать</a></td>
                    </tr>
                    <? endforeach; ?>
                </tbody>
            </table>
            <div class="container">
                <button type="submit" class="btn btn-secondary">Заказать</button>
            </div>
        </form>
        </div>
    </div>

<? endif; ?>


<? include_once('./views/templates/footer.php'); ?>
