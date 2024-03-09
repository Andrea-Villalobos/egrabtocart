<?php
    // If the file is not found, a fatal error is thrown and the program stops. If the file was already included previously, this statement will not include it again
    require_once('connect.php');

    if (isset($_GET['id'])) {
        $product_id = mysqli_real_escape_string($conn, $_GET['id']);

        // Get the record you want to archive before deleting it
        $sql = mysqli_query($conn, "SELECT * FROM products WHERE product_id = $product_id");

        if (!$sql) {
            die("Delete query failed: " . mysqli_error($conn));
        }
    
        // Redirect back to the original page (e.g., orders.php) after successful deletion
        header("Location: products.php");
        exit();
    } 
?>