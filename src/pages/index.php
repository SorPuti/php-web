<!DOCTYPE html>
<html lang="en">

<head>
	<?php require_once "./src/components/pages/meta-links.php"; ?>

	<title>cloth company api</title>
</head>

<body class="w-full min-h-screen bg-base-200 overflow-x-hidden bg-cyan-800">

	<div class="flex justify-center items-center h-screen flex-col">
		<h1 class="font-extrabold text-lg text-white">WELCOME TO CLOTHING API</h1>

		<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 mt-5 w-full px-3">
			<div class="border border-orange-300 flex flex-col rounded-lg p-5 items-center">
				<span class="font-mono font-medium text-base text-white">list all products</span>
				<div>
					<span class="bg-orange-300 rounded-lg px-1">
						GET
					</span>
					<a href="/products" class="bg-orange-300 rounded-lg px-1 ml-2">
						/products
					</a>
				</div>
				<span class="text-sm mt-2 text-white">products offered by the clothing company</span>
			</div>

			<div class="border border-red-300 flex flex-col rounded-lg p-5 items-center">
				<span class="font-mono font-medium text-base text-white">list all customers</span>
				<div>
					<span class="bg-red-300 rounded-lg px-1">
						GET
					</span>
					<a href="/customers" class="bg-red-300 rounded-lg px-1 ml-2">
						/customers
					</a>
				</div>
				<span class="text-sm mt-2 text-white">customers who have made purchases from the clothing company</span>
			</div>

			<div class="border border-green-300 flex flex-col rounded-lg p-5 items-center">
				<span class="font-mono font-medium text-base text-white">list all orders</span>
				<div>
					<span class="bg-green-300 rounded-lg px-1">
						GET
					</span>
					<a href="/orders" class="bg-green-300 rounded-lg px-1 ml-2">
						/orders
					</a>
				</div>
				<span class="text-sm mt-2 text-white">orders made by customers</span>
			</div>
		</div>
	</div>

</body>

</html>