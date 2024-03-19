<?php
$total = 0;
?>
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
<div class="container">
    <br><br>
    <p style="font-size: large; font-weight: 500;">Total price of the cart:
        <?= $total ?> KZT
    </p>
    <button>
        <a href="">Оплатить</a>
    </button>
</div>