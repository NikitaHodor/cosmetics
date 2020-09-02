<? include_once('./views/templates/header.php'); ?>


<? if (isset($errors) && !empty($errors)): ?>
<div>
    <? foreach ($errors as $error): ?>
    <p class="error"> <?= $error; ?> </p>
    <? endforeach; ?>
</div>
<? endif; ?>
<form method="POST">
    <div class="form-group">
        <label>Название косметики</label>
        <input type="text" class="form-control" name="cosmetic_name">
    </div>
    <div class="form-group">
        <label>Тип</label>
        <select class="form-control" name="cosmetic_type">
            <? foreach ($types as $type): ?>
            <option value="<?= $type['type_id']; ?>">
                <?=  $type['type_name']; ?>
            </option>
            <? endforeach ; ?>
        </select>
    </div>
    <div class="form-group">
        <label>Категория</label>
        <select class="form-control" name="cosmetic_category">
            <? foreach ($categories as $category): ?>
            <option value="<?= $category['category_id'] ?>">
                <?=  $category['category_name']; ?>
            </option>
            <? endforeach ; ?>
        </select>
    </div>
    <div class="form-group">
        <label>Бренд</label>
        <select class="form-control" name="cosmetic_brand">
            <? foreach ($brands as $brand): ?>
            <option value="<?= $brand['brand_id']; ?>">
                <?= $brand['brand_name'] ?>
            </option>
            <? endforeach ; ?>
        </select>
    </div>
    <div class="form-group">
        <label>Цена</label>
        <input type="number" class="form-control" name="cosmetic_price" value="">
    </div>
    <div class="form-group">
        <label>Объём</label>
        <input type="number" class="form-control" name="cosmetic_volume" value="">
    </div>
    <div class="form-group">
        <label>Страна</label>
        <select class="form-control" name="cosmetic_country">
            <? foreach ($countries as $country): ?>
            <option value="<?=  $country['country_id']; ?>">
                <?=  $country['country_name']; ?>
            </option>
            <? endforeach ; ?>
        </select>
    </div>
    <div class="form-group">
        <label>Описание</label>
        <input type="text" class="form-control" name="cosmetic_description" value="">
    </div>

    <button type="submit" class="btn btn-primary">Отправить</button>
</form>

<? include_once('./views/templates/footer.php'); ?>
