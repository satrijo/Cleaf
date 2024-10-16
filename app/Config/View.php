<?php

namespace Cleaf\Config;

class View
{

    public static function render(string $view, array $data = [])
    {
        extract($data);
        require __DIR__ . "/../../views/$view.php";
    }
}
