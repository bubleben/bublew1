<?php
    include 'connect.php';
    
    $mem_id = mysqli_real_escape_string($con,$_GET['mem_id']);

    echo $mem_id;
?>



<?php
    include 'connect.php';
    include 'header.php';

    $province="SELECT * FROM province";
    $query=$con->query($province);
    // $pv=mysqli_fetch_array($query);
?>

        <!-- Profile -->
        <section class="page-section" id="profile">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Add Address</h2>
                </div>
                  <form class="row g-4" style="margin-left: 20px;" action="profile_editpage.php" method="post">
                    <div class="col-md-4">
                        <label for="cust_name" class="form-label">Name</label>
                        <input type="text" class="form-control" name="dea_name">
                    </div>
                    <div class="col-md-4">
                        <label for="cust_mail" class="form-label">Brand name</label>
                        <input type="text" class="form-control" name="brand_name">
                    </div>
                    <div class="col-md-4">
                        <label for="f_name" class="form-label">Address</label>
                        <input type="text" class="form-control" name="dea_address">
                    </div>
                    <div class="col-md-2">
                        <label for="l_name" class="form-label">Province</label>
                        <select name="province" class="form-select">
                            <option selected></option>
                            <?php 
                                $i=1;
                                while($row=mysqli_fetch_array($query)){?>
                                    <option><?php echo $row['pv_name'] ?></option>
                                <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="inputEmail4" class="form-label">Phone</label>
                        <input type="text" class="form-control" name="dea_tel">
                    </div>
                    <div class="col-md-2">
                        <label for="inputEmail4" class="form-label">Bank name</label>
                        <select name="gender" class="form-select">
                            <option selected></option>
                            <option>ธนาคารแห่งประเทศไทย</option>
                            <option>ธนาคารกรุงเทพ</option>
                            <option>ธนาคารกสิกรไทย</option>
                            <option>ธนาคารกรุงไทย</option>
                            <option>ธนาคารทหารไทยธนชาติ</option>
                            <option>ธนาคารไทยพาณิชย์</option>
                            <option>ธนาคารกรุงศรีอยุธยา</option>
                            <option>ธนาคารเกียรตินาคินภัทร</option>
                            <option>ธนาคารซีไอเอ็มบีไทย</option>
                            <option>ธนาคารทิสโก้</option>
                            <option>ธนาคารยูโอบี</option>
                            <option>ธนาคารไทยเครดิตเพื่อรายย่อย</option>
                            <option>ธนาคารแลนด์ แอนด์ เฮ้าส์</option>
                            <option>ธนาคารพัฒนาวิสาหกิจขนาดกลางและขนาดย่อมแห่งประเทศไทย</option>
                            <option>ธนาคารเพื่อการเกษตรและสหกรณ์การเกษตร</option>
                            <option>ธนาคารเพื่อการส่งออกและนำเข้าแห่งประเทศไทย</option>
                            <option>ธนาคารออมสิน</option>
                            <option>ธนาคารอาคารสงเคราะห์</option>
                            <option>ธนาคารอิสลามแห่งประเทศไทย</option>
                      </select>
                    </div>
                    <div class="col-md-2">
                        <label for="inputEmail4" class="form-label">Bank acconunt</label>
                        <input type="text" class="form-control" name="bank_account">
                    </div>
                    <div class="col-md-2">
                        <label for="inputEmail4" class="form-label">Bank number</label>
                        <input type="text" class="form-control" name="bank_number">
                    </div>





                    <div class="col-md-2">
                        <label for="Gender" class="form-label">Gender</label>
                            <select name="gender" class="form-select">
                                <option selected></option>
                                <option>Male</option>
                                <option>Female</option>
                                <option>LGBTQP+</option>
                            </select>
                    </div>
                    <div class="col-md-4">
                        <label for="Birthday" class="form-label">Birthday</label>
                        <input type="date" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label for="inputEmail4" class="form-label">Phone</label>
                        <input type="text" class="form-control">
                    </div>
                        <!-- <div class="col-md-3">
                        <label for="inputEmail4" class="form-label">enable</label>
                        <input type="text" class="form-control">
                        </div> -->
                    <!--เปลี่ยนได้แล้ว โดยต้น-->
                        <div align="right">
                        <button class="btn btn-primary" href="index.php?page=profile_edit&mem_id=<?php echo '$custo'?>">แก้ไข</button>
                        <button class="btn btn-primary" href="index.php?page=profile_edit&mem_id=<?php echo '$custo'?>">ส่งคำร้องขอเป็นผู้จำหน่าย</button>
                        </div>
                        <hr>
                        </div>
                    </form>
            </div>
        </section>

<?php include 'connect.php'; ?>