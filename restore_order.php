<?php
// Include the database connection file
require_once("connect.php");

if (isset($_GET['id'])) {
    $order_id = mysqli_real_escape_string($conn, $_GET['id']);

    
    $select_query = mysqli_query($conn, "SELECT * FROM archived_orders WHERE order_id = $order_id");
    $record_to_restore = mysqli_fetch_assoc($select_query);
    $archived_date = mysqli_real_escape_string($conn, $record_to_restore['date_order']);
    $order_id =  mysqli_real_escape_string($conn, $record_to_restore['order_id']);
    $cust_firstname = mysqli_real_escape_string($conn, $record_to_restore['cust_firstname']);
    $cust_lastname = mysqli_real_escape_string($conn, $record_to_restore['cust_lastname']);
    $region_text = mysqli_real_escape_string($conn, $record_to_restore['region']);
    $province_text = mysqli_real_escape_string($conn, $record_to_restore['province']);
    $city_text = mysqli_real_escape_string($conn, $record_to_restore['city']);
    $barangay_text = mysqli_real_escape_string($conn, $record_to_restore['barangay']);
    $street_text = mysqli_real_escape_string($conn, $record_to_restore['street']);
    $order_product = mysqli_real_escape_string($conn, $record_to_restore['order_product']);
    $quantity = mysqli_real_escape_string($conn, $record_to_restore['quantity']);
    $total_price = mysqli_real_escape_string($conn, $record_to_restore['total_price']);

    

    $archive_result = mysqli_query($conn, "INSERT INTO orders (`order_id`, `date_order`, `cust_firstname`, `cust_lastname`, `region`, `province`, `city`, `barangay`, `street`, `order_product`, `quantity`, `total_price`) 
                                            VALUES ('$order_id', '$archived_date', '$cust_firstname', '$cust_lastname', '$region_text', '$province_text', '$city_text', '$barangay_text', '$street_text', '$order_product', '$quantity', '$total_price')");


    if (!$archive_result) {
        die("Restore query failed: " . mysqli_error($conn));
    }

    // Delete the record from the archived_orders table
    $delete_query = mysqli_query($conn, "DELETE FROM archived_orders WHERE order_id = $order_id");

    if (!$delete_query) {
        die("Delete query failed: " . mysqli_error($conn));
    }

    header("Location: orders.php");
    exit();
}
?>
