<?php
class Model_Cart extends Model
{
    public function get_data()
    {
        return [
            "title" => "Cart"
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


}