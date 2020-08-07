<? include_once('./views/templates/header.php'); ?>
<h1> Каталог </h1>
<table class="table table-hover"> 
	<thead> 
		<tr> 
			<th>
				ID 
			</th>
			<th>
				Категория  
			</th>
		</tr>
	</thead>
	<tbody> 
		<? foreach ($categories as $category): ?>
			<tr> 
				<td> <?= $category['category_id']; ?></td>
				<td>
				<a href="<?= SITE_ROOT . 'categories/view/' . $category['category_id'] ?>" >
				 <?= $category['category_name']; ?>
                </a>
                </td>
			</tr>
		<? endforeach; ?>
	</tbody>
</table>
<? include_once('./views/templates/footer.php'); ?>