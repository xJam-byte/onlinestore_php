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
    public function action_order_detail($id)
    {
        $data = $this->model->get_order_by_id($id);
        if ($data == false) {
            echo "404";
        } else {
            $this->view->generate("order_info.php", "template_view.php", $data);
        }
    }
    public function action_remove_from_order($info)
    {
        $info = explode("-", $info);
        $orderid = $info[1];
        // $data = $this->model->remove($info[0], $info[1]);
        $data = $this->model->remove($info[0], $info[1]);
        if ($data) {
            header("Location: /Muratbayev/onlinestore_php/public_html/panel/order_detail/$orderid");
        } else {
            header("Location: /Muratbayev/onlinestore_php/public_html/panel/orders");
        }
    }
}