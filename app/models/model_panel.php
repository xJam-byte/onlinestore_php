<?php
class Model_Panel extends Model
{
    public function get_data()
    {
        return [
            "title" => "Panel"
        ];
    }

    // $qr = "SELECT * FROM orders WHERE customer_code = :id";
    // $pr = ["id" => $id];
    // $data = [];
    // $order_details = [];
    // $orders = $this->db->getAll($qr, $pr);
    // foreach ($orders as $order) {
    //     $qr = "SELECT * FROM order_details WHERE order_id = :id";
    //     $pr = ["id" => $order["order_id"]];
    //     $order_detail = $this->db->getAll($qr, $pr);
    //     $order_details[] = $order_detail[0];
    // }
    // foreach ($order_details as $detail) {
    //     $qr = "SELECT * FROM order_details JOIN items ON order_details.product_code = items.id_item AND order_details.detail_id = :id";
    //     $pr = ["id" => $detail["detail_id"]];
    //     $data[] = $this->db->getRow($qr, $pr);
    // }
    // return $data;


    public function get_all()
    {
        $qr = "SELECT * FROM orders";
        if ($this->db->getCount($qr) == 0) {
            return false;
        } else {
            $qr = "SELECT * FROM orders JOIN statuses ON orders.id_status = statuses.status_id";
            if ($this->db->getCount($qr) == 0) {
                return false;
            } else {
                return $this->db->getAll($qr);
            }
        }
    }
    public function get_order_by_id($id = 0)
    {
        $data = [];
        $qr = "SELECT * FROM orders JOIN statuses ON orders.id_status = statuses.status_id AND orders.order_id = :id";
        $pr = ["id" => $id];
        if ($this->db->getCount($qr, $pr) == 0) {
            return false;
        } else {
            $orders = $this->db->getAll($qr, $pr);
            $data["orders"] = $orders[0];

            $qr = "SELECT * FROM order_details WHERE order_id = :order_id";
            $pr = ["order_id" => $id];
            $data["order_details"] = $this->db->getAll($qr, $pr);

            foreach ($data["order_details"] as $detail) {
                $qr = "SELECT * FROM items WHERE id_item = :code";
                $pr = ["code" => $detail["product_code"]];
                $data["items"][] = $this->db->getRow($qr, $pr);
            }
            return $data;
        }
    }
    public function remove($id, $order_id)
    {
        $qr = "SELECT quantity FROM order_details WHERE product_code = :id AND order_id = :user";
        $pr = ["id" => $id, "user" => $order_id];
        $quantity = $this->db->getRow($qr, $pr);
        $quantity = $quantity["quantity"];
        // ----------------------------------------------------------------
        $qr = "SELECT item_price FROM items WHERE id_item = :id";
        $pr = ["id" => $id];
        $price = $this->db->getRow($qr, $pr);
        $price = $price["item_price"];
        // ----------------------------------------------------------------
        $qr = "SELECT total_amount FROM orders WHERE order_id = :id";
        $pr = ["id" => $order_id];
        $total_amont = $this->db->getRow($qr, $pr);
        $total_amont = $total_amont["total_amount"];
        // ----------------------------------------------------------------
        $qr = "DELETE FROM order_details WHERE product_code = :id AND order_id = :user";
        $pr = ["id" => $id, "user" => $order_id];
        $this->db->query($qr, $pr);
        $qr = "SELECT * FROM order_details WHERE order_id = :user";
        $pr = ["user" => $order_id];

        if ($this->db->getCount($qr, $pr) == 0) {
            $qr = "UPDATE `orders` SET `total_amount`= :all WHERE order_id = :user";
            $pr = ["all" => $total_amont - ($quantity * $price), "user" => $order_id];
            $this->db->getRow($qr, $pr);
            $qr = "UPDATE `orders` SET `manager_comment`= 'out of stock' WHERE order_id = :user";
            $pr = ["user" => $order_id];
            $this->db->getRow($qr, $pr);
            $qr = "UPDATE `orders` SET `id_status`= 3 WHERE order_id = :user";
            $pr = ["user" => $order_id];
            $this->db->getRow($qr, $pr);
            return false;
        } else {
            $qr = "UPDATE `orders` SET `total_amount`= :all WHERE order_id = :user";
            $pr = ["all" => $total_amont - ($quantity * $price), "user" => $order_id];
            $this->db->getRow($qr, $pr);
            return true;
        }


    }
}