<?php
// constants
const BASE_PATH = __DIR__ . "/../";
const APP_PATH = __DIR__ . "/../app/";

function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";

    die();
}

require BASE_PATH . 'vendor/autoload.php';

require_once APP_PATH . 'application.php';
