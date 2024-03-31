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
        $pr = ["user" => $_SESSION["user_id"]];
        return $this->db->getAll($qr, $pr);
        // if ($this->db->getCount($qr, $pr) == 0) {
        //     return false;
        // } else {
        //     return $this->db->getAll($qr, $pr);
        // }
    }

    public function add_to_cart_cart($item)
    {
        $qr = "SELECT * FROM cart WHERE id_customer = :user AND id_item = :item";
        $pr = ["user" => $_SESSION["user_id"], "item" => $item];

        if ($this->db->getCount($qr, $pr) == 0) {
            $qr = "INSERT INTO cart (id_customer, id_item) VALUES (:user, :item)";
            $pr = ["user" => $_SESSION["user_id"], "item" => $item];
            return $this->db->query($qr, $pr);
        } else {
            $qr = "UPDATE cart SET quantityAdded = quantityAdded + 1 WHERE id_customer = :user AND id_item = :item";
            $pr = ["user" => $_SESSION["user_id"], "item" => $item];
            return $this->db->query($qr, $pr);
        }
    }

    public function remove_one($id)
    {
        $qr = "SELECT quantityAdded FROM cart WHERE id_customer = :user AND id_item = :item";
        $pr = ["user" => $_SESSION["user_id"], "item" => $id];
        $quantity = $this->db->getRow($qr, $pr);
        if ($quantity["quantityAdded"] == 1) {
            $qr = "DELETE FROM cart WHERE id_item = :id AND id_customer = :user";
            $pr = ["id" => $id, "user" => $_SESSION["user_id"]];
            if ($this->db->getCount($qr, $pr) == 0) {
                return false;
            } else {
                $this->db->query($qr, $pr);
                return true;
            }
        } else {
            $qr = "UPDATE cart SET quantityAdded = quantityAdded - 1 WHERE id_customer = :user AND id_item = :item";
            $pr = ["user" => $_SESSION["user_id"], "item" => $id];
            $this->db->query($qr, $pr);
            return true;
        }
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
    public function remove_from_cart($id)
    {
        $qr = "DELETE FROM cart WHERE id_item = :id AND id_customer = :user";
        $pr = ["id" => $id, "user" => $_SESSION["user_id"]];
        if ($this->db->getCount($qr, $pr) == 0) {
            return false;
        } else {
            $this->db->query($qr, $pr);
            return true;
        }
    }

}