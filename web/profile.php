<?php
    // session_start();
    include 'connect.php';
    include 'header.php';
    $custo=$_SESSION['username'];
    $customer="SELECT * FROM member WHERE mem_name='$custo'";
    $query=$con->query($customer);
    $cust=mysqli_fetch_array($query);
?>
        <!-- Profile -->
        <section class="page-section" id="profile">
        <div class="container">
                <div class="text-center">
                    <div>
                    <h2 class="section-heading text-uppercase">My Profile</h2>
                </div>
                <div class="d-flex justify-content-center">
                  <form class="row g-4" style="margin-left: 20px;" action="profile_editpage.php" method="post">
               
                  <div class="col-md-5">
                      <label for="cust_name" class="form-label">User name</label>
                      <input type="text" class="form-control" value="<?php echo $cust['mem_name'] ?>" readonly  >
                    </div>
                    <div class="col-md-5">
                      <label for="cust_mail" class="form-label">e-mail</label>
                      <input type="text" class="form-control" value="<?php echo $cust['mem_mail'] ?>" readonly  >
                    </div>
                    <div class="col-md-5">
                      <label for="f_name" class="form-label">First Name</label>
                      <input type="text" class="form-control" value="<?php echo $cust['f_name'] ?>" readonly  >
                    </div>
                    <div class="col-md-5">
                      <label for="l_name" class="form-label">Last Name</label>
                      <input type="text" class="form-control" value="<?php echo $cust['l_name'] ?>" readonly >
                    </div>
                    <div class="col-md-2">
                      <label for="Gender" class="form-label">Gender</label>
                      <input type="text" class="form-control"  value="<?php echo $cust['gender'] ?>" readonly >
                    </div>
                    <div class="col-md-4">
                      <label for="Birthday" class="form-label">Birthday</label>
                      <input type="date" class="form-control"  value="<?php echo $cust['birthday'] ?>" readonly >
                    </div>
                    <div class="col-md-3">
                      <label for="inputEmail4" class="form-label">Phone</label>
                      <input type="text" class="form-control" value="0<?php echo $cust['phone'] ?>" readonly >
                    </div>
                    <div class="col-md-3">
                      <label for="inputEmail4" class="form-label">enable</label>
                      <input type="text" class="form-control"  value="<?php echo $cust['enable'] ?>" readonly >
                    </div>
                   <!--เปลี่ยนได้แล้ว โดยต้น-->
                    <div align="right">
                    <button class="btn btn-primary" href="index.php?page=profile_edit&mem_id=<?php echo '$custo'?>">แก้ไข</button>
                    </div>
                    <hr>
                </div>
            </form>
            <div align="right">
                    <input type="button" name="Submit2" class="btn btn-primary" value="ส่งคำร้องขอเป็นผู้จำหน่าย" onclick="window.location='profile_dea.php';" />
                </div>
            </div>


             <?php      
                $province=$_SESSION['mem_id'];
                $prov="SELECT shipping_address.f_name,shipping_address.l_name,shipping_address.phone,shipping_address.house_no,shipping_address.street,shipping_address.city,shipping_address.postal_code,shipping_address.pv_id,province.pv_id,province.pv_name
                FROM shipping_address,province,member WHERE shipping_address.pv_id=province.pv_id AND shipping_address.mem_id=member.mem_id AND member.mem_id='$province'";
                $query=$con->query($prov);
            ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th colspan='6'>ที่อยู่ในการจัดส่ง</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                        $i=1;
                        while($row=mysqli_fetch_array($query)){?>
                        <tr>
                            <td style="padding-left: 5%">
                                <b><?php echo $row['f_name']; ?>&nbsp;<?php echo $row['l_name']; ?>&nbsp;<?php echo $row['phone']; ?></b> &nbsp;<?php echo $row['house_no']; ?>&nbsp;<?php echo $row['street']; ?>&nbsp;<?php echo $row['city']; ?>&nbsp;<?php echo $row['postal_code']; ?>&nbsp;<?php echo $row['pv_name']; ?>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <div align="right">
                    <input type="button" name="Submit2" class="btn btn-primary" value="Add" onclick="window.location='shipping_add.php';" />
                </div>


            
        </section>


        <!-- Contact
        <section class="page-section" id="contact">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5">
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="card py-4 h-100">
                            <div class="card-body text-center">
                                <i class="fas fa-map-marked-alt text-primary mb-2"></i>
                                <h4 class="text-uppercase m-0">Address</h4>
                                <hr class="my-4 mx-auto" />
                                <div class="small text-black-50">Thai-Austrian Technical College</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="card py-4 h-100">
                            <div class="card-body text-center">
                                <i class="fas fa-envelope text-primary mb-2"></i>
                                <h4 class="text-uppercase m-0">Email</h4>
                                <hr class="my-4 mx-auto" />
                                <div class="small text-black-50">63309010031@tatc.ac.th</a></div>
                                <div class="small text-black-50">63309010032@tatc.ac.th</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="card py-4 h-100">
                            <div class="card-body text-center">
                                <i class="fas fa-mobile-alt text-primary mb-2"></i>
                                <h4 class="text-uppercase m-0">Phone</h4>
                                <hr class="my-4 mx-auto" />
                                <div class="small text-black-50">+666 980077751</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->


<?php include 'footer.php'; ?>