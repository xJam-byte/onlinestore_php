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
        $_SESSION["current_page"] = "cart";
        if (@$_SESSION["user_id"] == 0) {

            header("Location: /Muratbayev/onlinestore_php/public_html/user/sign_up");
        }
        $data = $this->model->get_all();
        if ($data == false) {
            $this->view->generate("cart_all.php", "template_view.php", []);
        } else {
            $this->view->generate("cart_all.php", "template_view.php", $data);
        }
    }

    public function action_add($id)
    {
        $data = $this->model->add_to_cart_cart($id);
        $_SESSION["isadded"] = $data;
        header("Location: /Muratbayev/onlinestore_php/public_html/cart");
    }
    public function action_remove($id)
    {
        $data = $this->model->remove_from_cart($id);
        $_SESSION["isdeleted"] = $data;
        header("Location: /Muratbayev/onlinestore_php/public_html/cart");
    }
    public function action_remove_one($id)
    {
        $data = $this->model->remove_one($id);
        $_SESSION["isremoved"] = $data;
        header("Location: /Muratbayev/onlinestore_php/public_html/cart");
    }


}