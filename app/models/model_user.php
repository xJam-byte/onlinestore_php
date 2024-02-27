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
        $qr = "SELECT * FROM items WHERE email = :email AND user_password=:password";
        $pr = ["email" => $email, "password" => $password];
        if ($this->db->getCount($qr, $pr) == 0) {
            return false;
        } else {
            return $this->db->getRow($qr, $pr);
        }
    }
    public function add_user($firstName, $lastName, $email, $password, $number, $birthday)
    {
        $qr = "INSERT INTO customers (first_name, last_name, email, phone_number, user_password, birthday, id_group) VALUES (?, ?, ?, ?, ?, ?, 1)";
        $pr = [$firstName, $lastName, $email, $password, $number, $birthday];
        return ($this->db->insert($qr, $pr) != 0) ? $this->db->insert($qr, $pr) : false;
    }
}