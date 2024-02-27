<?php
class Controller_User extends Controller
{
    public function __construct()
    {
        Controller::__construct();
        $this->model = new Model_User();
    }

    public function action_index()
    {

    }

    public function action_id($id = null)
    {
        // $data = $this->model->($id);
        // $data["title"] = $data["item_name"];

        // if ($data == false) {
        //     echo "404";
        // } else {
        //     $act = isset($_GET["act"]) ? $_GET["act"] : null;
        //     $file = match ($act) {
        //         "edit" => "item_edit.php",
        //         default => "item_view.php",
        //     };
        //     $this->view->generate($file, "template_view.php", $data);
        // }
    }
    public function action_sign_in()
    {
        $firstName = isset($_POST["firstName"]) ? $_POST["firstName"] : "";
        $lastName = isset($_POST["lastName"]) ? $_POST["lastName"] : "";
        $email = isset($_POST["email"]) ? $_POST["email"] : "";
        $password = isset($_POST["password"]) ? $_POST["password"] : "";
        $number = isset($_POST["number"]) ? $_POST["number"] : "";
        $birthday = isset($_POST["birthday"]) ? $_POST["birthday"] : "";
        $data = $this->model->add_user($firstName, $lastName, $email, $password, $number, $birthday);
        // $data["title"] = $data["Log in"];

        if ($data == 0) {
            echo "404";
        } else {
            $this->view->generate("sign_in_view.php", "template_view.php", $data);
        }
    }
}