<? include_once('./views/templates/header.php'); ?>


<? if (!$search): ?>
		<h3> Введите поисковой запрос</h3>
	<? else: ?>
<h1> Косметика по запросу </h1>
<table class="table table-hover">
	<thead>
		<tr>
			<th>
				Наименование
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
<? endif; ?>

<? include_once('./views/templates/footer.php'); ?>
