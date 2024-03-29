<?php
class Controller_Favorites extends Controller
{
    public function __construct()
    {
        Controller::__construct();
        $this->model = new Model_Favorites();
    }

    public function action_index()
    {
        if (@$_SESSION["user_id"] == 0) {
            header("Location: /Muratbayev/onlinestore_php/public_html/user/sign_up");
        }
        $data = $this->model->get_all();
        if ($data == false) {
            $this->view->generate("favorites_all.php", "template_view.php", []);
        } else {
            $this->view->generate("favorites_all.php", "template_view.php", $data);
        }
    }
    public function action_to_fav($id)
    {
        $data = $this->model->add_to_favs($id);
        if ($data != 0) {
            header("Location: /Muratbayev/onlinestore_php/public_html/item/id/$id");
        }
    }

}