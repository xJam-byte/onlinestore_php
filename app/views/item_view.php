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
                <button>
                    <a href="http://localhost/Muratbayev/onlinestore_php/public_html/item/cart/<?= $id_item ?>">
                        Add to cart
                    </a>
                </button>
                <button style="margin-left: 20px;">
                    <a href="http://localhost/Muratbayev/onlinestore_php/public_html/item/favs/<?= $id_item ?>">
                        Add to Favs
                    </a>
                </button>
            </div>
        </div>

    </div>
</div>