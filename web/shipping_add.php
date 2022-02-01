<?php
    include 'connect.php';
    include 'header.php';

    $province="SELECT * FROM province";
    $query=$con->query($province);

    $mem=$_SESSION['mem_id'];

    // echo $mem;
    // exit;
    // $pv=mysqli_fetch_array($query);
?>

        <!-- Profile -->
        <section class="page-section" id="profile">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Add Address</h2>
                </div>
                <form class="row g-4" id="frmaddship" name="frmaddship" method="post" action="shipping_add_db.php" enctype="multipart/form-data">
                    <div class="col-md-4">
                      <label for="f_name" class="form-label">First Name</label>
                      <input type="text" class="form-control" name="f_name">
                    </div>
                    <div class="col-md-4">
                      <label for="l_name" class="form-label">Last Name</label>
                      <input type="text" class="form-control" name="l_name">
                    </div>
                    <div class="col-md-4">
                      <label for="inputEmail4" class="form-label">Phone</label>
                      <input type="text" class="form-control" name="phone">
                    </div>
                    <div class="col-md-4">
                      <label for="f_name" class="form-label">House No</label>
                      <input type="text" class="form-control" name="house_no">
                    </div>
                    <div class="col-md-2">
                      <label for="l_name" class="form-label">Street</label>
                      <input type="text" class="form-control" name="street">
                    </div>
                    <div class="col-md-2">
                      <label for="inputEmail4" class="form-label">City</label>
                      <input type="text" class="form-control" name="city">
                    </div>
                    <div class="col-md-2">
                      <label for="inputEmail4" class="form-label">Postal Code</label>
                      <input type="text" class="form-control" name="postal_code">
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
                    <div align="right">
                        <button type="submit" name="add" class="btn btn-primary">Submit</button> 
                    </div>
                  </form> 
            </div>
        </section>

<?php include 'footer.php'; ?>