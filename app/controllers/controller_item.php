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

    public function action_all()
    {

    }
}