<div class="container items grid" style="display: flex; flex-wrap: wrap;">
    <?php foreach ($data as $item): ?>
        <article class="product">
            <h2 class="header">
                <?= $item["item_name"] ?>
            </h2>
            <p class="text">
                price of item:
                <?= $item["item_price"] ?>
            </p>
            <p class="text">
                total price of items:
                <?= $item["priceTotal"] ?>
            </p>
            <p class="text">
                quantity:
                <?= $item["quantityAdded"] ?>
            </p>
        </article>
    <?php endforeach; ?>
</div>