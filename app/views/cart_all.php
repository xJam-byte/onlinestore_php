<?php
$total = 0;
?>
<div class="container">
    <div class="notification" id="notification">
        <?php
        if ($_SESSION['isadded']) {
            echo "Товар успешно добавлен в корзину";
        }
        ?>
    </div>
    <h2>Cart</h2>
    <div class="container items grid">
        <?php foreach ($data as $item): ?>
            <article class="product orders">
                <h3 class="header">
                    <?= $item["item_name"] ?>
                </h3>
                <p class="text">
                    price of item:
                    <span>
                        <?= $item["item_price"] ?> KZT
                    </span>
                </p>
                <p class="text">
                    total price of items:
                    <span>
                        <?= $item["priceTotal"] ?> KZT
                    </span>
                </p>
                <p class="text">
                    quantity:
                    <span>
                        <?= $item["quantityAdded"] ?>
                    </span>
                </p>
                <div class="cart_buttons">
                    <a href="http://localhost/Muratbayev/onlinestore_php/public_html/cart/add/<?= $item["id_item"] ?>">
                        <button class="control" style="margin-top: 15px;">
                            +
                        </button>
                    </a>
                    <a
                        href="http://localhost/Muratbayev/onlinestore_php/public_html/cart/remove_one/<?= $item["id_item"] ?>">
                        <button class="control" style="margin-top: 15px;">
                            -
                        </button>
                    </a>
                    <a href="http://localhost/Muratbayev/onlinestore_php/public_html/cart/remove/<?= $item["id_item"] ?>">
                        <button style="margin-top: 15px;">
                            Delete
                        </button>
                    </a>

                </div>
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