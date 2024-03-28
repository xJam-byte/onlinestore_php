<?php
class Model_Home extends Model
{
    public function get_data()
    {
        return [
            "title" => "Home"
        ];
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
}