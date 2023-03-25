<?php

require_once "./src/components/api/auth.php";

try {
	if ($_SERVER['REQUEST_METHOD'] !== 'GET') require_once "./src/pages/api/404.php"; {

		require_once "./src/components/api/list-products.php";

	}
} catch (\Throwable $error_msg) {
	header("Content-Type: application/json");
	$response = array('statusCode' => 400, 'error' => $error_msg->getMessage());
	$response = json_encode($response);
	echo $response;
}
