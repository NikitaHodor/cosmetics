<? include_once('./views/templates/header.php'); ?>
<div class="container">
    <? if (isset($errors) && !empty($errors)): ?>
    <div>
        <? foreach ($errors as $error): ?>
        <p class="error"> <?= $error; ?> </p>
        <? endforeach; ?>
    </div>
    <? endif; ?>
    <h1> Изображения на сервере</h1>
    <div class="container panel-images-container">
        <div class="row">
            <div class="col mt-1">
<!--                <button class="btn btn-success mb-1" data-toggle="modal" data-target="#Modal"><i class="fa fa-plus"></i></button>-->
                <table class="table shadow ">
                    <thead class="thead-dark">
                        <tr>
                            <th>img</th>
                        </tr>
                        <?php foreach ($images as $image): ?>
                        <tr>
                            <td>
                            <img style="width: 6rem;" src="<?= $image ?>" alt="">
                            </td>
<!--
                            <td>
                                <a href="<?= SITE_ROOT . 'admin/images/' . $image['image_id'] ?>" class="btn btn-success btn-sm" data-toggle="modal" data-target="#editModal<?=$image['image_id'] ?>"><i class="fa fa-edit"></i></a>
                                <a href="<?= SITE_ROOT . 'admin/images/' . $image['image_id'] ?>" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal<?=$image['image_id'] ?>"><i class="fa fa-trash"></i></a>
                                <a href="<?= SITE_ROOT . 'admin/images/' . $image['image_id'] ?>" class="btn btn-success btn-sm" data-toggle="modal" data-target="#ImageModal<?=$image['image_id'] ?>"><i class="fa fa-image"></i></a>

                            </td>
-->
                        </tr>
                        <? endforeach; ?>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <? include_once('./views/templates/footer.php'); ?>
