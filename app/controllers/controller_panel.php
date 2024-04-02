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
        $_SESSION["current_page"] = "admin";
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
            @$data["items"] == null ? $data["items"] = [] : null;
            $this->view->generate("order_info.php", "template_view.php", $data);
        }
    }
    public function action_edit($id)
    {
        $status = isset($_POST["status"]) ? $_POST["status"] : null;
        if ($status != null) {
            # code...
            $data = $this->model->update_status($id, $status);
            if ($data == false) {
                echo "404";
            } else {
                $user_info = $this->model->get_order_by_id($id);
                $this->view->generate("order_info.php", "template_view.php", $user_info);
            }
        }
    }
    public function action_editaddr($id)
    {
        $address = isset($_POST["address"]) ? $_POST["address"] : null;
        if ($address != null) {
            # code...
            $data = $this->model->update_addr($id, $address);
            if ($data == false) {
                echo "404";
            } else {
                $user_info = $this->model->get_order_by_id($id);
                @$user_info["items"] == null ? $user_info["items"] = [] : null;

                $this->view->generate("order_info.php", "template_view.php", $user_info);
            }
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