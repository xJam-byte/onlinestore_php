<div class="container">

    <h2>ORDERS</h2>
    <div class="container items grid">
        <?php foreach ($data as $item): ?>
            <article class="product">
                <h2 class="header">
                    Order ID:
                    <?= $item["order_id"] ?>
                </h2>
                <p class="text">
                    date of the order:
                    <?= $item["order_date"] ?>
                </p>
                <p class="text">
                    status
                    <?= $item["status_id"] ?>
                </p>
                <p class="text">
                    delivery address:
                    <?= $item["delivery_address"] ?>
                </p>
                <p class="text">
                    total price of items:
                    <?= $item["total_amount"] ?>
                </p>
            </article>
        <?php endforeach; ?>
    </div>
</div>