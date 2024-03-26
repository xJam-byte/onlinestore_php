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
        if ($_SESSION["user_id"] == 166) {
            $this->view->generate("dashboard.php", "template_view.php");
        } else {
            echo "FORBIDDEN";
        }
    }

    public function action_orders()
    {
        $data = $this->model->get_all();
    }
}