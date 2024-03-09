<?php
session_start();
require_once('connect.php');

if(isset($_SESSION["username"])) {
  $sql = "SELECT * FROM orders";
  $sql1 = "SELECT DISTINCT MONTH(date_order) AS month FROM orders";
  $sql2 = "SELECT MONTH(date_order) AS month ,COUNT(*) AS num_rows FROM orders GROUP BY MONTH(date_order)";
  $sql3 = "SELECT * FROM products";
  $result = mysqli_query($conn, $sql);
  $result1 = mysqli_query($conn, $sql1);
  $result2 = mysqli_query($conn, $sql2);
  $result3 = mysqli_query($conn, $sql3);
  $result4 = mysqli_query($conn, $sql3);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin | Product Performance </title>
  <link rel="icon" type="image/x-icon" href="images/favicon.ico">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link href="https://fonts.googleapis.com/css2?family=Alkatra:wght@600&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Crimson+Pro&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Bungee&display=swap" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="adminlte.min.css">
  <link rel="stylesheet" href="font/font.css">
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
              <img src="../../dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
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
              <img src="../../dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
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
              <img src="../../dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
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
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item">
                <a href="index.php" class="nav-link">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Sales Dashboard
                  </i>
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
                          <a href="#" class="nav-link active">
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
                      <i class="nav-icon far fa-calendar-alt"></i>
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
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Product Performance</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Product Performance</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- TABLE -->
       <div class="col-md-5">
        <div class="card" style="height: 400px; overflow: auto;">
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
            <table id="example1" class="table table-striped table-valign-middle">
              <thead>
                <tr>
                  <th>Product Name</th>
                  <th>Price</th>
                  <th>Sales</th>
                </tr>
              </thead>
              <tbody>
              <?php
                if (mysqli_num_rows($result4) > 0) {
                  while ($row = mysqli_fetch_assoc($result4)) {
                    $product_imagetable = $row['product_image'];
                    $product_nametable = $row['product_name'];
                    $product_pricetable = $row['product_price'];

                    $salesQuery = "SELECT SUM(quantity) AS total_sales, order_product FROM orders WHERE order_product = '$product_nametable'";
                    $salesResult = mysqli_query($conn, $salesQuery);

                    if ($salesResult && mysqli_num_rows($salesResult) > 0) {
                      $salesRow = mysqli_fetch_assoc($salesResult);
                      $totalSales = $salesRow['total_sales'];
                    } else {
                      $totalSales = 0;
                    }
                ?>
                    <tr>
                      <td>
                        <?php echo '<img src="' . $product_imagetable . '" alt="Product 1" class="img-circle img-size-32 mr-2">'; ?>
                        <?php echo $product_nametable; ?>
                      </td>
                      <td><?php echo $product_pricetable; ?> PHP</td>
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
      <!-- DONUT CHART -->
      <div class="col-md-7">
        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title">Products Sold</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <div class="chart">
              <canvas id="chartjs_donut" style="height: 310px;" ></canvas>
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
   
      <!-- LINE CHART -->
      <div class="col-md-7">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Monthly Order Sales</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <div class="chart">
              <canvas id="chartjs_line" style="height: 200px;" ></canvas>
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>


<?php 

        $chart_data1 = "";
        if (mysqli_num_rows($result3) > 0) {
          while ($row = mysqli_fetch_assoc($result3)) {
              $product_name = $row['product_name'];
              $array_products[] = $product_name;
  
              $salesQuery = "SELECT SUM(quantity) AS total_sales, order_product FROM orders WHERE order_product = '$product_name'";
              $salesResult = mysqli_query($conn, $salesQuery);
              
              if ($salesResult && mysqli_num_rows($salesResult) > 0) {
                  $salesRow = mysqli_fetch_assoc($salesResult);
                  $totalSales = $salesRow['total_sales'];
                  $array_totalSales[] = $totalSales;
              } 
          }
          mysqli_close($conn);
        }
        
        
        $chart_data2 = "";
        while($row = mysqli_fetch_array($result)){
          $order_product[] = $row['order_product'];
          $quantity[] = $row['quantity'];
    }

       $monthArray = array();
        while($row = mysqli_fetch_array($result1)){
          $month = $row['month'];
          $monthArray[] = $month;
        }
          
      foreach ($monthArray as &$month) { // Use the reference & to modify the array elements directly
        switch ($month) {
            case '1':
                $month = 'JANUARY';
                break;
            case '2':
                $month = 'FEBRUARY';
                break;
            case '3':
                $month = 'MARCH';
                break;
            case '4':
                $month = 'APRIL';
                break;
            case '5':
                $month = 'MAY';
                break;
            case '6':
                $month = 'JUNE';
                break;
            case '7':
                $month = 'JULY';
                break;
            case '8':
                $month = 'AUGUST';
                break;
            case '9':
                $month = 'SEPTEMBER';
                break;
            case '10':
                $month = 'OCTOBER';
                break;
            case '11':
                $month = 'NOVEMBER';
                break;
            case '12':
                $month = 'DECEMBER';
                break;
        }
      }
    
        
          $num_rows_array = [];

          // Loop through the results and extract the 'num_rows' column value for each month
          while ($row = mysqli_fetch_assoc($result2)) {
             $num_rows_array[] = $row['num_rows'];
          }
          
  ?>
     <!-- MONTHLY ORDER TABLE -->
     <div class="col-md-5">
        <div class="card" style="height: 477px; overflow: auto;">
          <div class="card-header border-0">
            <h3 class="card-title">Monthly Order Count</h3>
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
          <table id="example1" class="table table-striped table-valign-middle">
      <thead>
        <tr>
          <th>Month</th>
          <th>Total Sales</th>
        </tr>
      </thead>
      <tbody>
        <?php
        // Loop through the monthArray and num_rows_array to display the data in the table
        for ($i = 0; $i < count($monthArray); $i++) {
          $monthword = $monthArray[$i];
          $totalSales = $num_rows_array[$i];
        ?>
        <tr>
          <td><?php echo $monthword; ?></td>
          <td><?php echo $totalSales; ?></td>
        </tr>
        <?php
        }
        ?>
            </tbody>
          </table>
          </div>
              </div>
              <!-- /.card -->
            </div>
            </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </section>
          <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
      </div>

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


      var ctx1 = document.getElementById("chartjs_donut").getContext('2d');
      var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,}
      var myChart = new Chart(ctx1,{
          type: 'doughnut',
          data: {
            labels:<?php echo json_encode($array_products); ?>,
            datasets: [{
              backgroundColor: backgroundColors,
              borderColor: '#ffc107',
              pointBorderColor: '#ffc107',
              pointBackgroundColor: '#ffc107',
              data: <?php echo json_encode($array_totalSales);?>
            }]
          },
          options: donutOptions,
    });
    
  var ctx2 = document.getElementById("chartjs_line").getContext('2d');
      var myChart = new Chart(ctx2,{
          type: 'line',
          data: {
            labels:<?php echo json_encode($monthArray); ?>,
            datasets: [{
              backgroundColor: 'transparent',
              borderColor: '#ffc107',
              pointBorderColor: '#ffc107',
              pointBackgroundColor: '#ffc107',
              data: <?php echo json_encode($num_rows_array);?>
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
            display: false,
            lineWidth: '4px',
            color: 'rgba(0, 0, 0, .2)',
            zeroLineColor: 'transparent'
          },
        }],
        xAxes: [{
          display: true,
          gridLines: {
            display: false
          },
        }]
      }
    }
      })
    })

    </script>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Add Content Here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page specific script -->
</body>
</html>
<?php } else {header("location:login.php");} ?>