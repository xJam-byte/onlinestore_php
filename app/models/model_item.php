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
}