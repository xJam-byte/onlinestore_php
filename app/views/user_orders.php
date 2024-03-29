<div class="container">
    <h2>My Orders</h2>
    <div class="container items grid">
        <?php foreach ($data as $item): ?>
            <article class="product">
                <h2 class="header">
                    <?= $item["item_name"] ?>
                </h2>
                <p class="text">
                    price of item:
                    <?= $item["item_price"] ?>
                </p>
            </article>
        <?php endforeach; ?>
    </div>
</div>