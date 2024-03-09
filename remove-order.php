<?php
// Include the database connection file
require_once("connect.php");

if (isset($_GET['id'])) {
    $order_id = mysqli_real_escape_string($conn, $_GET['id']);

   
    $select_query = mysqli_query($conn, "SELECT * FROM orders WHERE order_id = $order_id");
    $record_to_archive = mysqli_fetch_assoc($select_query);
    $archived_orderid = mysqli_real_escape_string($conn, $record_to_archive['order_id']);
    $archived_dateorder = mysqli_real_escape_string($conn, $record_to_archive['date_order']);
    $archived_firstname = mysqli_real_escape_string($conn, $record_to_archive['cust_firstname']);
    $archived_lastname = mysqli_real_escape_string($conn, $record_to_archive['cust_lastname']);
    $archived_region = mysqli_real_escape_string($conn, $record_to_archive['region']);
    $archived_province = mysqli_real_escape_string($conn, $record_to_archive['province']);
    $archived_city = mysqli_real_escape_string($conn, $record_to_archive['city']);
    $archived_barangay = mysqli_real_escape_string($conn, $record_to_archive['barangay']);
    $archived_street = mysqli_real_escape_string($conn, $record_to_archive['street']);
    $archived_orderproduct = mysqli_real_escape_string($conn, $record_to_archive['order_product']);
    $archived_quantity = mysqli_real_escape_string($conn, $record_to_archive['quantity']);
    $archived_totalprice = mysqli_real_escape_string($conn, $record_to_archive['total_price']);
   

    $archive_result = mysqli_query($conn, "INSERT INTO archived_orders (`order_id` ,`date_order` ,`cust_firstname`, `cust_lastname`, `region`, `province`, `city`, `barangay`, `street`, `order_product`, `quantity`, `total_price`) 
    VALUES ('$archived_orderid','$archived_dateorder', '$archived_firstname', '$archived_lastname', '$archived_region', '$archived_province', '$archived_city', '$archived_barangay', '$archived_street', '$archived_orderproduct', '$archived_quantity', '$archived_totalprice')");

    if (!$archive_result) {
        die("Archive query failed: " . mysqli_error($conn));
    }

    
    $delete_query = mysqli_query($conn, "DELETE FROM orders WHERE order_id = $order_id");

    if (!$delete_query) {
        die("Delete query failed: " . mysqli_error($conn));
    }

    
    header("Location: orders.php");
    exit();
}