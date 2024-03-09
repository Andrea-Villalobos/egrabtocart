 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Orders</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Orders</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
      <div class="col-md-4">
      <img src="images/addorder.png" style="max-width: 100%; height: auto;">
         </div>
        <div class="col-md-8">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Order </h3>
              <div class="card-tools">
              </div>
            </div>
            <form method="post" action="insert-order.php" >
            <div class="card-body">
              <div class="form-group">
                <label for="cust_firstname">Customer First Name</label>
                <input type="text" id="cust_firstname" name="cust_firstname" class="form-control" pattern="[A-Za-z ]{1,50}" title="Please enter letters & space only, min of 1 character."required>
              </div>
              <div class="form-group">
                <label for="cust_lastname">Customer Last Name</label>
                <input type="text" id="cust_lastname" name="cust_lastname" class="form-control" pattern="[A-Za-z ]{1,50}" title="Please enter letters & space only, min of 1 character." required>
              </div>
              <div class="form-group">
              <label for="cust_address">Address</label>
              <input type="text" id="cust_address" name="cust_address" class="form-control" required>
              </div>
              <div class="form-group">
              <?php
                $query = "SELECT product_name, product_price FROM products";
                $result = mysqli_query($conn, $query);
                $products = array();
                while ($row = mysqli_fetch_assoc($result)) {
                    $products[] = $row;
                }
              ?>
                <label for="order_product">Item:</label>
                <select name="order_product" id="order_product" required>
                  <option value="" disabled selected>Select a product</option>
                    <?php foreach ($products as $product_name) { ?>
                        <option value="<?php echo $product_name['product_name']; ?>">
                            <?php echo $product_name['product_name']; ?>
                        </option>
                    <?php } ?>
                </select>
              </div>
                <input type="hidden" id="product_price" name="product_price">
              <div class="form-group">
                <label for="quantity">Qty</label>
                <input type="number" min="1" id="quantity" name="quantity" class="form-control" required>
              </div>
              <!-- Display the calculated total price -->
              <div class="form-group">
                <label for="total_price">Total Price</label>
                <input type="number" id="total_price" name="total_price" class="form-control" placeholder="0.00" step="0.01" readonly>
              </div>
                <script>
                   // JavaScript code to calculate and update the total price
                  document.getElementById('order_product').addEventListener('change', function() {
                      var productIndex = this.selectedIndex;
                      var productPrice = <?php echo json_encode($products); ?>[productIndex - 1].product_price;
                      document.getElementById('product_price').value = productPrice;
                      updateTotalPrice();
                  });

                  document.getElementById('quantity').addEventListener('input', updateTotalPrice);

                  function updateTotalPrice() {
                      var quantity = parseInt(document.getElementById('quantity').value) || 0;
                      var productPrice = parseFloat(document.getElementById('product_price').value) || 0;
                      var totalPrice = quantity * productPrice;
                      document.getElementById('total_price').value = totalPrice.toFixed(2);
                  }
              </script>
             </div>
            </div>
             <div class="row">
              <div class="col-12">
                 <a href="#" class="btn btn-secondary">Cancel</a>
                 <a href="orders.php" class="btn btn-warning btn"><b> > Check full order list</b></a>
                 <input type="submit" value="Add Order" class="btn btn-success float-right">
               </div>
               </div>
              </form>
              <?php
                  if (isset($_SESSION['success']) && $_SESSION['success']) {
                      echo '<script>alert("Order Added Successfully!");</script>';
                      unset($_SESSION['success']);
                  }
                ?>
            <!-- /.card-body -->
          </div>
         
          <!-- /.card -->
        </div>
       
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->