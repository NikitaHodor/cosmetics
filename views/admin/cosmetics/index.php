<? include_once('./views/templates/header.php'); ?>
<div class="container">
    <? if (isset($errors) && !empty($errors)): ?>
    <div>
        <? foreach ($errors as $error): ?>
        <p class="error"> <?= $error; ?> </p>
        <? endforeach; ?>
    </div>
    <? endif; ?>
    <h1> Товары </h1>
    <div class="container panel-cosmetics-container">
        <div class="row">
            <div class="col mt-1">
                <button class="btn btn-success mb-1" data-toggle="modal" data-target="#Modal"><i class="fa fa-plus"></i></button>
                <table class="table shadow ">
                    <thead class="thead-dark">
                        <tr>
                            <th>№</th>
                            <th>Наименование</th>
                            <!--
                            <th>Тип</th>
                            <th>Категория</th>
                            <th>Бренд</th>-->
                            <th>Цена</th>
                            <th>Объём</th>
                            <!--<th>Страна</th>-->
                            <th>Описание</th>
                            <th>img</th>
                            <th>Действие</th>
                        </tr>
                        <?php foreach ($cosmetics as $cosmetic): ?>
                        <tr>
                            <td><?=$cosmetic['cosmetic_id'] ?></td>
                            <td><?=$cosmetic['cosmetic_name'] ?></td>
                            <!--
                            <td><?=$cosmetic['cosmetic_type_id'] ?></td>
                            <td><?=$cosmetic['cosmetic_category_id'] ?></td>
                            <td><?=$cosmetic['cosmetic_brand_id'] ?></td>
-->
                            <td><?=$cosmetic['cosmetic_price'] ?></td>
                            <td><?=$cosmetic['cosmetic_volume'] ?></td>
                            <!--                            <td><?=$cosmetic['cosmetic_country_id'] ?></td>-->
                            <td><?=$cosmetic['cosmetic_description'] ?></td>
                            <td><img style="width: 6rem;" src="<?=$cosmetic['image_url'] ?>" alt=""></td>
                            <td>
                                <a href="<?= SITE_ROOT . 'admin/cosmetics/' . $cosmetic['cosmetic_id'] ?>" class="btn btn-success btn-sm" data-toggle="modal" data-target="#editModal<?=$cosmetic['cosmetic_id'] ?>"><i class="fa fa-edit"></i></a>
                                <a href="<?= SITE_ROOT . 'admin/cosmetics/' . $cosmetic['cosmetic_id'] ?>" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal<?=$cosmetic['cosmetic_id'] ?>"><i class="fa fa-trash"></i></a>
                                <a href="<?= SITE_ROOT . 'admin/cosmetics/' . $cosmetic['cosmetic_id'] ?>" class="btn btn-success btn-sm" data-toggle="modal" data-target="#ImageModal<?=$cosmetic['cosmetic_id'] ?>"><i class="fa fa-image"></i></a>
                                <?php require 'modal.php'; ?>
                            </td>
                        </tr>
                        <? endforeach; ?>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" tabindex="-1" role="dialog" id="Modal">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content shadow">
                <div class="modal-header">
                    <h5 class="modal-title">Добавить товар</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" name="cosmetic_name" value="" placeholder="Наименование">
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="cosmetic_type">
                                <? foreach ($types as $type): ?>
                                <option value="<?= $type['type_id']; ?>">
                                    <?=  $type['type_name']; ?>
                                </option>
                                <? endforeach ; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="cosmetic_category">
                                <? foreach ($categories as $category): ?>
                                <option value="<?= $category['category_id'] ?>">
                                    <?=  $category['category_name']; ?>
                                </option>
                                <? endforeach ; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="cosmetic_brand">
                                <? foreach ($brands as $brand): ?>
                                <option value="<?= $brand['brand_id']; ?>">
                                    <?= $brand['brand_name'] ?>
                                </option>
                                <? endforeach ; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control" name="cosmetic_price" value="" placeholder="Цена">
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control" name="cosmetic_volume" value="" placeholder="Объём">
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="cosmetic_country">
                                <? foreach ($countries as $country): ?>
                                <option value="<?=  $country['country_id']; ?>">
                                    <?=  $country['country_name']; ?>
                                </option>
                                <? endforeach ; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="cosmetic_description" value="" placeholder="Описание">
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                            <button type="submit" name="add_submit" class="btn btn-primary">Добавить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>

<? include_once('./views/templates/footer.php'); ?>
