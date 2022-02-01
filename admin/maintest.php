<?php
    include '../connect.php';

    $countpro="SELECT * FROM product"; 
    $query = $con->query($countpro);
    $fetch = mysqli_fetch_array($query);
    $resultcountpro = mysqli_num_rows($query);

    $countsup="SELECT * FROM supplier"; 
    $query = $con->query($countsup);
    $fetch = mysqli_fetch_array($query);
    $resultcountsup = mysqli_num_rows($query);

    $countorder="SELECT * FROM orders"; 
    $query = $con->query($countorder);
    $fetch = mysqli_fetch_array($query);
    $resultcountorder = mysqli_num_rows($query);

    $customer="SELECT * FROM customer WHERE position='customer'";
    $resultcust=$con->query($customer);

    $employees="SELECT * FROM employee";
    $resultemp=$con->query($employees);

    $product="SELECT * FROM product";
    $resultpro=$con->query($product);

    $category="SELECT * FROM category";
    $resultcate=$con->query($category);

    $brand="SELECT * FROM brand";
    $resultbrand=$con->query($brand);

    $orders="SELECT * FROM orders";
    $resultor=$con->query($orders);
?>
<div class="container-fluid">
        <!-- Show Data -->
          <div class="row">
            <!-- Show Product -->
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">inventory_2</i>
                  </div>
                  <p class="card-category">Product</p>
                  <h3 class="card-title"><?php echo $resultcountpro ?></h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">edit</i>
                    <a href="./index.php?page=product">Product Managemane</a>
                  </div>
                </div>
              </div>
            </div>
            <!-- Show Supplier -->
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">supervisor_account</i>
                  </div>
                  <p class="card-category">Supplier</p>
                  <h3 class="card-title"><?php echo $resultcountsup ?></h3></h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">edit</i>
                    <a href="./index.php?page=supplier">Supplier Managemane</a>
                  </div>
                </div>
              </div>
            </div>
            <!-- Show Orders -->
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">filter_frames</i>
                  </div>
                  <p class="card-category">Orders</p>
                  <h3 class="card-title"><?php echo $resultcountorder ?></h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                  <i class="material-icons">edit</i>
                    <a href="./index.php?page=order">Orders Managemane</a>
                  </div>
                </div>
              </div>
            </div>
            <!-- Show Orders for input track -->
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">info_outline</i>
                  </div>
                  <p class="card-category">Orders</p>
                  <h3 class="card-title"><?php echo $resultcountorder ?></h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">pending_actions</i>
                    <a href="./index.php?page=product">Tracked from Orders</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- End Show Product -->
          

          <!-- Show Data Emp&Cust -->
            <div class="row">
              <!-- Show Head Data -->
              <div class="col-lg-6 col-md-12">
                <div class="card">
                  <div class="card-header card-header-tabs card-header-success">
                    <div class="nav-tabs-navigation">
                      <div class="nav-tabs-wrapper">
                        <ul class="nav nav-tabs" data-tabs="tabs">
                          <li class="nav-item">
                            <a class="nav-link active" href="#customer" data-toggle="tab">
                              <i class="material-icons">person</i> Customer
                              <div class="ripple-container"></div>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="#employees" data-toggle="tab">
                              <i class="material-icons">person</i> Employees
                              <div class="ripple-container"></div>
                            </a>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <!-- Show Data Customer -->
                  <div class="card-body">
                    <div class="tab-content">
                      <div class="tab-pane active" id="customer">
                      <table class="table table-hover">
                      <thead class="text-dark">
                        <th>ลำดับ</th>
                        <th>ชื่อผู้ใช้</th>
                        <th>วันที่เข้าร่วม</th>
                      </thead>
                      <tbody>
                      <?php 
                        $i=1;
                        while($row=mysqli_fetch_array($resultcust)){?>
                        <tr>
                          <td><?php echo $row['cust_id'] ?></td>
                          <td><?php echo $row['cust_name'] ?></td>
                          <td><?php echo $row['enable'] ?></td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                    <!-- Show Data Customer -->
                      </div>
                    <div class="tab-pane" id="employees">
                      <table class="table">
                        <thead class="text-dark">
                          <th>รหัสพนักงาน</th>
                          <th>ชื่อพนักงาน</th>
                          <th>เบอร์ติดต่อ</th>
                          <th>ตำแหน่ง</th>
                        </thead>
                        <tbody>
                        <?php 
                          $i=1;
                          while($row=mysqli_fetch_array($resultemp)){?>
                          <tr>
                            <td><?php echo $row['emp_no'] ?></td>
                            <td><?php echo $row['emp_name'] ?></td>
                            <td><?php echo $row['phone'] ?></td>
                            <td><?php echo $row['position'] ?></td>
                          </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          <!-- End Show Data Emp&Cust --> 


          <!-- Show Data Orders --> 
          <div class="col-lg-6 col-md-12">
              <div class="card">
                <div class="card-header card-header-success">
                  <h4 class="card-title">Orders</h4>
                  <p class="card-category">All Orders</p>
                </div>
                <div class="card-body table-responsive">
                  <table class="table table-hover">
                    <thead class="text-dark">
                      <th>เลขที่ออเดอร์</th>
                      <th>ลูกค้า</th>
                      <th>วันที่สั่ง</th>
                      <th>เวลาที่จ่าย</th>
                    </thead>
                    <tbody>
                    <?php 
                      $i=1;
                      while($row2=mysqli_fetch_array($resultor)){?>
                      <tr>
                        <td><?php echo $row2['orders_id'] ?></td>
                        <td><?php echo $row2['cust_id'] ?></td>
                        <td><?php echo $row2['order_time'] ?></td>
                        <td><?php echo $row2['payment_time'] ?></td>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
            </div>
          <!-- End Show Data Orders --> 

  
          <!-- Show Data Pro&Cate&Brand -->
            <div class="row">
              <!-- Show Head Data -->
                <div class="col-lg-12 col-md-12">
                  <div class="card">
                    <div class="card-header card-header-tabs card-header-success">
                      <div class="nav-tabs-navigation">
                        <div class="nav-tabs-wrapper">
                          <ul class="nav nav-tabs" data-tabs="tabs">
                            <li class="nav-item">
                              <a class="nav-link active" href="#product" data-toggle="tab">
                                <i class="material-icons">inventory_2</i> Product
                                <div class="ripple-container"></div>
                              </a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="#category" data-toggle="tab">
                                <i class="material-icons">inventory_2</i> Category
                                <div class="ripple-container"></div>
                              </a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="#brand" data-toggle="tab">
                                <i class="material-icons">inventory_2</i> Brand
                                <div class="ripple-container"></div>
                              </a>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <!-- Show Data Product -->
                    <div class="card-body">
                      <div class="tab-content">
                        <div class="tab-pane active" id="product">
                        <table class="table table-hover">
                        <thead class="text-dark">
                          <th>ลำดับ</th>
                          <th>ชื่อสินค้า</th>
                          <th>ราคาขาย</th>
                          <th>จำนวนในสต็อก</th>
                        </thead>
                        <tbody>
                        <?php 
                          $i=1;
                          while($row=mysqli_fetch_array($resultpro)){?>
                          <tr>
                            <td><?php echo $row['pro_id'] ?></td>
                            <td><?php echo $row['pro_name'] ?></td>
                            <td><?php echo $row['sale_price'] ?></td>
                            <td><?php echo $row['unit_stock'] ?></td>
                          </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                      </div>
                      <!-- Show Data Category -->
                      <div class="tab-pane" id="category">
                        <table class="table">
                          <thead class="text-dark">
                            <th>ลำดับ</th>
                            <th>ชื่อหมวดหมู่</th>
                          </thead>
                          <tbody>
                          <?php 
                            $i=1;
                            while($row2=mysqli_fetch_array($resultcate)){?>
                            <tr>
                              <td><?php echo $row2['cate_id'] ?></td>
                              <td><?php echo $row2['cate_name'] ?></td>
                            </tr>
                            <?php } ?>
                          </tbody>
                        </table>
                        </div>
                      <!-- Show Data Brand -->
                      <div class="tab-pane" id="brand">
                        <table class="table">
                          <thead class="text-dark">
                            <th>ลำดับ</th>
                            <th>ชื่อแบรนด์</th>
                          </thead>
                          <tbody>
                          <?php 
                            $i=1;
                            while($row2=mysqli_fetch_array($resultbrand)){?>
                            <tr>
                              <td><?php echo $row2['brand_id'] ?></td>
                              <td><?php echo $row2['brand_name'] ?></td>
                            </tr>
                            <?php } ?>
                          </tbody>
                          </table>
                          </div>
                        </div>
                    </div>
                  </div>
              </div>
          <!-- End Show Data Pro&Cate&Brand -->
          </div>
</div>