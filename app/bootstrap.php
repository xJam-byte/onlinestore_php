<?php
define("HOST", "localhost");
define('DATABASE', 'php_sep_212');
define('CHARSET', 'utf8mb4');
define('PORT', 3306);
define('USER', 'root');
define('PASSWORD', '');

require_once "core/Database.php";
require_once "core/Model.php";
require_once "core/View.php";
require_once "core/Controller.php";
require_once "core/Route.php";
Route::init();