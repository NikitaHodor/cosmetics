<? include_once('./views/templates/header.php'); ?>
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
<? include_once('./views/templates/footer.php'); ?>