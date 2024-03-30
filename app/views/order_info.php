<div class="container">
    <h2>
        Order ID:
        <?= $data["orders"]["order_id"] ?>
    </h2>
    <div class="order">
        <p class="text">
            date of the order:
            <span>
                <?= $data["orders"]["order_date"] ?>
            </span>
        </p>
        <p class="text">
            status:
            <span>
                <?= $data["orders"]["status_title"] ?>
            </span>
        </p>
        <p class="text">
            delivery address:
            <span>
                <?= $data["orders"]["delivery_address"] ?>
            </span>
        </p>
        <p class="text">
            total price of items:
            <span>
                <?= $data["orders"]["total_amount"] ?> KZT
            </span>
        </p>
        <p style="margin-top: 15px;" class="text">
            items:
        </p>
        <div style="margin-top: 15px;" class="grid items orders_items">
            <?php foreach ($data["items"] as $d): ?>
                <article class="product">
                    <img src="<?= $d["item_pic"] ?>">
                    <h3>
                        <?= $d["item_name"] ?>
                    </h3>
                    <p class="text">
                        <?= $d["item_price"] ?> KZT
                    </p>
                    <button>
                        <a
                            href="/Muratbayev/onlinestore_php/public_html/panel/remove_from_order/<?= $d["id_item"] ?>-<?= $data["orders"]["order_id"] ?>">
                            Remove
                        </a>
                    </button>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</div>