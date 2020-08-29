<? include_once('./views/templates/header.php'); ?>
<div id="wrap">
    <div id="main" class="container clear-top">
<h1> Бренды </h1>
<table class="table table-hover"> 
	<thead> 
		<tr> 
			<th>
				ID 
			</th>
			<th>
				Бренд  
			</th>
		</tr>
	</thead>
	<tbody> 
		<? foreach ($brands as $brand): ?>
			<tr> 
				<td> <?= $brand['brand_id']; ?></td>
				<td> <?= $brand['brand_name']; ?></td>
			</tr>
		<? endforeach; ?>
	</tbody>
</table>
</div>
</div>
<? include_once('./views/templates/footer.php'); ?>
