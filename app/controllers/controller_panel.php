<?php
class Controller_Panel extends Controller
{
    public function __construct()
    {
        Controller::__construct();
        $this->model = new Model_Panel();
    }

    public function action_index()
    {
        $data = $this->model->get_all();
        if ($_SESSION["user_id"] == 166) {
            $this->view->generate("dashboard.php", "template_view.php", $data);
        } else {
            echo "FORBIDDEN";
        }
    }

    public function action_orders()
    {
        $data = $this->model->get_all();
        if ($data == false) {
            echo "404";
        } else {
            $this->view->generate("all_orders.php", "template_view.php", $data);
        }
    }
}