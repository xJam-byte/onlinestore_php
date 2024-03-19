<?php
class Model_Purchase extends Model
{
    public function get_data()
    {
        return [
            "title" => "Purchase"
        ];
    }

    public function get_all()
    {

        $qr = "SELECT * FROM cart JOIN items ON cart.id_item = items.id_item AND cart.id_customer = :user";
        $pr = ["user" => 1];
        if ($this->db->getCount($qr, $pr) == 0) {
            return false;
        } else {
            return $this->db->getAll($qr, $pr);
        }
    }

    public function purchase($address, $amount)
    {

        $qr = "INSERT INTO `orders`(`status_id`, `manager_comment`, `delivery_address`, `total_amount`, `customer_code`) VALUES (1, 'no comments', :addr, :amount, :user) ";
        $pr = ["user" => 1, "addr" => $address, "amount" => $amount];

        if ($this->db->getCount($qr, $pr) == 0) {
            return false;
        } else {
            return $this->db->getAll($qr, $pr);
        }
    }
}