<div class="container">
    <h2>
        Hello
        <?= $data["first_name"] ?>
        <?= $data["last_name"] ?>!
    </h2>
    <p>
        Your phone:
        <?= $data["phone_number"] ?>
    </p>
    <div style="margin: 20px 0;" class="buttons">
        <button
            style="width: 150px; height: 40px; font-size: large; background-color: none; border-radius: 7px; border: 1px solid black;"
            class="orders_button">
            <?php if (@$_SESSION["user_id"] == 166): ?>
                <a href="http://localhost/MuratbayevA/february_22/onlinestore/public_html/panel/orders">
                    All orders
                </a>
            <?php endif; ?>
            <?php if (@$_SESSION["user_id"] != 166): ?>
                <a
                    href="http://localhost/MuratbayevA/february_22/onlinestore/public_html/user/orders/<?= @$_SESSION["user_id"] ?>">
                    My orders
                </a>
            <?php endif; ?>

        </button>
        <button
            style="margin-left: 15px; width: 150px; height: 40px; font-size: large; background-color: none; border-radius: 7px; border: 1px solid black;"
            class="edit_profile_button">
            <a href="http://localhost/MuratbayevA/february_22/onlinestore/public_html/user/edit">
                Edit profile
            </a>
        </button>
        <button
            style="margin-left: 15px; width: 150px; height: 40px; font-size: large; background-color: none; border-radius: 7px; border: 1px solid black;"
            class="edit_profile_button">
            <a href="http://localhost/MuratbayevA/february_22/onlinestore/public_html/user/log_out">
                Log out
            </a>
        </button>
    </div>
</div>