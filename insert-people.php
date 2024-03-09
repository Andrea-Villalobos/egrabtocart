<?php
		//If the file is not found, a fatal error is thrown and the program stops. If the file was already included previously, this statement will not include it again
		require_once('connect.php');
		
		//This function must always (with few exceptions) be used to make data safe before sending a query to MySQL
        $emp_firstname = mysqli_real_escape_string($conn, $_POST['emp_firstname']);
		$emp_lastname = mysqli_real_escape_string($conn, $_POST['emp_lastname']);
		$position = mysqli_real_escape_string($conn, $_POST['position']);
        $salary = mysqli_real_escape_string($conn, $_POST['salary']);
		
		$sql = "INSERT INTO employees (emp_firstname, emp_lastname, position, salary) VALUES ('$emp_firstname','$emp_lastname',
			'$position', '$salary' )";
		
		if(mysqli_query($conn, $sql)){
            session_start();
            $_SESSION['success'] = true;
            header("location: people-add.php");
            exit();
		} else{
			echo "ERROR: Hush! Sorry $sql. "
				. mysqli_error($conn);
                mysqli_close($conn);
		}
		
		?>

