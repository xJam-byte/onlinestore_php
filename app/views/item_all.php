<div style="display: flex; flex-wrap: wrap;">
    <?php foreach ($data as $d): ?>
        <article style="border: 1px solid black; margin: 15px; padding: 7px; width: 250px;">
            <h2 class="header">
                <?= $d["item_name"] ?>
            </h2>
            <h3 class="text">
                <?= $d["item_price"] ?>
            </h3>
            <a href="item/id/<?= $d["id_item"] ?>">see details</a>
        </article>
    <?php endforeach; ?>
</div>