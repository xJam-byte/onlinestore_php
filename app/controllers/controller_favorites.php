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
        $data = $this->model->get_all();
        if ($data == false) {
            echo "404";
        } else {
            $this->view->generate("favorites_all.php", "template_view.php", $data);
        }
    }
    public function action_to_fav($id)
    {
        $data = $this->model->add_to_favs($id);
        if ($data != 0) {
            header("Location: /MuratbayevA/february_22/onlinestore/public_html/item/id/$id");
        }
    }

}