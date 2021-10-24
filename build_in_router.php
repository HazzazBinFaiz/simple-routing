<?php


$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if (file_exists($_SERVER['DOCUMENT_ROOT'] . $path)) {
    return false;
}

$_SERVER['SCRIPT_NAME'] = 'index.php';
include './public/index.php';