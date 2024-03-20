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
        header("Location: /MuratbayevA/february_22/onlinestore/public_html/item");
    }
    public function action_favs($id)
    {
        $data = $this->model->add_to_favs($id);
        if ($data != 0) {
            header("Location: /MuratbayevA/february_22/onlinestore/public_html/item");
        }
    }

    public function action_id($id = null)
    {
        $data = $this->model->get_item($id);
        $data["title"] = $data["item_name"];

        if ($data == false) {
            echo "404";
        } else {
            $act = isset($_GET["act"]) ? $_GET["act"] : null;
            $file = match ($act) {
                "edit" => "item_edit.php",
                default => "item_view.php",
            };
            $this->view->generate("item_view.php", "template_view.php", $data);
        }
    }

    public function action_search()
    {
        $data = $this->model->search_item();
        // $this->view->json($data);
        $this->view->generate("item_search.php", "template_view.php", $data);
    }

    public function action_all()
    {

    }
}