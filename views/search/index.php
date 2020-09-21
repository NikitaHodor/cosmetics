<? include_once('./views/templates/header.php'); ?>


<? if (!$search): ?>
<h3> Введите поисковой запрос</h3>
<? elseif (!$searchResults): ?>
<h3> По вашему запросу ничего не найдено!</h3>
<? else: ?>
<h1> Косметика по запросу </h1>
<table class="table shadow">
    <thead class="thead-dark">
        <tr>
            <th>Наименование</th>
            <th>Цена</th>
            <th>Объём</th>
            <th>Описание</th>
            <th>img</th>
        </tr>
    </thead>
    <tbody>
        <? foreach ($searchResults as $searchResult): ?>
        <tr>
            <td>
            <a href="<?= SITE_ROOT . 'cosmetics/view/' . $searchResult['cosmetic_id'] ?>">
            <?= $searchResult['cosmetic_name']; ?>
            </a>
            </td>
            <td><?=$searchResult['cosmetic_price'] ?></td>
            <td><?=$searchResult['cosmetic_volume'] ?></td>
            <td><?=$searchResult['cosmetic_description'] ?></td>
            <td><img style="width: 6rem;" src="<?= $searchResult['image_url'] ?>" alt=""></td>
        </tr>
        <? endforeach; ?>
    </tbody>
</table>
<? endif; ?>

<? include_once('./views/templates/footer.php'); ?>
