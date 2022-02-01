<?php
    include '../connect.php';

    $memid = $_SESSION['mem_id'];
    $querydeaid = "SELECT d.*, m.*, v.* FROM dealer as d INNER JOIN member as m ON d.mem_id = m.mem_id INNER JOIN province as v ON d.pv_id = v.pv_id
    WHERE m.mem_id = $memid";
    $rsdeaid=$con->query($querydeaid);
    $rowdeaid=mysqli_fetch_array($rsdeaid);

    $querycartdetail = "SELECT d.*, p.pro_img, p.pro_name, p.sale_price , s.*, a.*, v.* FROM sale_detail as d INNER JOIN product as p ON d.pro_id = p.pro_id 
    INNER JOIN sale as s ON d.sale_id = s.sale_id INNER JOIN shipping_address as a ON s.ship_no = a.ship_no INNER JOIN province as v ON a.pv_id = v.pv_id
    WHERE s.mem_id = $memid";
    $rscartdetail=$con->query($querycartdetail);

    $deaid = $rowdeaid['dea_id'];

    // echo $deaid;
    // exit;
?>
<div class="container">
    <div class="card">
        <div class="card-header card-header-primary">
            <h3>ข้อมูลผู้จำหน่าย</h3>
        </div>
        <div class=card-body>
            <form action="dea_save.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" class="form-control" value="<?php echo $rowdeaid['mem_id'];?>">
                <div class="form-group">
                    <label>รหัสผู้จำหน่าย</label>
                        <input type="text" name="dea_id" class="form-control" value="<?php echo $rowdeaid['dea_id'];?>" readonly>
                </div>
                <div class="form-group">
                    <label>ชื่อผู้จำหน่าย</label>
                        <input type="text" name="dea_name" class="form-control" value="<?php echo $rowdeaid['dea_name']?>">
                </div>
                <div class="form-group">
                    <label>ชื่อแบรนด์</label>
                    <input type="text" name="brand_name" class="form-control" value="<?php echo $rowdeaid['brand_name']?>">
                </div>
                <div class="form-group">
                    <label>ที่อยู่</label>
                        <input type="text" name="dea_address" class="form-control" value="<?php echo $rowdeaid['dea_address']?>">
                </div>
                <div class="form-group">
                    <label>จังหวัด</label>
                      <?php  
                      $sql2="SELECT * FROM province"; 
                      $province=$con->query($sql2);
                     ?>
                    <select name="pv_id" class="form-control">
                       <option value="<?php echo $row['pv_id'];?>"><?php echo $rowdeaid['pv_name'];?> </option>
                       <?php while($row2=mysqli_fetch_array($rscartdetail)){
                        ?>
                        <option value="<?php echo $row2['pv_id'];?>"><?php echo $row2['pv_name'];?> </option>
                       <?php } ?>
                     </select>  
                </div>
                <div class="form-group">
                    <label>เบอร์โทร</label>
                        <input type="text" name="dea_tel" class="form-control" value="<?php echo $rowdeaid['dea_tel']?>">
                </div>
                <div class="form-group">
                    <label>ธนาคาร</label>
                    <input type="text" name="bank_account" class="form-control" value="<?php echo $rowdeaid['bank_name']?>">
                </div>
                <div class="form-group">
                    <label>ชื่อบัญชี</label>
                        <input type="text" name="bank_account" class="form-control" value="<?php echo $rowdeaid['bank_account']?>">
                </div>
                <div class="form-group">
                    <label>เลขที่บัญชี</label>
                        <input type="text" name="bank_num" class="form-control" value="<?php echo $rowdeaid['bank_num']?>">
                </div>
                <div class="form-group">
                    <label>เป็นผู้จำหน่ายเมื่อ</label>
                        <input type="" name="enable" class="form-control" value="<?php echo $rowdeaid['enable']?>" readonly>
                </div>

                <input type="submit" name="submit" class="btn btn-success" value="บันทึกข้อมูล">
            </form>
        </div>
    </div>
</div>  