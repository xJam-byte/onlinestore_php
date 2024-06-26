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
        $input = @$_REQUEST["search"];
        $category = @$_REQUEST["categories"];
        $qInput = htmlspecialchars($input);
        $qCategory = htmlspecialchars($category);
        if ($qInput != "" && $qCategory == "") {
            $qr = "SELECT * FROM items WHERE id_item = :q OR item_name LIKE '%$qInput%'";
            $pr = ["q" => $input];
            return $this->db->getAll($qr, $pr);
        } else if ($qInput == "" && $qCategory != "") {
            $qr = "SELECT * FROM items JOIN category ON category.categoty_name = :n AND category.category_id = items.id_category";
            $pr = ["n" => $qCategory];
            return $this->db->getAll($qr, $pr);
        } else if ($qInput != "" && $qCategory != "") {
            $qr = "SELECT * FROM items JOIN category ON category.categoty_name = :n AND category.category_id = items.id_category AND item_name LIKE '%$qInput%'";
            $pr = ["n" => $qCategory];
            return $this->db->getAll($qr, $pr);
        } else {
            return $this->get_all();
        }

    }

    public function add_to_cart($item)
    {
        $qr = "SELECT * FROM cart WHERE id_customer = :user AND id_item = :item";
        $pr = ["user" => $_SESSION["user_id"], "item" => $item];

        if ($this->db->getCount($qr, $pr) == 0) {
            $qr = "INSERT INTO cart (id_customer, id_item) VALUES (:user, :item)";
            $pr = ["user" => $_SESSION["user_id"], "item" => $item];
            return $this->db->insert($qr, $pr);
        } else {
            $qr = "UPDATE cart SET quantityAdded = quantityAdded + 1 WHERE id_customer = :user AND id_item = :item";
            $pr = ["user" => $_SESSION["user_id"], "item" => $item];
            return $this->db->query($qr, $pr);
        }
    }

    public function add_to_favs($item)
    {
        $qr = "SELECT * FROM favorites WHERE customer_id = :user AND item_id = :item";
        $pr = ["user" => $_SESSION["user_id"], "item" => $item];

        if ($this->db->getCount($qr, $pr) == 0) {
            $qr = "INSERT INTO favorites (customer_id, item_id) VALUES (:user, :item)";
            $pr = ["user" => $_SESSION["user_id"], "item" => $item];
            return $this->db->insert($qr, $pr);
        }
    }

    public function addItem($product_name, $description, $price, $picture, $category)
    {

        $qr = "SELECT category_id FROM category WHERE categoty_name = :c";
        $pr = ["c" => $category];
        $catId = $this->db->getRow($qr, $pr);
        $catId = $catId["category_id"];
        $qr = "INSERT INTO `items`(`item_name`, `item_description`, `item_price`, `item_pic`, `id_category`) VALUES (:pname, :descr, :price, :picture, :category)";
        $pr = ["pname" => $product_name, "descr" => $description, "price" => $price, "picture" => $picture, "category" => $catId];
        return $this->db->insert($qr, $pr);
    }
}