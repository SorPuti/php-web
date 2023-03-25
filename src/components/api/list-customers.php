<?php

require_once "./src/components/api/db.php";

$db = new DB();

try {
	if (!$db->purchasesCustomers()) throw new Exception("customers are empty"); {
		$email = $db->column("email");

		$name = $db->column("name");

		$phone = $db->column("phonenumber");

		$data = array_map(
			function (
				$name,
				$email,
				$phone,
			) {
				return [
					"name" => $name, "email" => $email, "phone" => $phone
				];
			},
			$name,
			$email,
			$phone
		);

		header("Content-Type: application/json");
		$response = array("statusCode" => 200, "error" => "", "data" => $data);
		$response = json_encode($response);
		echo $response;
		exit;
	}
} catch (\Throwable $error_msg) {
	header("Content-Type: application/json");
	$response = array("statusCode" => 200, "error" => $error_msg->getMessage(), "data" => array());
	$response = json_encode($response);
	echo $response;
	exit;
}
