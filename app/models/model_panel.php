<?php
class Model_Panel extends Model
{
    public function get_data()
    {
        return [
            "title" => "Panel"
        ];
    }

    public function get_all()
    {

        $qr = "SELECT * FROM cart JOIN items ON cart.id_item = items.id_item AND cart.id_customer = :user";
        $pr = ["user" => $_SESSION["user_id"]];
        return $this->db->getAll($qr, $pr);
    }


}