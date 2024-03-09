<?php
session_start();
require_once('connect.php');

if(isset($_SESSION["username"])) {
  $sql = "SELECT * FROM orders";
  $sql1 = "SELECT * FROM products";
  $sql2 = "SELECT date_order, COUNT(*) AS order_count FROM orders GROUP BY date_order";
  $sql3 = "SELECT total_price FROM orders";

  $result = mysqli_query($conn, $sql);
  $result1 = mysqli_query($conn, $sql);
  $result2 = mysqli_query($conn, $sql1);
  $result3 = mysqli_query($conn, $sql);
  $result4 = mysqli_query($conn, $sql3);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin | Dashboard</title>
  <link rel="icon" type="image/x-icon" href="images/favicon.ico">

  <link href="https://fonts.googleapis.com/css2?family=Alkatra:wght@600&display=swap" rel="stylesheet">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="adminlte.min.css">
  <link rel="stylesheet" href="font/font.css">
</head>

<!-- Preloader -->
<?php include ('preloader.php'); ?>
<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->
<body class="hold-transition dark-mode sidebar-mini" style="font-family: 'shopee_2021extra_bold'; font-size:medium"  >
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
      <!-- Sidebar user panel (optional) -->
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
      <nav class="mt-2" style="font-family: 'shopee_2021extra_bold'">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
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
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>
                      Products
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="products.php" class="nav-link">
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
            </li>
          </ul>
          <br>
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
            <h1 class="m-0">Sales Dashboard </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Sales Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content" >
      <div class="container-fluid">
      <div class="row">
          <!-- Left col -->
          <div class="col-md-8">
            <img src="images/banner.png" style="max-width: 100%; height: auto;">
         </div>
      <div class="col-md-4">
            <!-- Info Boxes Style 2 -->
            <div class="info-box mb-3 bg-gradient-blue">
              <span class="info-box-icon"><i class="fas fa-tag"></i></span>
              <?php if (mysqli_num_rows($result) > 0) {
                $sum = 0; 
                while ($row = mysqli_fetch_assoc($result)) {
                    $value = $row['total_price'];
                    $sum += $value; 
                }   
            } ?>
              <div class="info-box-content">
                <span class="info-box-text">Orders</span>
                <span class="info-box-number"> <?php echo mysqli_num_rows($result); ?> </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <div class="info-box mb-3 bg-gradient-blue">
              <span class="info-box-icon"><i class="far fa-heart"></i></span>
            
              <?php
              if (mysqli_num_rows($result1) > 0) {
             $quantitySum = array(); 

              while ($row = mysqli_fetch_assoc($result1)) {
                  $product_name = $row['order_product'];
                  $quantity = $row['quantity'];

                  if (isset($quantitySum[$product_name])) {
                      $quantitySum[$product_name] += $quantity;
                  } else {
                      $quantitySum[$product_name] = $quantity;
                  }
              }

                $highestQuantity = 0;
                $highestProduct = '';

                    // Find the highest quantity and corresponding product name
                    foreach ($quantitySum as $product => $quantity) {
                        if ($quantity > $highestQuantity) {
                            $highestQuantity = $quantity;
                            $highestProduct = $product;
                        }
                    }
                }?>
              <div class="info-box-content">
                <span class="info-box-text">Top Product</span>
                <span class="info-box-number"><?php echo $highestProduct?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <div class="info-box mb-3 bg-gradient-blue">
              <span class="info-box-icon"><i class="fas fa-list"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Inventory</span>
                <span class="info-box-number"><?php echo mysqli_num_rows($result2)?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <div class="info-box mb-3 bg-gradient-blue">
              <span class="info-box-icon"><i class="far fa-credit-card"></i></span>
              <?php if (mysqli_num_rows($result3) > 0) {
                $sum = 0; 
                while ($row = mysqli_fetch_assoc($result3)) {
                    $value = $row['total_price'];
                    $sum += $value; 
                }   
            } ?>

          
              <div class="info-box-content">
                <span class="info-box-text">Total Sales</span>
                <span class="info-box-number"><?php echo number_format($sum); ?> PHP</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            </div>
            
    <?php 
               $currentDate = date("Y-m-d");
               // SQL query to count the number of orders for the current date
               $countorderquery = "SELECT COUNT(*) AS order_count FROM orders WHERE date_order = '$currentDate'";
               $resultorder = $conn->query($countorderquery);
               if ($resultorder->num_rows > 0) {
                 // If there is a result, fetch the order count
                 $row = $resultorder->fetch_assoc();
                 $orderCount = $row["order_count"];
               } else {
                 $orderCount = 0;
               }
               $orderCountToday = $orderCount;
               $date_count = 0;
               $resultsalesrate = mysqli_query($conn, $sql2);
               while ($row = mysqli_fetch_array($resultsalesrate)) {
                 $date_count += 1;
               }
               
               $averageSales = $sum / $date_count;
               
               $yesterday = date('Y-m-d', strtotime('-1 day'));
               // SQL query to count the number of orders for yesterday's date
               $countorderqueryYes = "SELECT COUNT(*) AS order_countYes FROM orders WHERE date_order = '$yesterday'";
               $resultorderYes = $conn->query($countorderqueryYes);
               if ($resultorderYes->num_rows > 0) {
                 // If there is a result, fetch the order count
                 $row = $resultorderYes->fetch_assoc();
                 $orderCountYes = $row["order_countYes"]; 
               } else {
                 $orderCountYes = 0;
               }
               
               $ordertodayminusyes = $orderCountToday - $orderCountYes;

                // SQL query to count the number of orders for the current date
                $sumsalesquerytoday = "SELECT SUM(total_price) AS sumsalesToday FROM orders WHERE date_order = '$currentDate'";
                $resultsalesToday = $conn->query($sumsalesquerytoday);
                if ($resultsalesToday) {
                  // Fetch the data from the query result
                  $row = $resultsalesToday->fetch_assoc();
                  
                  // Access the sumsalesToday value from the fetched row
                  $sumsalesToday = $row['sumsalesToday'];

                  $sumsalesToday = ($sumsalesToday !== null) ? $sumsalesToday : 0;
                  
                  // Free the result set
                  $resultsalesToday->free_result();
              } 

              // SQL query to count the number of orders for the current date
              $sumsalesqueryyesterday = "SELECT SUM(total_price) AS sumsalesYesterday FROM orders WHERE date_order = '$yesterday'";
              $resultsalesYesterday = $conn->query($sumsalesqueryyesterday);
              if ($resultsalesYesterday) {
                // Fetch the data from the query result
                $row = $resultsalesYesterday->fetch_assoc();
                
                // Access the sumsalesToday value from the fetched row
                $sumsalesYesterday = $row['sumsalesYesterday'];

                $sumsalesYesterday = ($sumsalesYesterday !== null) ? $sumsalesYesterday : 0;
                
                // Free the result set
                $resultsalesYesterday->free_result();
            } 

            $graphsales = $sumsalesToday - $sumsalesYesterday;


               
    ?>
    <!-- Main content -->
   
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">Order Count</h3>
                  <a href="javascript:void(0);">View Report</a>
                </div>
              </div>
              <div class="card-body">
                <div class="d-flex">
                  <p class="d-flex flex-column">
                    <span class="text-bold text-lg"><?php echo mysqli_num_rows($result); ?></span>
                    <span>Orders Over Time</span>
                  </p>
                  <p class="ml-auto d-flex flex-column text-right">
                  <?php if ($ordertodayminusyes == 0): ?>
                    <span class="text-warning">
                      <?php echo $ordertodayminusyes ?>
                      <i class="fas fa-equals"></i> 
                    </span>
                  <?php elseif ($ordertodayminusyes > 0): ?>
                    <span class="text-success">
                      <?php echo $ordertodayminusyes ?>
                      <i class="fas fa-arrow-up"></i> 
                    </span>
                  <?php else: ?>
                    <span class="text-danger">
                      <?php echo $ordertodayminusyes ?>
                      <i class="fas fa-arrow-down"></i> 
                    </span>
                  <?php endif; ?>
                  <span class="text-muted"> Since Yesterday</span>
                </p>
                  </p>
                </div>
                <!-- /.d-flex -->

                <div class="position-relative mb-4">
                  <canvas id="chartjs_line" height="100"></canvas>
                </div>

              </div>
            </div>
            <!-- /.card -->
            
            <div class="card">
              <div class="card-header border-0">
                <h3 class="card-title">Products</h3>
                <div class="card-tools">
                  <a href="#" class="btn btn-tool btn-sm">
                    <i class="fas fa-download"></i>
                  </a>
                  <a href="#" class="btn btn-tool btn-sm">
                    <i class="fas fa-bars"></i>
                  </a>
                </div>
              </div>
              <div class="card-body">
                <table id ="example1" class="table table-striped table-valign-middle">
                  <thead>
                  <tr>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Sales</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    if (mysqli_num_rows($result2) > 0) {
                        while ($row = mysqli_fetch_assoc($result2)) {
                            $product_image = $row['product_image'];
                            $product_name = $row['product_name'];
                            $product_price = $row['product_price'];


                            //bar graph product names
                            $array_products[] = $product_name;

                          $salesQuery = "SELECT SUM(quantity) AS total_sales, order_product FROM orders WHERE order_product = '$product_name'";
                          $salesResult = mysqli_query($conn, $salesQuery);
                          
                          if ($salesResult && mysqli_num_rows($salesResult) > 0) {
                              $salesRow = mysqli_fetch_assoc($salesResult);
                              $totalSales = $salesRow['total_sales'];
                              // para sa bar graph toooooo
                              $multiplied = $totalSales *$product_price;
                              $array_sales[] = $multiplied;
                              $highest_amount = max($array_sales);
                          } else {
                              $totalSales = 0;
                          }
                      ?>
                      <tr>
                          <td>
                              <?php echo '<img src="' . $product_image . '" alt="Product 1" class="img-circle img-size-32 mr-2">'; ?>
                              <?php echo $product_name; ?>
                          </td>
                          <td><?php echo $product_price; ?> PHP</td>
                          <td><?php echo $totalSales; ?></td>
                      </tr>
                      <?php 
                          }
                      } 
                      ?>
                  </tbody>
                </table>
              </div>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col-md-6 -->
          
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">Order Sales</h3>
                  <a href="javascript:void(0);">View Report</a>
                </div>
              </div>
              <div class="card-body">
                <div class="d-flex">
                  <p class="d-flex flex-column">
                    
                    <span class="text-bold text-lg"> ₱ <?php echo number_format($sum) ?></span>
                    <span>Total Product Sales</span>
                  </p>
                  <p class="ml-auto d-flex flex-column text-right">
                  <?php if ($graphsales == 0): ?>
                    <span class="text-warning">
                      <?php echo $graphsales ?> PHP
                      <i class="fas fa-equals"></i> 
                    </span>
                  <?php elseif ($graphsales > 0): ?>
                    <span class="text-success">
                      <?php echo $graphsales ?> PHP
                      <i class="fas fa-arrow-up"></i> 
                    </span>
                  <?php else: ?>
                    <span class="text-danger">
                      <?php echo $graphsales ?> PHP
                      <i class="fas fa-arrow-down"></i> 
                    </span>
                  <?php endif; ?>
                  <span class="text-muted"> Since Yesterday</span>
                </p>
                </div>
                <!-- /.d-flex -->

                <div class="position-relative mb-4">
                  <canvas id="chartjs_bar" height="100"></canvas>
                </div>

              </div>
            </div>
            <!-- /.card -->
            
              
            <div class="card">
              <div class="card-header border-0">
                <h3 class="card-title">Online Store Overview</h3>
                <div class="card-tools">
                  <a href="#" class="btn btn-sm btn-tool">
                    <i class="fas fa-download"></i>
                  </a>
                  <a href="#" class="btn btn-sm btn-tool">
                    <i class="fas fa-bars"></i>
                  </a>
                </div>
              </div>
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                  <p class="text-success text-xl">
                  <i class="ion ion-ios-arrow-thin-up"></i>
                  </p>
                  <p class="d-flex flex-column text-right">
                    <span class="font-weight-bold">
                      <i class="ion ion-android-arrow-up text-success"></i> <?php echo number_format($highest_amount, 2) ?>
                    </span>
                    <span class="text-muted">HIGHEST SALES AMOUNT OF A PRODUCT</span>
                  </p>
                </div>
                <!-- /.d-flex -->
                <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                  <p class="text-warning text-xl">
                    <i class="ion ion-ios-cart-outline"></i>
                  </p>
                  <p class="d-flex flex-column text-right">
                    <span class="font-weight-bold">
                      <i class="ion ion-android-arrow-up text-warning"></i> <?php echo number_format($averageSales, 2) ?>
                    </span>
                    <span class="text-muted"> SALES AVERAGE</span>
                  </p>
                </div>
                <!-- /.d-flex -->
                <div class="d-flex justify-content-between align-items-center mb-0">
                  <p class="text-danger text-xl">
                  <i class="ion ion-ios-information-outline"></i>
                  </p>
                  <p class="d-flex flex-column text-right">
                    <span class="font-weight-bold">
                      <i class="ion ion-android-arrow-up text-danger"></i> <?php echo $orderCount ?>
                    </span>
                    <span class="text-muted">TODAY'S ORDER COUNT</span>
                  </p>
                </div>
                <!-- /.d-flex -->
              </div>
            </div>
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

       
  <?php 
        $resultgraph1 = mysqli_query($conn,$sql2);
        $chart_data1 = "";
        while($row = mysqli_fetch_array($resultgraph1)){
              $date_order[] = $row['date_order'];
              $num_order[] = $row['order_count'];
        }
  ?>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
    <script type="text/javascript">
      $(function () {
  'use strict'

  var ticksStyle = {
    fontColor: '#495057',
    fontStyle: 'bold'
  }

  var mode = 'index'
  var intersect = true

      var ctx = document.getElementById("chartjs_bar").getContext('2d');
      var myChart = new Chart(ctx,{
          type: 'bar',
          data: {
            labels:<?php echo json_encode($array_products); ?>,
            datasets: [{
              backgroundColor: '#ffc107',
              borderColor: '#007bff',
              data: <?php echo json_encode($array_sales);?>
            }]
          },
          options: {
            legend: {
                  display:false,
                  position:'bottom',
                  labels: {
                      fontColor: '#71748d',
                      fontFamily: 'Circular Std Book',
                      fontSize: 14,
                  }
              },
      scales: {
        yAxes: [{
          // display: false,
          gridLines: {
            display: true,
            lineWidth: '4px',
            color: 'rgba(0, 0, 0, .2)',
            zeroLineColor: 'transparent'
          },
          ticks: $.extend({
            beginAtZero: true,

             //Include a peso sign in the ticks
            callback: function (value) {
              if (value >= 1000) {
               value /= 1000
               value += 'K'
             }
             return '₱' + value
            }
          }, ticksStyle)
        }],
        xAxes: [{
          display: true,
          gridLines: {
            display: false
          },
          ticks: ticksStyle
        }]
      }
    }
      });

      var ctx1 = document.getElementById("chartjs_line").getContext('2d');
      var myChart = new Chart(ctx1,{
          type: 'line',
          data: {
            labels:<?php echo json_encode($date_order); ?>,
            datasets: [{
              backgroundColor: 'transparent',
              borderColor: '#ffc107',
              pointBorderColor: '#ffc107',
              pointBackgroundColor: '#ffc107',
              data: <?php echo json_encode($num_order);?>
            }]
          },
          options: {
            legend: {
                  display:false,
                  position:'bottom',
                  labels: {
                      fontColor: '#71748d',
                      fontFamily: 'Circular Std Book',
                      fontSize: 14,
                  }
              },
      scales: {
        yAxes: [{
          // display: false,
          gridLines: {
            display: true,
            lineWidth: '4px',
            color: 'rgba(0, 0, 0, .2)',
            zeroLineColor: 'transparent'
          },
          ticks: $.extend({
            beginAtZero: true,
            callback: function (value) {
              if (value >= 1000) {
                value /= 1000
                value += 'k'
              }

              return value
            }
          }, ticksStyle)
        }],
        xAxes: [{
          display: true,
          gridLines: {
            display: false
          },
          ticks: ticksStyle
        }]
      }
    }
      });

    })

    
    </script>

<?php 
 $chart_data2 = "";
 while($row = mysqli_fetch_array($result)){
       $order_product[] = $row['order_product'];
       $quantity[] = $row['quantity'];
 }
?>

<script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
    <script type="text/javascript">
      $(function () {
  'use strict'

  var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
  var ticksStyle = {
    fontColor: '#495057',
    fontStyle: 'bold'
  }
  function getShadesOfYellow(numShades) {
    const baseHue = 50; // Hue for yellow in HSL color format
    const saturation = 90; // Saturation for yellow in HSL color format
    const lightnessStep = 85 / (numShades + 1);

    const shades = [];
    var baseColor = '#ffc';
    for (let i = 1; i <= numShades; i++) {
      const lightness = lightnessStep * i;
      const color = `hsl(${baseHue}, ${saturation}%, ${lightness}%)`;
      shades.push(color);
    }



    return shades;
  }
  var dataLabels = <?php echo json_encode($order_product); ?>;
  var dataQuantity = <?php echo json_encode($quantity); ?>;

  var backgroundColors = getShadesOfYellow(dataQuantity.length);
  var mode = 'index'
  var intersect = true


      var ctx2 = document.getElementById("chartjs_donut").getContext('2d');
      var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,}
      var myChart = new Chart(ctx2,{
          type: 'doughnut',
          data: {
            labels:<?php echo json_encode($order_product); ?>,
            datasets: [{
              backgroundColor: backgroundColors,
              borderColor: '#ffc107',
              pointBorderColor: '#ffc107',
              pointBackgroundColor: '#ffc107',
              data: <?php echo json_encode($quantity);?>
            }]
          },
          options: donutOptions,
         
          

    })
  })
    </script>
  
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
    </section>
  <!-- Main Footer -->
  </div>
  <!-- /.content-wrapper -->
  <?php include ('footer.php'); ?>
  </div>
<!-- ./wrapper -->

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
