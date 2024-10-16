<?php

namespace Cleaf\Config;

class View
{

    public static function render(string $view, array $data = [])
    {
        extract($data);
        require __DIR__ . '/../../views/layout/header.php';
        require __DIR__ . "/../../views/$view.php";
        require __DIR__ . '/../../views/layout/footer.php';
    }
}
