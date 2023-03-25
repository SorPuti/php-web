<?php

try {
	$headers = getallheaders();

	if (!isset($headers["auth"])) throw new Exception("Unauthorized"); {
		$auth_header = $headers["auth"];
		$auth_value = base64_decode($auth_header);

		if ($auth_value !== "am_not_secure_but_use_me_anyway") throw new Exception("Unauthorized");
	}
} catch (\Throwable $error_msg) {
	header("Content-Type: application/json");
	http_response_code(401);
	$response = array("statusCode" => 401, "error" => $error_msg->getMessage(), "data" => "");
	$response = json_encode($response);
	echo $response;
	exit;
}
