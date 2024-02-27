<?php
class View
{
    public function generate($content, $template, $data = null)
    {
        // ["title" => "Home"] -> $title = "Home"
        if (is_array($data)) {
            extract($data);
        }
        include "../app/views/$template";
    }
}