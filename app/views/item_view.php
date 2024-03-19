<div class="product">
    <h2>
        <?= $title ?>
    </h2>
    <p class="text">
        <?= $data["item_description"] ?>
    </p>
    <img src="<?= $data["item_pic"] ?>" class="text" />
    <button><a href="http://localhost/MuratbayevA/february_22/onlinestore/public_html/item/cart/<?= $id_item ?>">Add to
            cart</a></button><br>
    <a href="http://localhost/MuratbayevA/february_22/onlinestore/public_html/item/favs/<?= $id_item ?>">Add to Favs</a>
</div>