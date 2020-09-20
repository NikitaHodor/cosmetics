<? include_once('./views/templates/header.php'); ?>

<table class="table table-hover">
	<thead>
		<tr>
			<th>
				ID
			</th>
			<th>
				Тип
			</th>
		</tr>
	</thead>
	<tbody>
		<? foreach ($types as $type): ?>
			<tr>
				<td> <?= $type['type_id']; ?></td>
				<td> <?= $type['type_name']; ?></td>
			</tr>
		<? endforeach; ?>
	</tbody>
</table>

<? include_once('./views/templates/footer.php'); ?>
