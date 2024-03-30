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

    public function action_cart($id)
    {
        $data = $this->model->add_to_cart($id);
        if ($data != 0) {
            header("Location: /Muratbayev/onlinestore_php/public_html/item/id/$id");
        }
    }
    public function action_remove($id)
    {
        $data = $this->model->remove_from_cart($id);
        header("Location: /Muratbayev/onlinestore_php/public_html/cart");
    }


}