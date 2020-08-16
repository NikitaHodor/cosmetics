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
        <input type="text" class="form-control" name="cosmetic_name" value="<?= isset($_POST['cosmetic_name']) ? $_POST['cosmetic_name'] : $cosmetic['cosmetic_name']; ?>">
    </div>
    <div class="form-group">
        <label>Цена</label>
        <input type="number" class="form-control" name="cosmetic_price" value="<?= isset($_POST['cosmetic_price']) ? $_POST['cosmetic_price']: $cosmetic['cosmetic_price']; ?>">
    </div>
    <div class="form-group">
        <label>Объём</label>
        <input type="number" class="form-control" name="cosmetic_volume" value="<?= $cosmetic['cosmetic_volume']; ?>">
    </div>
    <div class="form-group">
        <label>Бренд</label>
        <select class="form-control" name="cosmetic_brand">
            <? foreach ($brands as $brand): ?>
            <option value="<?= $brand['brand_id']; ?>" <?= ($cosmetic['cosmetic_brand_id'] == $brand['brand_id']) ? 'selected': ''; ?>>
                <?=  $brand['brand_name']; ?>
            </option>
            <? endforeach ; ?>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Отправить</button>
</form>
<? include_once('./views/templates/footer.php'); ?>
