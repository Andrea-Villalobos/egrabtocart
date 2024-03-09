<?php
session_start();
require_once('connect.php');

if(isset($_SESSION["username"])) {
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin | Products Grid View</title>
	<link rel="icon" type="image/x-icon" href="images/favicon.ico">

	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

	<link href="https://fonts.googleapis.com/css2?family=Alkatra:wght@600&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Crimson+Pro&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Bungee&display=swap" rel="stylesheet">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
	<!-- DataTables -->
	<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
	<link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="adminlte.min.css">
	<link rel="stylesheet" href="font/font.css">
	<style>
	.container {
		max-width: 1200px;
		margin: 0 auto;
		padding: 50px;
		display: flex;
		flex-wrap: wrap;
		justify-content: space-between;
	}

	.product {
		width: 22%;
		margin-bottom: 50px;
		box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.2);
		transition: box-shadow 0.3s ease-in-out;
	}

	.product:hover {
		box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
	}

	.product img {
		max-width: 100%;
		object-fit: cover;
		height: 250px;
	}

	.product-info {
		padding: 10px;
		background-color: #454D55;
		display: flex;
		flex-direction: column;
		align-items: center;
		text-align: center;
	}

	.product-info h3 {
		margin-top: 0;
		font-size: 1.5em;
		font-weight: bold;
	}

	.product-info p {
		margin-bottom: 0;
	}

	.product-price {
		font-size: 1.2em;
		font-weight: bold;
		margin-top: auto;
	}

	.list-container {
		max-width: 1200px;
		margin: 0 auto;
		padding: 50px;
		display: flex;
		flex-direction: column;
		align-items: center;
		text-align: center;
	}

	.list-item {
		width: 22%;
		margin-bottom: 50px;
		box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.2);
		transition: box-shadow 0.3s ease-in-out;
		display: flex;
		justify-content: space-between;
		align-items: center;
		padding: 20px;
	}

	.list-item:hover {
		box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
	}

	.list-item img {
		max-width: 40%;
		object-fit: cover;
		height: 250px;
	}

	.list-item-info {
		display: flex;
		flex-direction: column;
		align-items: center;
		text-align: center;
		width: 50%;
	}

	.list-item h3 {
		margin-top: 0;
		font-size: 1.5em;
		font-weight: bold;
		margin-bottom: 20px;
	}

	.list-item p {
		margin-bottom: 0;
		font-size: 1.2em;
		font-weight: bold;
		color: #f0f0f0;

	}

	.list-item-price {
		font-size: 1.2em;
		font-weight: bold;
		margin-top: auto;
	}
</style>
</head>

<!-- Preloader -->
<?php include ('preloader.php'); ?>

