<?php
// If the file is not found, a fatal error is thrown and the program stops. If the file was already included previously, this statement will not include it again
require_once('connect.php');

// This function must always (with few exceptions) be used to make data safe before sending a query to MySQL
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

$sql = "INSERT INTO orders (cust_firstname, cust_lastname, region, province, city, barangay, street, order_product, quantity, total_price) 
VALUES ('$cust_firstname', '$cust_lastname', '$region', '$province', '$city', '$barangay','$street', '$order_product', '$quantity', '$total_price')";

if (mysqli_query($conn, $sql)) {
    session_start();
    $_SESSION['success'] = true;
    header("location: order-add.php");
    exit();
} else {
    echo "ERROR: Hush! Sorry $sql. " . mysqli_error($conn);
    mysqli_close($conn);
}
?>

