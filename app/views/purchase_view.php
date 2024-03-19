<?php
?>

<div class="container purchase ">
    <h1>
        Оплатить:
        <?= $data["ttl"] ?> KZT
    </h1>

    <form action="http://localhost/MuratbayevA/february_22/onlinestore/public_html/purchase/makeIt/<?= $data ?>"
        method="post">
        Delivery address: <br> <input name="delivary_address" type="text"><br><br>
        Delivery total amount: <br> <input name="total_amount" type="number" value="<?= $data ?>"><br><br>
        <input type="submit" value="Оплатить">
    </form>
</div>