<?php
class Controller_Item extends Controller
{
    public function __construct()
    {
        Controller::__construct();
        $this->model = new Model_Item();
    }

    public function action_index()
    {
        $_SESSION["current_page"] = "home";
        $data = $this->model->get_all();
        if ($data == false) {
            echo "404";
        } else {
            $this->view->generate("item_all.php", "template_view.php", $data);
        }
    }

    public function action_cart($id)
    {
        $data = $this->model->add_to_cart($id);
        // header("Location: /Muratbayev/onlinestore_php/public_html/cart");
        header("Location: /Muratbayev/onlinestore_php/public_html/item");
    }
    public function action_favs($id)
    {
        $data = $this->model->add_to_favs($id);
        header("Location: /Muratbayev/onlinestore_php/public_html/item");
        // if ($data != 0) {
        // }
    }

    public function action_id($id = null)
    {
        $data = $this->model->get_item($id);
        $data["title"] = $data["item_name"];

        if ($data == false) {
            echo "404";
        } else {
            $this->view->generate("item_view.php", "template_view.php", $data);
        }
    }

    public function action_search($input = "", $category = "")
    {
        $data = $this->model->search_item();
        $this->view->generate("item_search.php", "template_view.php", $data);
    }


    // <input type="text" name="product_name" placeholder="product_name" required>
    // <input type="text" name="description" placeholder="description" required>
    // <input type="number" name="price" placeholder="price" required>
    // <input type="text" name="picture" placeholder="picture">
    // <select name="category" id="category">
    public function action_add()
    {
        $_SESSION["current_page"] = "admin";
        $this->view->generate("add_item.php", "template_view.php");
        $product_name = isset($_POST["product_name"]) ? $_POST["product_name"] : null;
        $description = isset($_POST["description"]) ? $_POST["description"] : null;
        $price = isset($_POST["price"]) ? $_POST["price"] : null;
        $picture = isset($_POST["picture"]) ? $_POST["picture"] : null;
        $category = isset($_POST["category"]) ? $_POST["category"] : null;

        if ($product_name != null && $product_name != "" && $description != null && $description != "" && $price != null && $price != 0) {
            $data = $this->model->addItem($product_name, $description, $price, $picture, $category);
            if ($data == 0) {
                echo "404";
            } else {
                var_dump($data);
                // header("Location: /Muratbayev/onlinestore_php/public_html/item");
            }
        }
    }
}