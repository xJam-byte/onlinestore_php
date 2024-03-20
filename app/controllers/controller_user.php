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
        // $data = $this->model->get_user_by_id($id);
        // $data["title"] = $data["item_name"];

        // if ($data == false) {
        //     echo "404";
        // } else {
        //     $act = isset($_GET["act"]) ? $_GET["act"] : null;
        //     $file = match ($act) {
        //         "edit" => "user_edit.php",
        //         "profile" => "user_profile.php",
        //         default => "item_view.php",
        //     };
        //     $this->view->generate($file, "template_view.php", $data);
        // }
    }
    public function action_profile()
    {
        $data = $this->model->get_user_by_id(isset($_SESSION["id"]) ? $_SESSION["id"] : 64);

        if ($data == false) {
            echo "404";
        } else {
            $this->view->generate("user_profile.php", "template_view.php", $data);
        }
    }

    public function action_orders($id = null)
    {
        $data = $this->model->get_orders($id);

        if ($data == false) {
            echo "404";
        } else {
            $this->view->generate("user_orders.php", "template_view.php", $data);
        }
    }

    public function action_sign_up()
    {
        $this->view->generate("sign_up_view.php", "template_view.php");
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
            $_SESSION["user_id"] = $data;
        }
    }
    public function action_sign_in()
    {
        $this->view->generate("sign_in.php", "template_view.php");
        $email = isset($_POST["email"]) ? $_POST["email"] : "";
        $password = isset($_POST["password"]) ? $_POST["password"] : "";
        $data = $this->model->check_user($email, $password);
        // $data["title"] = $data["Log in"];
        echo "<code><pre>";
        var_dump($data);
        if ($data == 0) {
            header("Location: /MuratbayevA/february_22/onlinestore/public_html/user/sign_in");
        } else {
            $_SESSION["user_id"] = $data;
            header("Location: /MuratbayevA/february_22/onlinestore/public_html/item");
        }
    }
}