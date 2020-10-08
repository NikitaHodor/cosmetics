<? include_once('./views/templates/header.php'); ?>
<div class="container">
    <div class="container panel-images-container">
        <div class="row">
			<div class="col mt-1">

				<table class="table shadow">
                    <thead class="thead-dark">
                        <tr>
                            <th>img</th>
                        </tr>
                        <?php foreach ($images as $image): ?>
                        <tr>
                            <td>
                            <img style="width: 6rem;" src="<?= $image ?>" alt="">
                            </td>
                        </tr>
                        <? endforeach; ?>
                    </thead>
                </table>
			</div>
		</div>
    </div>
</div>

<? include_once('./views/templates/footer.php'); ?>
