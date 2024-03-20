<?php
class Model_Item extends Model
{
    public function get_data()
    {
        return [
            "title" => "Item"
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
    public function get_all()
    {
        $qr = "SELECT * FROM items";
        if ($this->db->getCount($qr) == 0) {
            return false;
        } else {
            return $this->db->getAll($qr);
        }
    }

    public function search_item()
    {
        $query = @$_REQUEST["q"];
        $q = htmlspecialchars($query);
        $qr = "SELECT * FROM items WHERE id_item = :q OR item_name LIKE '%$q%'";
        $pr = ["q" => $query];
        return $this->db->getAll($qr, $pr);
    }

    public function add_to_cart($item)
    {
        $qr = "SELECT * FROM cart WHERE id_customer = :user AND id_item = :item";
        $pr = ["user" => 64, "item" => $item];

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
        $pr = ["user" => 64, "item" => $item];

        if ($this->db->getCount($qr, $pr) == 0) {
            $qr = "INSERT INTO favorites (customer_id, item_id) VALUES (:user, :item)";
            return $this->db->insert($qr, $pr);
        }
    }

}