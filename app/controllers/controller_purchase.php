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

    public function action_makeIt()
    {
        $data = $this->model->get_all();
        $address = isset($_POST["delivery_address"]) ? $_POST["delivery_address"] : "";
        $amount = isset($_POST["total_amount"]) ? $_POST["total_amount"] : 0;
        $d = $this->model->purchase($address, $amount, $data);
        $this->view->generate("item_all.php", "template_view.php", $d);
    }



}