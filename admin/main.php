<?php
    include '../connect.php';

    $countpro="SELECT * FROM product"; 
    $query = $con->query($countpro);
    $fetch = mysqli_fetch_array($query);
    $resultcountpro = mysqli_num_rows($query);

    $countsup="SELECT * FROM dealer"; 
    $query = $con->query($countsup);
    $fetch = mysqli_fetch_array($query);
    $resultcountsup = mysqli_num_rows($query);
     
    $countcategory="SELECT * FROM category"; 
    $query = $con->query($countcategory);
    $fetch = mysqli_fetch_array($query);
    $resultcountcategory = mysqli_num_rows($query);

    $countreturns="SELECT * FROM returns"; 
    $query = $con->query($countreturns);
    $fetch = mysqli_fetch_array($query);
    $resultcountreturns = mysqli_num_rows($query);


    $memner="SELECT * FROM member";
    $resultmem=$con->query($memner);

    $dealer="SELECT * FROM dealer ";
    $resultdea=$con->query($dealer);

    $product="SELECT * FROM product";
    $resultpro=$con->query($product);

    $category="SELECT * FROM category";
    $resultcate=$con->query($category);


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
            <!-- Show dealer -->
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">supervisor_account</i>
                  </div>
                  <p class="card-category">Dealer</p>
                  <h3 class="card-title"><?php echo $resultcountsup ?></h3></h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">edit</i>
                    <a href="./index.php?page=dealer">Dealer Managemane</a>
                  </div>
                </div>
              </div>
            </div>
            <!-- Show category -->
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">filter_frames</i>
                  </div>
                  <p class="card-category">category</p>
                  <h3 class="card-title"><?php echo $resultcountcategory ?></h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                  <i class="material-icons">edit</i>
                    <a href="./index.php?page=category"> See more </a>
                  </div>
                </div>
              </div>
            </div>
            <!-- Show category for input track -->
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">info_outline</i>
                  </div>
                  <p class="card-category">returns</p>
                  <h3 class="card-title"><?php echo $resultcountreturns ?></h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">pending_actions</i>
                    <a href="./index.php?page=return">See more</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- End Show Product -->
          

          <!-- Show Data dea&mem -->
            <div class="row">
              <!-- Show Head Data -->
              <div class="col-lg-6 col-md-12">
                <div class="card">
                  <div class="card-header card-header-tabs card-header-success">
                    <div class="nav-tabs-navigation">
                      <div class="nav-tabs-wrapper">
                        <ul class="nav nav-tabs" data-tabs="tabs">
                          <li class="nav-item">
                            <a class="nav-link active" href="#member" data-toggle="tab">
                              <i class="material-icons">person</i> memner
                              <div class="ripple-container"></div>
                            </a>
                          </li>
                          <!-- <li class="nav-item">
                            <a class="nav-link" href="#dealer" data-toggle="tab">
                              <i class="material-icons">person</i> dealer
                              <div class="ripple-container"></div>
                            </a>
                          </li> -->
                        </ul>
                      </div>
                    </div>
                  </div>
                  <!-- Show Data memner -->
                  <div class="card-body">
                    <div class="tab-content">
                      <div class="tab-pane active" id="memner">
                      <table class="table table-hover">
                      <thead class="text-dark">
                        <th>ลำดับ</th>
                        <th>ชื่อผู้ใช้</th>
                        <th>วันที่เข้าร่วม</th>
                      </thead>
                      <tbody>
                      <?php 
                        $i=1;
                        while($row=mysqli_fetch_array($resultmem)){?>
                        <tr>
                          <td><?php echo $row['mem_id'] ?></td>
                          <td><?php echo $row['mem_name'] ?></td>
                          <td><?php echo $row['enable'] ?></td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                    <!-- Show Data memner -->
                      </div>
                    <div class="tab-pane" id="dealer">
                      <table class="table">
                        <thead class="text-dark">
                          <th>รหัสผู้ขาย</th>
                          <th>ชื่อ</th>
                          <th>ชื่อแบรนด์</th>
                          <th> วันที่เข้าร่วม</th>
                        </thead>
                        <tbody>
                        <?php 
                          $i=1;
                          while($row=mysqli_fetch_array($resultdea)){?>
                          <tr>
                            <td><?php echo $row['dea_id'] ?></td>
                            <td><?php echo $row['dea_name'] ?></td>
                            <td><?php echo $row['brand_name'] ?></td>
                            <td><?php echo $row['enable'] ?></td>
                          </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          <!-- End Show Data dea&mem --> 


          <!-- Show Data category --> 
          <div class="col-lg-6 col-md-12">
              <div class="card">
                <div class="card-header card-header-success">
                  <h4 class="card-title">category</h4>
                  <p class="card-category">All category</p>
                </div>
                <div class="card-body table-responsive">
                  <table class="table table-hover">
                    <thead class="text-dark">
                      <th>รหัสประเภท</th>
                      <th>ประเภทสินค้า</th>
                   
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
            </div>
          <!-- End Show Data category --> 

  
          </div>
</div>