<body class="hold-transition dark-mode sidebar-mini" style="font-family: 'shopee_2021extra_bold'; font-size:medium">
	<div class="wrapper">
	  <!-- Navbar -->
	  <nav class="main-header navbar navbar-expand navbar-warning navbar-dark">
		<!-- Left navbar links -->
		<ul class="navbar-nav">
		  <li class="nav-item">
			<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
		  </li>
		  <li class="nav-item d-none d-sm-inline-block">
			<a href="index.php" class="nav-link">Home</a>
		  </li>
		  <li class="nav-item d-none d-sm-inline-block">
		  <a href="profile.php" class="nav-link">Account</a>
		  </li>
		</ul>
	
		<!-- Right navbar links -->
		<ul class="navbar-nav ml-auto">
		  <!-- Navbar Search -->
		  <li class="nav-item">
			<a class="nav-link" data-widget="navbar-search" href="#" role="button">
			  <i class="fas fa-search"></i>
			</a>
			<div class="navbar-search-block">
			  <form class="form-inline">
				<div class="input-group input-group-sm">
				  <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
				  <div class="input-group-append">
					<button class="btn btn-navbar" type="submit">
					  <i class="fas fa-search"></i>
					</button>
					<button class="btn btn-navbar" type="button" data-widget="navbar-search">
					  <i class="fas fa-times"></i>
					</button>
				  </div>
				</div>
			  </form>
			</div>
		  </li>
	
		  <!-- Messages Dropdown Menu -->
		  <li class="nav-item dropdown">
			<a class="nav-link" data-toggle="dropdown" href="#">
			  <i class="far fa-comments"></i>
			  <span class="badge badge-danger navbar-badge">3</span>
			</a>
			<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
			  <a href="#" class="dropdown-item">
				<!-- Message Start -->
				<div class="media">
				  <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
				  <div class="media-body">
					<h3 class="dropdown-item-title">
					  Brad Diesel
					  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
					</h3>
					<p class="text-sm">Call me whenever you can...</p>
					<p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
				  </div>
				</div>
				<!-- Message End -->
			  </a>
			  <div class="dropdown-divider"></div>
			  <a href="#" class="dropdown-item">
				<!-- Message Start -->
				<div class="media">
				  <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
				  <div class="media-body">
					<h3 class="dropdown-item-title">
					  John Pierce
					  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
					</h3>
					<p class="text-sm">I got your message bro</p>
					<p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
				  </div>
				</div>
				<!-- Message End -->
			  </a>
			  <div class="dropdown-divider"></div>
			  <a href="#" class="dropdown-item">
				<!-- Message Start -->
				<div class="media">
				  <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
				  <div class="media-body">
					<h3 class="dropdown-item-title">
					  Nora Silvester
					  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
					</h3>
					<p class="text-sm">The subject goes here</p>
					<p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
				  </div>
				</div>
				<!-- Message End -->
			  </a>
			  <div class="dropdown-divider"></div>
			  <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
			</div>
		  </li>
		  <!-- Notifications Dropdown Menu -->
		  <li class="nav-item dropdown">
			<a class="nav-link" data-toggle="dropdown" href="#">
			  <i class="far fa-bell"></i>
			  <span class="badge badge-danger navbar-badge">15</span>
			</a>
			<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
			  <span class="dropdown-item dropdown-header">15 Notifications</span>
			  <div class="dropdown-divider"></div>
			  <a href="#" class="dropdown-item">
				<i class="fas fa-envelope mr-2"></i> 4 new messages
				<span class="float-right text-muted text-sm">3 mins</span>
			  </a>
			  <div class="dropdown-divider"></div>
			  <a href="#" class="dropdown-item">
				<i class="fas fa-users mr-2"></i> 8 friend requests
				<span class="float-right text-muted text-sm">12 hours</span>
			  </a>
			  <div class="dropdown-divider"></div>
			  <a href="#" class="dropdown-item">
				<i class="fas fa-file mr-2"></i> 3 new reports
				<span class="float-right text-muted text-sm">2 days</span>
			  </a>
			  <div class="dropdown-divider"></div>
			  <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
			</div>
		  </li>
		  <li class="nav-item">
			<a class="nav-link" data-widget="fullscreen" href="#" role="button">
			  <i class="fas fa-expand-arrows-alt"></i>
			</a>
		  </li>
		  <li class="nav-item">
			<a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
			  <i class="fas fa-th-large"></i>
			</a>
		  </li>
		  <li class="nav-item">
			<a class="nav-link" href="logout.php" role="button">
			 Log Out
			</a>
		  </li>
		</ul>
	  </nav>
	  <!-- /.navbar -->
	
	  <!-- Main Sidebar Container -->
	  <aside class="main-sidebar sidebar-dark-warning elevation-4">
		<!-- Brand Logo -->
		<a href="index.php" class="brand-link">
			<div class="text-center">
				<div class="centered-container">
					<img src="images/transparent_shopicon.png" alt="Logo" style="opacity: .8; max-width: 40%; height: auto;">
				</div>
			</div><br>
			<span class="brand-text font-weight-light" style="font-family: 'Alkatra', cursive; font-size: 19px; display: block; text-align: center;">E-GRAB TO CART</span>
		</a>
	
		<!-- Sidebar -->
		<div class="sidebar">
		  <!-- Sidebar user (optional) -->
		  <div class="user-panel mt-3 pb-3 mb-3 d-flex">
			<div class="image">
			  <img src="images/user-circle.png" class="img-circle elevation-2" alt="User Image">
			</div>
			<div class="info">
			  <a href="profile.php" class="d-block"> 
			  <?php
			   $username = strtoupper($_SESSION['username']);
			   echo $username;
			  ?>
			  </a>
			</div>
		  </div>
	
		  <!-- SidebarSearch Form -->
		  <div class="form-inline">
			<div class="input-group" data-widget="sidebar-search">
			  <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
			  <div class="input-group-append">
				<button class="btn btn-sidebar">
				  <i class="fas fa-search fa-fw"></i>
				</button>
			  </div>
			</div>
		  </div>
	
		  <!-- Sidebar Menu -->
		<nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="index.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Sales Dashboard
              </p>
            </a>
            </li>
            <li class="nav-header">Orders</li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="nav-icon fas fa-shopping-cart"></i>
                  <p>
                    Orders
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="orders.php" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>Orders List</p>
                      </a>
                    </li>
                  </ul>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="order-add.php" class="nav-link">
                      <i class="nav-icon fas fa-edit"></i>
                        <p>Add Orders</p>
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="nav-header">Products</li>
                <li class="nav-item menu-open">
                  <a href="#" class="nav-link active">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>
                      Products
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="products.php" class="nav-link active">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>Products List</p>
                      </a>
                    </li>
                  </ul>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="project-add.php" class="nav-link">
                        <i class="nav-icon fas fa-shopping-basket"></i>
                        <p>Add Products</p>
                      </a>
                    </li>
                  </ul>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="chartjs.php" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>Product Performance</p>
                      </a>
                    </li>
                  </ul>
                  <li class="nav-header">People</li>
              <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-user-friends"></i>
                <p> People
                <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                        <li class="nav-item">
                          <a href="data.php" class="nav-link">
                            <i class="nav-icon fas fa-copy"></i>
                            <p>Employee List</p>
                          </a>
                        </li>
                      </ul>
                      <ul class="nav nav-treeview">
                        <li class="nav-item">
                          <a href="people-add.php" class="nav-link">
                            <i class="nav-icon fas fa-user-friends"></i>
                            <p>Add People</p>
                          </a>
                        </li>
                      </ul>
              </li>
          <li class="nav-header">My Account</li>
          <li class="nav-item">
            <a href="calendar.php" class="nav-link">
              <i class="nav-icon fas fa-calendar-alt"></i>
              <p>
                Calendar
                <span class="badge badge-info right">2</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="kanban.php" class="nav-link">
              <i class="nav-icon fas fa-columns"></i>
              <p>
                Kanban Board
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                Mailbox
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="mailbox.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inbox</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="compose.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Compose</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="read-mail.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Read</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-alt"></i>
              <p>
                Profile
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="profile.php" class="nav-link">
                  <i class="nav-icon fas fa-user-alt"></i>
                  <p>My Profile</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="logout.php" class="nav-link">
                  <i class="nav-icon fas fa-check-circle"></i>
                  <p>Log Out</p>
                </a>
              </li>
            </ul>
        </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
	  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 >List of Products</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Products</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
	</div><!-- /.content-header -->

	<div class="content">
      <div class="container-fluid">
	  	<div class="row">
	<?php
              $sql = "SELECT * FROM products";
              $result = mysqli_query($conn, $sql);

              if ($result) {
                  if (mysqli_num_rows($result) > 0) {?>
					<div class="container">
                     <?php while ($row = mysqli_fetch_assoc($result)) {
                          $product_image = $row['product_image'];
						 ?> 
						 <div class="product">
							<?php echo '<img src="' . $product_image . '" alt="Product Image" style="max-width: 100%; height: auto;">';?>
								<div class="product-info">
									<h3><?php echo strtoupper($row['product_name']); ?></h3>
									<p><?php echo $row['product_description']; ?></p>
									<div class="product-price"><?php echo $row['product_price']; ?> PHP </div>
								</div>
							</div>  
                         <?php
				  } ?> </div> 
                  <?php } else {
                      // No products found
                      echo "No product images found.";
                  }
                  mysqli_free_result($result);
              } else {
                  // Query execution failed
                  echo "ERROR: Unable to fetch product details. " . mysqli_error($conn);
                  exit();
              }
			
              // Close the database connection
              mysqli_close($conn);
          ?> 
		  <div class="container-fluid">
		  <a href="products.php" class="btn btn-warning float-right"><b> -> Back to List View</b></a> 
		  </div>
	  </div> <!-- /.row -->
	</div> <!-- /.container-fluid -->
	</div> <!-- /.content -->
  </div><!-- /.content-wrapper -->
  <aside class="control-sidebar control-sidebar-dark">
  	</aside>

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE -->
<script src="dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="plugins/chart.js/Chart.min.js"></script>
 <!-- /.content-wrapper -->
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard3.js"></script>

</body>
</html>
<?php } else {header("location:login.php");} ?>