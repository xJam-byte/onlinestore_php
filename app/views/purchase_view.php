<?php
?>

<div class="container purchase ">
    <h1>
        Оплатить:
        <?= $data["ttl"] ?> KZT
    </h1>

    <form action="http://localhost/Muratbayev/onlinestore_php/public_html/purchase/makeIt" method="post">
        Delivery address: <br> <input name="delivery_address" type="text"><br><br>
        Delivery total amount: <br> <input name="total_amount" placeholder="<?= $data["ttl"] ?>" type="number"
            value="<?= $data["ttl"] ?>"><br><br>
        <input type="submit" value="Оплатить">
    </form>
</div>