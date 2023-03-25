<?php

require_once "mysql-connection.php";

class DB extends MySQLConnection
{
	public function __construct()
	{
		$host = getenv("DB_HOST");
		$username = getenv("DB_USERNAME");
		$password = getenv("DB_PASSWORD");
		$database = getenv("DB_NAME");

		parent::__construct($host, $username, $password, $database, "pdo");

		if (!parent::connect()) throw new Exception("Something went wrong, not you it was us.");
	}

	public function products()
	{
		return parent::prepareAllProducts();

		parent::disconnect();
	}

	public function purchasesCustomers()
	{
		return parent::prepareAllPurchasesCustomers();

		parent::disconnect();
	}

	public function successfulOrders()
	{
		return parent::prepareAllSuccessfulOrders();

		parent::disconnect();
	}

	public function Orders()
	{
		return parent::prepareAllOrders();

		parent::disconnect();
	}

	public function column(mixed $column)
	{
		return parent::listColumn($column);
	}
}
