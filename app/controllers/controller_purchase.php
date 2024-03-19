<?php
class Controller_Purchase extends Controller
{
    public function __construct()
    {
        Controller::__construct();
        $this->model = new Model_Purchase();
    }

    public function action_index()
    {
        $data = $this->model->get_all();
        if ($data == false) {
            echo "404";
        } else {
            $this->view->generate("purchase_view.php", "template_view.php", 0);
        }

    }
    public function action_do($total = 0)
    {
        $data = $this->model->get_all();
        $data["ttl"] = $total;
        if ($data == false) {
            echo "404";
        } else {
            $this->view->generate("purchase_view.php", "template_view.php", $data);
        }
    }

    public function action_makeIt($data = null)
    {
        $address = "";
        $amount = 0;
        $d = $this->model->purchase($address, $amount);
    }



}