<?php
    include '../connect.php';

    $countpro="SELECT * FROM product "; 
    $query = $con->query($countpro);
    $fetch = mysqli_fetch_array($query);
    $resultcountpro = mysqli_num_rows($query);

    $countmem="SELECT * FROM sale "; 
    $query = $con->query($countmem);
    $fetch = mysqli_fetch_array($query);
    $resultcountmem = mysqli_num_rows($query);

    $countpv="SELECT * FROM province"; 
    $query = $con->query($countpv);
    $fetch = mysqli_fetch_array($query);
    $resultcountpv = mysqli_num_rows($query);

    $counttran="SELECT * FROM transport"; 
    $query = $con->query($counttran);
    $fetch = mysqli_fetch_array($query);
    $resultcounttran = mysqli_num_rows($query);

    $customer = "SELECT * FROM customer WHERE position='customer'";
    $resultcust=$con->query($customer);

    $transport = "SELECT * FROM transport";
    $resultran=$con->query($transport);

    $province = "SELECT * FROM province";
    $resultpv=$con->query($province);

    $supplier="SELECT * FROM supplier";
    $resultsup=$con->query($supplier);
?>
<div class="container-fluid">
        <!-- Show Data -->
          <div class="row">
            <!-- Show Supplier -->
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
            <!-- Show Province -->
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">supervisor_account</i>
                  </div>
                  <p class="card-category">Province</p>
                  <h3 class="card-title"><?php echo $resultcountpv ?></h3></h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">see more</i>
                    <a href="./index.php?page=province">see more</a>
                  </div>
                </div>
              </div>
            </div>
            <!-- Show Transport -->
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">filter_frames</i>
                  </div>
                  <p class="card-category">Transport</p>
                  <h3 class="card-title"><?php echo $resultcounttran ?></h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                  <i class="material-icons">see more</i>
                    <a href="./index.php?page=transport">see more</a>
                  </div>
                </div>
              </div>
            </div>
            <!-- Show Supplier need contact -->
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">info_outline</i>
                  </div>
                  <p class="card-category"></p>
                  <h3 class="card-title"><?php echo $resultcountmem ?></h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">pending_actions</i>
                    <a href="./index.php?page=sale"> you have new orders</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- End Show Data -->
          

          <!-- Show Data Transport&Province -->
            <div class="row">
              <!-- Show Head Data -->
              <div class="col-lg-6 col-md-12">
                <div class="card">
                  <div class="card-header card-header-tabs card-header-success">
                    <div class="nav-tabs-navigation">
                      <div class="nav-tabs-wrapper">
                        <ul class="nav nav-tabs" data-tabs="tabs">
                          <li class="nav-item">
                            <a class="nav-link active" href="#transport" data-toggle="tab">
                              <i class="material-icons">person</i> Transport
                              <div class="ripple-container"></div>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="#province" data-toggle="tab">
                              <i class="material-icons">person</i> Province
                              <div class="ripple-container"></div>
                            </a>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <!-- Show Data Transport -->
                  <div class="card-body">
                    <div class="tab-content">
                      <div class="tab-pane active" id="transport">
                      <table class="table table-hover">
                      <thead class="text-dark">
                        <th>รหัส</th>
                        <th>ชื่อบริษัทขนส่ง</th>
                      </thead>
                      <tbody>
                      <?php 
                        $i=1;
                        while($row=mysqli_fetch_array($resultran)){?>
                        <tr>
                          <td><?php echo $row['transport_no'] ?></td>
                          <td><?php echo $row['transport_name'] ?></td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                    <!-- Show Data Province -->
                      </div>
                    <div class="tab-pane" id="province">
                      <table class="table">
                        <thead class="text-dark">
                          <th>รหัสจังหวัด</th>
                          <th>ชื่อจังหวัด</th>
                        </thead>
                        <tbody>
                        <?php 
                          $i=1;
                          while($row=mysqli_fetch_array($resultpv)){?>
                          <tr>
                            <td><?php echo $row['pv_id'] ?></td>
                            <td><?php echo $row['pv_name'] ?></td>
                          </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          <!-- End Show Data Transport&Province --> 


          <!-- Show Data Supplier 
          <div class="col-lg-6 col-md-12">
              <div class="card">
                <div class="card-header card-header-success">
                  <h4 class="card-title">Supplier</h4>
                  <p class="card-category">All Supplier</p>
                </div>
                <div class="card-body table-responsive">
                  <table class="table table-hover">
                    <thead class="text-dark">
                      <th>รหัสผู้ผลิต</th>
                      <th>ชื่อผู้ผลิต</th>
                      <th>ที่อยู่ผู้ผลิต</th>
                      <th>เบอร์ติดต่อผู้ผลิต</th>
                    </thead>
                    <tbody>
                    <?php 
                      $i=1;
                      while($row2=mysqli_fetch_array($resultsup)){?>
                      <tr>
                        <td><?php echo $row2['sup_id'] ?></td>
                        <td><?php echo $row2['sup_name'] ?></td>
                        <td><?php echo $row2['sup_address'] ?></td>
                        <td><?php echo $row2['sup_tel'] ?></td>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
            </div>
          <!-- End Show Data Orders -->
          </div> -->
</div>