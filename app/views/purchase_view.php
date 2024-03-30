<?php
?>

<div class="container ">
    <h1>
        Оплатить:
        <?= $data["ttl"] ?> KZT
    </h1>

    <form class="purchase" action="http://localhost/Muratbayev/onlinestore_php/public_html/purchase/makeIt"
        method="post"><br>
        Delivery address: <input name="delivery_address" type="text"><br>
        Delivery total amount: <input name="total_amount" placeholder="<?= $data["ttl"] ?>" type="number"
            value="<?= $data["ttl"] ?>"><br>
        <input class="btn" type="submit" value="Оплатить">
    </form>
</div>