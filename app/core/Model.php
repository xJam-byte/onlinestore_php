<?php
abstract class Model
{
    protected $db;

    public function __construct()
    {
        $this->db = new Database();
    }
    public function get_data()
    {
        // return data
    }
}