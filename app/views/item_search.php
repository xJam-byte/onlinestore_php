<div class="items container grid">
    <?php foreach ($data as $d): ?>
        <article class="product">
            <a href="/Muratbayev/onlinestore_php/public_html/item/id/<?= $d["id_item"] ?>" class="hidden">See
                details</a>
            <img src="<?= $d["item_pic"] ?>">
            <h2>
                <?= $d["item_name"] ?>
            </h2>
            <h3 class="text">
                <?= $d["item_price"] ?> KZT
            </h3>

        </article>
    <?php endforeach; ?>
</div>