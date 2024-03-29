<?php $total = 0; ?>
<div class="container">
    <h2>Dashboard</h2>
    <h3 style="margin-top: 35px;">Today's Orders</h3>
    <div class="container items grid" style="margin-top: 15px;">
        <?php foreach ($data as $order): ?>
            <?php if ($order["order_date"] == date("Y-m-d")): ?>
                <article class="product orders">
                    <h2 class="header">
                        Order ID:
                        <?= $order["order_id"] ?>
                    </h2>
                    <p class="text">
                        date of the order:
                        <span>
                            <?= $order["order_date"] ?>
                        </span>
                    </p>
                    <p class="text">
                        status:
                        <span>
                            <?= $order["id_status"] ?>
                        </span>
                    </p>
                    <p class="text">
                        delivery address:
                        <span>
                            <?= $order["delivery_address"] ?>
                        </span>
                    </p>
                    <p class="text">
                        total price of items:
                        <span>
                            <?= $order["total_amount"] ?> KZT
                        </span>
                    </p>
                </article>
                <?php $total += $order["total_amount"]; ?>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
    <h3 style="margin-top: 35px;">Average Price Of Today's Orders:
        <span style="font-weight: normal">
            <?= $total ?> KZT
        </span>
    </h3>
</div>