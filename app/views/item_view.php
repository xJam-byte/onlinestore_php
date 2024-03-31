<div class="container">

    <div class="product_info">
        <img src="<?= $data["item_pic"] ?>" />

        <div class="info">
            <h2>
                <?= $title ?>
            </h2>
            <p class="text" style="font-size: 14px;">
                <?= $data["item_description"] ?>
            </p>
            <div class="interaction">
                <a href="http://localhost/Muratbayev/onlinestore_php/public_html/item/cart/<?= $id_item ?>">
                    <button onclick="showNotification()">
                        Add to cart
                    </button>
                </a>
                <a href="http://localhost/Muratbayev/onlinestore_php/public_html/item/favs/<?= $id_item ?>">
                    <button style="margin-left: 20px;">
                        Add to Favs
                    </button>
                </a>
            </div>
        </div>

    </div>
</div>