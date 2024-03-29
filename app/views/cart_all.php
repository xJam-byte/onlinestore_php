<?php
$total = 0;
?>
<div class="container">

    <h2>Cart</h2>
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
                <p class="text">
                    total price of items:
                    <?= $item["priceTotal"] ?>
                </p>
                <p class="text">
                    quantity:
                    <?= $item["quantityAdded"] ?>
                </p>
            </article>
            <?php $total += $item["priceTotal"]; ?>
        <?php endforeach; ?>

    </div>
    <div class="container cart_purchase">
        <br><br>
        <p style="font-size: large; font-weight: 500;">Total price of the cart:
            <?= $total ?> KZT
        </p>
        <br>
        <button
            style="width: 150px; height: 40px; border-radius: 7px; outline: none; border: none; background-color: black;">
            <a style="font-size: large; color: white; font-weight: 600;"
                href="http://localhost/Muratbayev/onlinestore_php/public_html/purchase/do/<?= $total ?>">Оплатить</a>
        </button>
    </div>

</div>