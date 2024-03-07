<h1>CART</h1>
<div style="display: flex; flex-wrap: wrap;">
    <?php foreach ($data as $item): ?>
        <article style="border: 1px solid black; margin: 15px; padding: 7px; width: 250px;">
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