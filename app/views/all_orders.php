<div class="container">
    <h2>ORDERS</h2>
    <div class="container items grid">
        <?php foreach ($data as $item): ?>
            <article class="product orders">
                <h2 class="header">
                    Order ID:
                    <?= $item["order_id"] ?>
                </h2>
                <p class="text">
                    date of the order:
                    <span>
                        <?= $item["order_date"] ?>
                    </span>
                </p>
                <p class="text">
                    status:
                    <span>
                        <?= $item["status_title"] ?>
                    </span>
                </p>
                <p class="text">
                    delivery address:
                    <span>
                        <?= $item["delivery_address"] ?>
                    </span>
                </p>
                <p class="text">
                    total price of items:
                    <span>
                        <?= $item["total_amount"] ?> KZT
                    </span>
                </p>
            </article>
        <?php endforeach; ?>
    </div>
</div>