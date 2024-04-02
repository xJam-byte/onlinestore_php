<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="/Muratbayev/onlinestore_php/public_html/assets/css/template.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto+Mono:ital,wght@0,100..700;1,100..700&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <title>
        <?= $title ?>
    </title>
</head>

<body>

    <header>
        <div class="header container">

            <div class="header-logo">
                <a href="http://localhost/Muratbayev/onlinestore_php/public_html/item">
                    PZShop
                </a>
            </div>

            <div class="header-easy_search">
                <form class="search_block" id="search"
                    action="http://localhost/Muratbayev/onlinestore_php/public_html/item/search" method="get">
                    <select name="categories" id="categories">
                        <option value="">All Categories</option>
                        <option value="Pet Toys">Pet Toys</option>
                        <option value="Dog Food">Dog Food</option>
                        <option value="Cat Food">Cat Food</option>
                        <option value="Pet Accsessories">Pet Accsessories</option>
                    </select>
                    <input type="text" name="search" id="" placeholder="Search Products Here...">
                    <button type="submit"><span class="material-symbols-outlined">search</span></button>
                </form>
            </div>

            <ul class="header-ul">
                <li>
                    <a href="http://localhost/Muratbayev/onlinestore_php/public_html/favorites">
                        <span class="material-symbols-outlined">
                            favorite
                        </span>
                    </a>
                </li>
                <li>
                    <?php if (@$_SESSION["user_id"] != 0): ?>
                        <a href="http://localhost/Muratbayev/onlinestore_php/public_html/user/profile">
                            <span class="material-symbols-outlined">
                                account_circle
                            </span>
                        </a>
                    <?php endif; ?>
                    <?php if (@$_SESSION["user_id"] == 0): ?>
                        <a href="http://localhost/Muratbayev/onlinestore_php/public_html/user/sign_up">sign
                            in</a>
                    <?php endif; ?>
                </li>
                <li>
                    <a href="http://localhost/Muratbayev/onlinestore_php/public_html/cart">
                        <span class="material-symbols-outlined">
                            shopping_cart
                        </span>
                    </a>
                </li>
                <?php if (@$_SESSION["user_id"] == 166): ?>
                    <li>
                        <a href="http://localhost/Muratbayev/onlinestore_php/public_html/panel">
                            <span class="material-symbols-outlined">
                                admin_panel_settings
                            </span>
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </header>

    <main>
        <div class="notification" id="notification">
            <?php
            if ($_SESSION['isadded']) {
                echo "Товар успешно добавлен в корзину";
            } else if ($_SESSION['isdeleted'] || $_SESSION['isremoved']) {
                echo "Товар успешно удален из корзины";
            }
            ?>
        </div>
        <?php include "../app/views/$content"; ?>
    </main>

    <footer>
        <div class="container footer">
            <div class="lorem block-footer">
                <div class="title">PZShop</div><br>
                <p class="description">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Maiores eligendi
                    tempora
                    alias vero est? Error atque id eaque doloribus architecto nulla laborum quis harum quae cum,
                    consectetur
                    nemo, ad minima?</p>
            </div>
            <div class="information block-footer">
                <div class="title">information</div><br>
                <p><a href="http://localhost/Muratbayev/onlinestore_php/public_html/home/about" style="color: white;">
                        About Us</a></p>
                <p>Faq</p>
                <p>Terms & Conditions</p>
                <p><a href="http://localhost/Muratbayev/onlinestore_php/public_html/home/contacts"
                        style="color: white;"> Contacts</a></p>
                <p>Help</p>
            </div>
            <div class="get_in_touch block-footer">
                <div class="title">Get In Touch</div><br>
                <p>Shamshi Kaldayakova 70</p>
                <p>Kazakhstan, Astana</p>
                <p>abylaimuratbayev@gmail.com</p>
                <p>+7-778-355-0947</p>
            </div>
        </div>
    </footer>
    <script>
        function showNotification() {
            var notification = document.getElementById("notification");
            notification.style.display = "block";
            setTimeout(function () {
                notification.style.display = "none";
            }, 3000);
        }
    </script>
    <script src="Muratbayev/onlinestore_php/public_html/assets/js/App.js"></script>
    <script src="Muratbayev/onlinestore_php/public_html/assets/js/Search.js"></script>
    <script src="Muratbayev/onlinestore_php/public_html/assets/js/main.js"></script>
</body>

</html>