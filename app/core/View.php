<?php
class View
{
    public function generate($content, $template, $data = null)
    {
        if (@$_GET["act"] == 'json') {
            header("Content-Type: application/json; charset=utf-8");
            echo json_encode($data);
        } else {
            if (is_array($data)) {
                extract($data);
            }
            include "../app/views/$template";
        }
    }
}