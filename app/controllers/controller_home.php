<?php
class Controller_Home extends Controller
{
    public function __construct()
    {
        Controller::__construct();
        $this->model = new Model_Home();
    }
    function action_index()
    {
        $data = $this->model->get_all();
        $this->view->generate("home_view.php", "template_view.php", $data);
    }
    function action_about()
    {
        $this->view->generate("about_view.php", "template_view.php");
    }
    function action_contacts()
    {
        $this->view->generate("contacts_view.php", "template_view.php");
    }
}