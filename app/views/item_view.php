<div class="product_info">
    <div class="product_img">
        <img src="<?= $data["item_pic"] ?>" />
    </div>
    <div class="info">

        <h2>
            <?= $title ?>
        </h2>
        <p class="text">
            <?= $data["item_description"] ?>
        </p>
    </div>
    <div class="interaction">
        <a href="http://localhost/MuratbayevA/february_22/onlinestore/public_html/item/cart/<?= $id_item ?>">
            Add to cart
        </a><br><br>
        <a href="http://localhost/MuratbayevA/february_22/onlinestore/public_html/item/favs/<?= $id_item ?>">
            Add to Favs
        </a>
    </div>
</div>