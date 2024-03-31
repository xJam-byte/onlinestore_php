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
        <?php if (@$_SESSION["user_id"] == 166): ?>
            <a href="http://localhost/Muratbayev/onlinestore_php/public_html/panel/orders">
                <button
                    style="width: 150px; height: 40px; font-size: large; background-color: none; border-radius: 7px; border: 1px solid black;"
                    class="orders_button">
                    All orders
                </button>
            </a>
        <?php endif; ?>
        <?php if (@$_SESSION["user_id"] != 166): ?>
            <a href="http://localhost/Muratbayev/onlinestore_php/public_html/user/orders/<?= @$_SESSION["user_id"] ?>">
                <button
                    style="width: 150px; height: 40px; font-size: large; background-color: none; border-radius: 7px; border: 1px solid black;"
                    class="orders_button">
                    My orders
                </button>
            </a>
        <?php endif; ?>

        <a href="http://localhost/Muratbayev/onlinestore_php/public_html/user/edit">
            <button
                style="margin-left: 15px; width: 150px; height: 40px; font-size: large; background-color: none; border-radius: 7px; border: 1px solid black;"
                class="edit_profile_button">
                Edit profile
            </button>
        </a>
        <a href="http://localhost/Muratbayev/onlinestore_php/public_html/user/log_out">
            <button
                style="margin-left: 15px; width: 150px; height: 40px; font-size: large; background-color: none; border-radius: 7px; border: 1px solid black;"
                class="edit_profile_button">
                Log out
            </button>
        </a>
    </div>
</div>