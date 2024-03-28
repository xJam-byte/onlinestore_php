<?php
class Route
{
    static function init()
    {
        // Действите по умолчанию
        $controller_name = "Home";
        $action_name = "index";
        $argument = null;

        $cut = "/Muratbayev/onlinestore_php/public_html/";
        $uri = str_replace($cut, "", $_SERVER["REQUEST_URI"]);
        $uri = strtok($uri, "?");
        $routes = explode("/", $uri);

        if (!empty($routes[0])) {
            $controller_name = $routes[0];
        }

        if (!empty($routes[1])) {
            $action_name = $routes[1];
        }

        if (!empty($routes[2])) {
            $argument = $routes[2];
        }



        $model_name = "Model_" . $controller_name;
        $controller_name = "Controller_" . $controller_name;
        $action_name = "action_" . $action_name;

        $model_file = strtolower($model_name) . ".php";
        $model_path = "../app/models/$model_file";
        if (file_exists($model_path)) {
            include $model_path;
        }

        $controller_file = strtolower($controller_name) . ".php";
        $controller_path = "../app/controllers/$controller_file";
        if (file_exists($controller_path)) {
            include $controller_path;
        } else {
            echo "404";
            exit;
        }


        $controller = new $controller_name;
        $action = $action_name;

        if (method_exists($controller, $action)) {
            ($argument != null) ? $controller->$action($argument) : $controller->$action();
        } else {
            echo "404";
        }
    }
}