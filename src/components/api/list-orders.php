<?php

require_once "./src/components/api/db.php";

$db = new DB();

try {
	if (!$db->Orders()) throw new Exception("Orders are empty"); {
		$email = $db->column("email");

		$orderId = $db->column("orderId");

		$createdAt = $db->column("createdAt");

		$status = $db->column("status");

		$productId = $db->column("productId");

		$quantity = $db->column("quantity");

		$price = $db->column("price");

		$name = $db->column("name");

		$image = $db->column("image");

		// Initialize the response array
		$data = array();

		// Loop through the arrays and format the data
		for ($i = 0; $i < count($email); $i++) {
			$e = $email[$i];
			$o = $orderId[$i];
			$c = $createdAt[$i];
			$st = $status[$i];
			$p = $productId[$i];
			$q = $quantity[$i];
			$pr = $price[$i];
			$na = $name[$i];
			$im = $image[$i];

			// Check if the email already exists in the response array
			if (isset($data[$e])) {
				// Add the item to the existing order
				$data[$e]["items"][] = array(
					"productId" => $p,
					"quantity" => $q,
					"price" => $pr,
					"name" => $na,
					"image" => $im
				);
			} else {
				// Create a new order
				$data[$e] = array(
					"email" => $e,
					"orderId" => $o,
					"createdAt" => $c,
					"status" => $st,
					"items" => array(
						array(
							"productId" => $p,
							"quantity" => $q,
							"price" => $pr,
							"name" => $na,
							"image" => $im
						)
					)
				);
			}
		}

		header("Content-Type: application/json");
		$response = array("statusCode" => 200, "error" => "", "data" => array_values($data));
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
