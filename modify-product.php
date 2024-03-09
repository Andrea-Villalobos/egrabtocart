<?php

require_once('connect.php');

if (isset($_POST['update'])) {
    
    
    if (isset($_FILES['product_image'])) {
        $file_name = $_FILES['product_image']['name'];
        $file_tmp = $_FILES['product_image']['tmp_name'];
        $file_type = $_FILES['product_image']['type'];
        $file_size = $_FILES['product_image']['size'];

       
        $allowed_extensions = array('jpg', 'jpeg', 'png'); 
        $max_file_size = 5 * 1024 * 1024; 

        
        $file_extension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

        
        if (!in_array($file_extension, $allowed_extensions)) {
            echo "ERROR: Invalid file extension. Only JPG, JPEG, and PNG files are allowed.";
            exit();
        }

        
        if ($file_size > $max_file_size) {
            echo "ERROR: File size exceeds the maximum limit of 5MB.";
            exit();
        }

        $upload_dir = 'images/'; 
        $target_file = $upload_dir . basename($file_name);

        if (move_uploaded_file($file_tmp, $target_file)) {
            echo "Product image uploaded successfully.";

            $product_id = mysqli_real_escape_string($conn, $_POST['product_id']);
            $product_name = mysqli_real_escape_string($conn, $_POST['product_name']);
            $product_description = mysqli_real_escape_string($conn, $_POST['product_description']);
            $product_price = mysqli_real_escape_string($conn, $_POST['product_price']);

            $sql = "UPDATE products SET product_name = '$product_name', product_description = '$product_description', product_price = '$product_price',
                    product_image = '$target_file' WHERE product_id = '$product_id'";

            if (mysqli_query($conn, $sql)) {
                session_start();
                $_SESSION['success'] = true;
                header("location: edit_product.php");
                exit();
            } else {
                echo "ERROR: Sorry, there was an error updating the product. " . mysqli_error($conn);
                mysqli_close($conn);
            }
        } else {
            echo "ERROR: Sorry, there was an error uploading the product image.";
        }
    } else {
        echo "ERROR: No product image uploaded.";
    }
}
?>
