<?php

$path = trim($_SERVER["REQUEST_URI"], "/");

$param = explode("/", $path);

if ($param[0] == null): require_once "./src/pages/index.php";

elseif ($param[0] == "products"): require_once "./src/pages/api/products.php";

elseif ($param[0] == "customers"): require_once "./src/pages/api/customers.php";

elseif ($param[0] == "orders"): require_once "./src/pages/api/orders.php";

else: require_once "./src/pages/api/404.php";

endif;
