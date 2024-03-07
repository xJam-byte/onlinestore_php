<?php
class Controller_Cart extends Controller
{
    public function __construct()
    {
        Controller::__construct();
        $this->model = new Model_Cart();
    }

    public function action_index()
    {
        $data = $this->model->get_all();
        if ($data == false) {
            echo "404";
        } else {
            $this->view->generate("cart_all.php", "template_view.php", $data);
        }
    }
}