<? include_once('./views/templates/header.php'); ?>
<div id="wrap">
    <div id="main" class="container clear-top">

<h1> Типы </h1>
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
</div>
</div>
<? include_once('./views/templates/footer.php'); ?>
