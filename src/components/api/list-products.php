<?php

require_once "./src/components/api/db.php";

$db = new DB();

try {
	if (!$db->products()) throw new Exception("Products are empty"); {

		$id	= $db->column("id");

		$name	= $db->column("name");

		$description	= $db->column("description");

		$price	= $db->column("price");

		$image	= $db->column("image");

		$category_id	= $db->column("category_id");

		$category_name = $db->column("category_name");

		$data = array_map(
			function (
				$id,
				$name,
				$description,
				$price,
				$image,
				$category_id,
				$category_name
			) {
				return [
					"id" => $id, "name" => $name, "description" => $description,
					"price" => $price, "image" => $image, "category_id" => $category_id, "category_name" => $category_name
				];
			},
			$id,
			$name,
			$description,
			$price,
			$image,
			$category_id,
			$category_name
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
