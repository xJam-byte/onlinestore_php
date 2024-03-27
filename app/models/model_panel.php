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


}