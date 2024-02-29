<?php
class View
{
    public function generate($content, $template, $data = null)
    {

        if (is_array($data)) {
            extract($data);
        }
        include "../app/views/$template";

    }

    public function json($data = null)
    {
        header("Content-Type: application/json; charset=utf-8");
        echo json_encode($data);
    }
}