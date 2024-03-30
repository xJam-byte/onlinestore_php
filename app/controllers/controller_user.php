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

    public function action_edit()
    {
        $user_info = $this->model->get_user_by_id(isset($_SESSION["user_id"]) ? $_SESSION["user_id"] : 0);

        if ($user_info == false) {
            echo "404";
        } else {
            $this->view->generate("user_edit.php", "template_view.php", $user_info);
        }
    }
    public function action_editDo()
    {
        $firstName = isset($_POST["firstName_edit"]) ? $_POST["firstName_edit"] : null;
        $lastName = isset($_POST["lastName_edit"]) ? $_POST["lastName_edit"] : null;
        $email = isset($_POST["email_edit"]) ? $_POST["email_edit"] : null;
        $number = isset($_POST["number_edit"]) ? $_POST["number_edit"] : null;
        $birthday = isset($_POST["birthday_edit"]) ? $_POST["birthday_edit"] : null;

        if ($firstName != null && $firstName != "" && $lastName != null && $lastName != "" && $email != null && $email != "") {
            $data = $this->model->update_user($firstName, $lastName, $email, $number, $birthday);
            if ($data == false) {
                echo "404";
            } else {
                $user_info = $this->model->get_user_by_id(isset($_SESSION["user_id"]) ? $_SESSION["user_id"] : 0);
                $this->view->generate("user_edit.php", "template_view.php", $user_info);
            }
        }
    }
    public function action_profile()
    {
        $data = $this->model->get_user_by_id(isset($_SESSION["user_id"]) ? $_SESSION["user_id"] : 0);

        if ($data == false) {
            echo "404";
        } else {
            $this->view->generate("user_profile.php", "template_view.php", $data);
        }
    }

    public function action_orders()
    {
        $data = $this->model->get_orders();
        if ($data == false) {
            $this->view->generate("user_orders.php", "template_view.php", []);
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
        if ($firstName != null && $lastName != null && $email != null && $password != null) {
            $data = $this->model->add_user($firstName, $lastName, $email, $password, $number, $birthday);

            if ($data == 0) {
            } else {
                $_SESSION["user_id"] = (int) $data;
                // header("Location: /Muratbayev/onlinestore_php/public_html/item");
                // header("Refresh:1; url=/Muratbayev/onlinestore_php/public_html/item");
                // echo ("<meta http-equiv='refresh' content='1'>");
                echo '<META HTTP-EQUIV="Refresh" Content="0; URL=http://localhost/Muratbayev/onlinestore_php/public_html/item">';
                exit;
            }
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
            // header("Refresh:1; url=/Muratbayev/onlinestore_php/public_html/item");
            // header("Location: /Muratbayev/onlinestore_php/public_html/item");
            // echo ("<meta http-equiv='refresh' content='1'>");
            echo '<META HTTP-EQUIV="Refresh" Content="0; URL=http://localhost/Muratbayev/onlinestore_php/public_html/item">';
            exit;
        }

    }
    public function action_log_out()
    {
        $_SESSION["user_id"] = 0;
        header("Location: /Muratbayev/onlinestore_php/public_html/item");
    }
}