<?php

require_once "./src/utils/mysql/src/mop.php";

class MySQLConnection
{
	private $host;
	private $username;
	private $password;
	private $database;
	private $connectType;

	/**
	 * @var \Mysql\mop
	 */
	private $connection;

	protected function __construct($host, $username, $password, $database, $type = "Mysqli")
	{
		$this->host = $host;
		$this->username = $username;
		$this->password = $password;
		$this->database = $database;
		$this->connectType = $type;
	}

	/**
	 * connect to the database
	 */
	protected function connect()
	{
		$this->connection = new Mysql\mop($this->host, $this->username, $this->password, $this->database, $this->connectType);

		if ($this->connection->error) return false;

		return true;
	}

	protected function prepareAllProducts()
	{
		$query = "SELECT Products.*, Categories.name AS category_name FROM Products INNER JOIN Categories ON Products.category_id = Categories.id;";

		$this->connection->query($query);

		$this->connection->run();

		if ($this->connection->num_of_rows == 0) return false;
		
		return true;
	}

	protected function prepareAllPurchasesCustomers()
	{
		$query = "SELECT customers.name, customers.email, customers.phonenumber FROM customers INNER JOIN orders ON orders.customer_email = customers.email AND orders.status = 'successful';";

		$this->connection->query($query);

		$this->connection->run();

		if ($this->connection->num_of_rows == 0) return false;
		
		return true;
	}

	//not currently in use
	protected function prepareAllSuccessfulOrders()
	{
		$query = "SELECT orders.customer_email AS email, orders.id AS orderId, orders.created_at AS createdAt, orderitems.product_id AS productId, orderitems.quantity AS quantity, orderitems.price AS price, products.name AS name, products.image AS image FROM orders JOIN orderitems ON orders.id = orderitems.order_id JOIN products ON orderitems.product_id = products.id WHERE orders.status = 'successful';";

		$this->connection->query($query);

		$this->connection->run();

		if ($this->connection->num_of_rows == 0) return false;
		
		return true;
	}

	protected function prepareAllOrders()
	{
		$query = "SELECT orders.customer_email AS email, orders.id AS orderId, orders.created_at AS createdAt, orders.status AS status, orderitems.product_id AS productId, orderitems.quantity AS quantity, orderitems.price AS price, products.name AS name, products.image AS image FROM orders JOIN orderitems ON orders.id = orderitems.order_id JOIN products ON orderitems.product_id = products.id;";

		$this->connection->query($query);

		$this->connection->run();

		if ($this->connection->num_of_rows == 0) return false;
		
		return true;
	}

	protected function listColumn(mixed $column)
	{
		return $this->connection->get_column($column);
	}

	protected function disconnect()
	{
		$this->connection->close();
	}

}
