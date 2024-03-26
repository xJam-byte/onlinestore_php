<div class="container items grid" style="display: flex; flex-wrap: wrap;">
    <h2>Favorites</h2>
    <?php foreach ($data as $item): ?>
        <article class="product">
            <h2 class="header">
                <?= $item["item_name"] ?>
            </h2>
            <img src="<?= $item["item_pic"] ?>">
            <br>
            <br>
            <p class="text">
                price:
                <?= $item["item_price"] ?> KZT
            </p>
            <p class="text">
                description:
                <?= $item["item_description"] ?>
            </p>
        </article>
    <?php endforeach; ?>
</div>