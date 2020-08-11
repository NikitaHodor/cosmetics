<? include_once('./views/templates/header.php'); ?>
<h1> Косметика по запросу </h1>
<table class="table table-hover">
	<thead>
		<tr>
			<th>
				Косметика
			</th>
		</tr>
	</thead>
	<tbody>
		<? foreach ($searchResults as $searchResult): ?>
			<tr>
				<td> <?= $searchResult['cosmetic_name']; ?></td>
			</tr>
		<? endforeach; ?>
	</tbody>
</table>
<? include_once('./views/templates/footer.php'); ?>
