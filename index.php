<?php
use ENV\DotEnv;

session_start();
session_regenerate_id();

require_once "./src/utils/env/index.php";


$server_name = $_SERVER['SERVER_NAME'];

if (strpos($server_name, 'localhost') !== false || strpos($server_name, '127.') === 0 || strpos($server_name, '192.168.') === 0) {
	(new DotEnv(__DIR__ . '/.env'))->load();
}

if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
	$uri = 'https://';
} else {
	$uri = 'http://';
}

$uri .= $_SERVER['HTTP_HOST'];

$request = $_SERVER['REQUEST_URI'];

$remove_slash = trim($request, "/");

// Remove forward slash and redirect
if (substr($request, -1) == '/' && $remove_slash != null) : header("location:" . $uri . "/" . $remove_slash, true, 301);

else : require_once "./src/utils/controller.php";

endif;
