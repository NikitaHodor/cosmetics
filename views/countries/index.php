<? include_once('./views/templates/header.php'); ?>
<div id="wrap">
    <div id="main" class="container clear-top">

<h1> Страны </h1>
<table class="table table-hover">
	<thead>
		<tr>
			<th>
				ID
			</th>
			<th>
				Страна
			</th>
		</tr>
	</thead>
	<tbody>
		<? foreach ($countries as $country): ?>
			<tr>
				<td> <?= $country['country_id']; ?></td>
				<td> <?= $country['country_name']; ?></td>
			</tr>
		<? endforeach; ?>
	</tbody>
</table>
</div>
</div>
<? include_once('./views/templates/footer.php'); ?>
