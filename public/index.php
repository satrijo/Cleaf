<?php
session_start();

/**
 * Cleaf Web Framework
 * Cleaf is a lightweight, open-source PHP web framework designed to simplify web development while maintaining flexibility and power.
 * Developed and maintained by Satriyo
 */

require __DIR__ . '/../vendor/autoload.php';

use Cleaf\Routes\Web;

Web::run();
