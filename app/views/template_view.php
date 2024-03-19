<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto+Mono:ital,wght@0,100..700;1,100..700&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="/MuratbayevA/february_22/onlinestore/public_html/assets/css/template.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
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
                <a href="http://localhost/MuratbayevA/february_22/onlinestore/public_html/item">
                    PZShop
                </a>
            </div>

            <div class="header-easy_search">
                <select name="categories" id="categories">
                    <option value="All Categories">All Categories</option>
                    <option value="Toys">Toys</option>
                    <option value="Food">Food</option>
                    <option value="houses">Houses</option>
                    <option value="accessories">Accessories</option>
                </select>
                <div class="search_block">
                    <input type="text" name="search" id="" placeholder="Search Products Here...">
                    <button><span class="material-symbols-outlined">search</span></button>
                </div>
            </div>

            <ul class="header-ul">
                <li>
                    <a href="http://localhost/MuratbayevA/february_22/onlinestore/public_html/favorites">
                        <span class="material-symbols-outlined">
                            favorite
                        </span>
                    </a>
                </li>
                <li><span class="material-symbols-outlined">
                        account_circle
                    </span>
                </li>
                <li>
                    <a href="http://localhost/MuratbayevA/february_22/onlinestore/public_html/cart">
                        <span class="material-symbols-outlined">
                            shopping_cart
                        </span>
                    </a>
                </li>
            </ul>
        </div>
    </header>

    <main>
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
                <p>About Us</p>
                <p>Faq</p>
                <p>Terms & Conditions</p>
                <p>Contact Us</p>
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
    <script src="assets/js/App.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>