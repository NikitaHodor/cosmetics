<? include_once('./views/templates/header.php'); ?>
<h1> Салон </h1>
<table class="table table-hover"> 
	<thead> 
		<tr> 
			<th>
				ID 
			</th>
			<th>
				Услуга  
			</th>
		</tr>
	</thead>
	<tbody> 
		<? foreach ($services as $service): ?>
			<tr> 
				<td> <?= $service['service_id']; ?></td>
				<td>
				<a href="<?= SITE_ROOT . 'services/view/' . $service['service_id'] ?>" >
				 <?= $service['service_name']; ?>
                </a>
                </td>
			</tr>
		<? endforeach; ?>
	</tbody>
</table>
<? include_once('./views/templates/footer.php'); ?>