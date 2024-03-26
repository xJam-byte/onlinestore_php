<?php
class Model_User extends Model
{
    public function get_data()
    {
        return [
            "title" => "User"
        ];
    }

    public function get_user($email, $password)
    {
        $qr = "SELECT * FROM customers WHERE email = :email AND user_password=:password";
        $pr = ["email" => $email, "password" => $password];
        if ($this->db->getCount($qr, $pr) == 0) {
            return false;
        } else {
            return $this->db->getRow($qr, $pr);
        }
    }
    public function get_orders($id)
    {
        $qr = "SELECT * FROM orders WHERE customer_code = :id";
        $pr = ["id" => $id];
        $data = [];
        $order_details = [];
        $orders = $this->db->getAll($qr, $pr);
        foreach ($orders as $order) {
            $qr = "SELECT * FROM order_details WHERE order_id = :id";
            $pr = ["id" => $order["order_id"]];
            $order_detail = $this->db->getAll($qr, $pr);
            $order_details[] = $order_detail[0];
        }
        foreach ($order_details as $detail) {
            $qr = "SELECT * FROM order_details JOIN items ON order_details.product_code = items.id_item AND order_details.detail_id = :id";
            $pr = ["id" => $detail["detail_id"]];
            $data[] = $this->db->getRow($qr, $pr);
        }
        return $data;
    }

    public function get_user_by_id($id)
    {
        $qr = "SELECT * FROM customers WHERE customer_id = :id";
        $pr = ["id" => $id];
        if ($this->db->getCount($qr, $pr) == 0) {
            return false;
        } else {
            return $this->db->getRow($qr, $pr);
        }
    }

    public function add_user($firstName, $lastName, $email, $password, $number, $birthday)
    {
        $qr = "INSERT INTO customers (first_name, last_name, email, phone_number, user_password, birthday, id_group) VALUES (:fname, :lname, :email, :number_phone, :pswr, :brth, 1)";
        $pr = ["fname" => $firstName, "lname" => $lastName, "email" => $email, "number_phone" => $number, "pswr" => $password, "brth" => $birthday];
        return $this->db->insert($qr, $pr);
    }

    public function check_user($email, $password)
    {
        $qr = "SELECT customer_id FROM customers WHERE email = :email AND user_password = :pass";
        $pr = ["email" => $email, "pass" => md5($password)];
        if ($this->db->getCount($qr, $pr) == 0) {
            return false;
        } else {
            return $this->db->getRow($qr, $pr);
        }
    }


}