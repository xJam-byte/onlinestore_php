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
        $data = $this->model->get_user_by_id(isset($_SESSION["user_id"]) ? $_SESSION["user_id"] : 64);

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
        $firstName = isset($_POST["firstName"]) ? $_POST["firstName"] : null;
        $lastName = isset($_POST["lastName"]) ? $_POST["lastName"] : null;
        $email = isset($_POST["email"]) ? $_POST["email"] : null;
        $password = isset($_POST["password"]) ? $_POST["password"] : null;
        $number = isset($_POST["number"]) ? $_POST["number"] : null;
        $birthday = isset($_POST["birthday"]) ? $_POST["birthday"] : null;
        $data = $this->model->add_user($firstName, $lastName, $email, $password, $number, $birthday);


        if ($data == 0) {
        } else {
            $_SESSION["user_id"] = (int) $data;
            header("Location: /MuratbayevA/february_22/onlinestore/public_html/item");
            die();
        }
    }
    public function action_sign_in()
    {
        $this->view->generate("sign_in.php", "template_view.php");
        $email = isset($_POST["email"]) ? $_POST["email"] : null;
        $password = isset($_POST["password"]) ? $_POST["password"] : null;
        $data = $this->model->check_user($email, $password);
        if (!$data) {
        } else {
            $_SESSION["user_id"] = (int) $data["customer_id"];
            header("Location: /MuratbayevA/february_22/onlinestore/public_html/item");
            die();
        }

    }
    public function action_log_out()
    {
        $_SESSION["user_id"] = 0;
        header("Location: /MuratbayevA/february_22/onlinestore/public_html/item");

    }
}