<?php
	include '../includes/connect.php';
	include '../includes/wallet.php';
	
	$total = 0;
	$address = htmlspecialchars($_POST['address']);
	$description =  htmlspecialchars($_POST['description']);
	$payment_type = $_POST['payment_type'];
	$total = $_POST['total'];

	$sql = "INSERT INTO orders (customer_id, payment_type, address, total, description) VALUES ($user_id, '$payment_type', '$address', $total, '$description')";
	if ($con->query($sql) === TRUE){
		$order_id =  $con->insert_id;
		foreach ($_POST as $key => $value)
		{
			if(is_numeric($key)){
				$result = mysqli_query($con, "SELECT * FROM items WHERE id = $key");
				while($row = mysqli_fetch_array($result)){
					$price = $row['price'];
					$old_stock = $row['stock'];
					echo "<br>Old Stock : " . $old_stock;
					$new_stock = $old_stock - $value;
					echo "<br>New Stock : " . $new_stock;

					if($new_stock >= 0) {
						$sql = "UPDATE items SET stock=$new_stock WHERE id = $key";
						if($con->query($sql)) {
							echo "<br>Stock Updated";
						} else {
							echo "<br>No Stock Updated";
						}
					} else if($new_stock <= 0){
						$set_availability = "UPDATE items SET deleted = 1 WHERE stock <= 0";
						$con->query($set_availability);
					}
				}
				
				$price = $value*$price;
				$sql = "INSERT INTO order_details (order_id, item_id, quantity, price) VALUES ($order_id, $key, $value, $price)";
				$con->query($sql) === TRUE;


			}
		}
		if($_POST['payment_type'] == 'Wallet'){
		$balance = $balance - $total;
		$sql = "UPDATE wallet_details SET balance = $balance WHERE wallet_id = $wallet_id;";
		$con->query($sql) === TRUE;
		}
			 header("location: ../orders.php");
	}

?>