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
            $this->view->generate($file, "template_view.php", $data);
        }
    }

    public function actiob_search($query = "")
    {
        $data = $this->model->search_item($query);
        $this->view->generate($data);
    }
}