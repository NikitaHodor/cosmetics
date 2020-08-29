<? include_once('./views/templates/header.php'); ?>
<div id="wrap">
    <div id="main" class="container clear-top">

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
</div>
</div>
<? include_once('./views/templates/footer.php'); ?>
