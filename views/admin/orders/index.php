<? include_once('./views/templates/header.php'); ?>
<div class="container">
    <div class="container panel-orders-container">
        <div class="row">
			<div class="col mt-1">

				<table class="table shadow">
					<thead class="thead-dark">
						<tr>
							<th>№</th>
							<th>Товар</th>
							<th>Количество</th>
							<th>Цена</th>
							<th>Данные</th>
						</tr>
						<?php foreach ($orders as $order): ?>
						<tr>
							<td><?=$order['order_id'] ?></td>
							<td><?=$order['cosmetic_name'] ?></td>
							<td><?= $order['cart_count'] ?></td>
							<td><?= $order['cart_count'] * $order['cosmetic_price'] ?> &#8381;</td>
                            <td><?= $order['order_info'] ?></td>
						</tr>
						<? endforeach; ?>
					</thead>
				</table>
			</div>
		</div>
    </div>
</div>

<? include_once('./views/templates/footer.php'); ?>
