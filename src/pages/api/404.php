<?php
header("Content-Type: application/json");
http_response_code(404);
$response = array('statusCode' => 404, 'error' => "api route could not be found");
$response = json_encode($response);
echo $response;
exit;
