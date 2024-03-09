<?php
		//If the file is not found, a fatal error is thrown and the program stops. If the file was already included previously, this statement will not include it again
		require_once('connect.php');

		if (isset($_POST['update'])) {
			
			$order_id = mysqli_real_escape_string($conn, $_POST['order_id']);
			$cust_firstname = mysqli_real_escape_string($conn, $_POST['cust_firstname']);
			$cust_lastname = mysqli_real_escape_string($conn, $_POST['cust_lastname']);
			$region = mysqli_real_escape_string($conn, $_POST['region_text']);
			$province = mysqli_real_escape_string($conn, $_POST['province_text']);
			$city = mysqli_real_escape_string($conn, $_POST['city_text']);
			$barangay = mysqli_real_escape_string($conn, $_POST['barangay_text']);
			$street = mysqli_real_escape_string($conn, $_POST['street_text']);
			$order_product = mysqli_real_escape_string($conn, $_POST['order_product']);
			$quantity = mysqli_real_escape_string($conn, $_POST['quantity']);
			$total_price = mysqli_real_escape_string($conn, $_POST['total_price']);
			
			$result = mysqli_query($conn, "UPDATE orders SET `cust_firstname` = '$cust_firstname', `cust_lastname` = '$cust_lastname', 
			`region` = '$region', `province` = '$province', `city` = '$city', `barangay` = '$barangay', `street` = '$street',
			`order_product` = '$order_product', `quantity` = '$quantity', `total_price` = '$total_price'
			WHERE `order_id` = $order_id");
			

			if (!$result) {
				die("Update query failed: " . mysqli_error($conn));
			} else {
				header("Location: orders.php");
				exit(); 
			}
			
			} 
			
			?>

