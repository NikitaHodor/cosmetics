<? include_once('./views/templates/header.php'); ?>

	<? if (!$cart): ?>
		<h3> Ваша корзина пуста</h3>
	<? else: ?>
		<div class="container"> 
			<div class="row">
				<form method="POST">
					<div class="form-group">
					    <label>Имя</label>
					    <input type="text" class="form-control" name="user_name" 
					    	value="<?= isset($_POST['user_name']) ? $_POST['user_name'] : ""; ?>">
					</div>
					<div class="form-group">
					    <label>Телефон</label>
					    <input type="text" class="form-control" name="user_phone" 
					    	value="<?= isset($_POST['user_phone']) ? $_POST['user_phone']: ""; ?>">
					</div> 
					<div class="form-group">
					    <label>Email</label>
					    <input type="email" class="form-control" name="user_email" 
					    	value="<?= isset($_POST['user_email']) ? $_POST['user_email']: ""; ?>">
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
									Цена за ед.
								</th>
								<th>
									Количество  
								</th>
								<th>
									Общая сумма 
								</th>
							</tr>
						</thead>
						<tbody> 
							<? foreach ($cosmeticList as $cosmetic): ?>
								<tr> 
									<td> <?= $cosmetic['cosmetic_id']; ?></td>
									<td> <?= $cosmetic['cosmetic_name']; ?></td>
									<td> <?= $cosmetic['cosmetic_price']; ?></td>
									<td> <?= $cart[$cosmetic['cosmetic_id']]; ?></td>
									<td> <?= $cosmetic['cosmetic_price'] * $cart[$cosmetic['cosmetic_id']]; ?></td>
								</tr>
							<? endforeach; ?>
						</tbody>
					</table>
					<div class="row">
						<button type="submit" class="btn btn-primary">Заказать</button> 
					</div>
				</form>
			</div>
			
		</div>
	<? endif; ?>

<? include_once('./views/templates/footer.php'); ?>