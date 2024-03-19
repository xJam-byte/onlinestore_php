<?php
class Model_Favorites extends Model
{
    public function get_data()
    {
        return [
            "title" => "Favorites"
        ];
    }

    public function get_item($id)
    {
        $qr = "SELECT * FROM items WHERE id_item = :id";
        $pr = ["id" => $id];
        if ($this->db->getCount($qr, $pr) == 0) {
            return false;
        } else {
            return $this->db->getRow($qr, $pr);
        }
    }
    public function get_all($id = 1)
    {
        $qr = "SELECT * FROM favorites JOIN items ON favorites.item_id = items.id_item AND favorites.customer_id = :user";
        $pr = ["user" => 1];
        if ($this->db->getCount($qr, $pr) == 0) {
            return false;
        } else {
            return $this->db->getAll($qr, $pr);
        }
    }

    public function add_to_cart($item)
    {
        $qr = "SELECT * FROM cart WHERE id_customer = :user AND id_item = :item";
        $pr = ["user" => 1, "item" => $item];

        if ($this->db->getCount($qr, $pr) == 0) {
            $qr = "INSERT INTO cart (id_customer, id_item) VALUES (:user, :item)";
            return $this->db->insert($qr, $pr);
        } else {
            $qr = "UPDATE cart SET quantityAdded = quantityAdded + 1 WHERE id_customer = :user AND id_item = :item";
            return $this->db->query($qr, $pr);
        }
    }
    public function add_to_favs($item)
    {
        $qr = "SELECT * FROM favorites WHERE customer_id = :user AND item_id = :item";
        $pr = ["user" => 1, "item" => $item];

        if ($this->db->getCount($qr, $pr) == 0) {
            $qr = "INSERT INTO favorites (customer_id, item_id) VALUES (:user, :item)";
            return $this->db->insert($qr, $pr);
        }
    }


}