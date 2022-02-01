<?php
    include '../connect.php';
    $mem_id=$_GET['mem_id'];
    $sql="SELECT member.mem_id,member.mem_name,member.mem_mail,member.f_name,member.l_name,member.gender,member.birthday,member.phone,member.enable,member.position,dealer.dea_id,dealer.mem_id,dealer.dea_name,dealer.brand_name,dealer.dea_address,dealer.pv_id,province.pv_id,province.pv_name,dealer.dea_tel,dealer.bank_name,dealer.bank_account,dealer.bank_num,dealer.sample_img,dealer.enable 
    FROM member,dealer,province
    WHERE member.mem_id=dealer.mem_id
    AND dealer.pv_id=province.pv_id 
    AND member.mem_id='$mem_id'";
    
     $result=$con->query($sql);
     $row=mysqli_fetch_array($result);
?>
<div class="container">
    <div class="card">
        <div class="card-header card-header-primary">
            <h3> ข้อมูลผู้ขายเพิ่มเติม </h3>
        </div>
        <div class=card-body>
            <form action="pro_save.php" method="post" enctype="multipart/form-data">
                    <!-- ยังไม่ได้แอคชั่น -->
                <div class="form-group">
                    <label>รหัสสมาชิก </label>
                        <input type="text" name="mem_id" class="form-control" value="<?php echo $row['mem_id']?>" readonly>
                </div>
                <div class="form-group">
                    <label>ชื่อผู้ใช้</label>
                        <input type="text" name="mem_name" class="form-control" value="<?php echo $row['mem_name']?>">
                </div>
                <div class="form-group">
                    <label>อีเมล</label>
                        <input type="text" name="mem_mail" class="form-control" value="<?php echo $row['mem_mail']?>">
                </div>
                <div class="form-group">
                    <label>ชื่อจริง</label>
                        <input type="text" name="f_name" class="form-control" value="<?php echo $row['f_name']?>">
                </div>
                <div class="form-group">
                    <label>นามสกุล</label>
                        <input type="text" name="l_name" class="form-control" value="<?php echo $row['l_name']?>">
                </div>
                <div class="form-group">
                    <label>ชื่อผู้จำหน่าย</label>
                        <input type="text" name="dea_name" class="form-control" value="<?php echo $row['dea_name']?>">
                </div>
                <div class="form-group">
                    <label>ชื่อแบรนด์รนด์</label>
                        <input type="text" name="brand_name" class="form-control" value="<?php echo $row['brand_name']?>">
                </div>
                <div class="form-group">
                    <label>ที่อยู่</label>
                        <input type="text" name="dea_address" class="form-control" value="<?php echo $row['dea_address']?>">
                </div>
                <div class="form-group">
                    <label>จังหวัด</label>
                        <input type="text" name="pv_id" class="form-control" value="<?php echo $row['pv_id']?>">
                </div>
                <div class="form-group">
                    <label>เบอร์โทรศัพท์</label>
                        <input type="text" name="dea_tel" class="form-control" value="<?php echo $row['dea_tel']?>">
                </div>
                <div class="form-group">
                    <label>ชื่อธนาคาร</label>
                        <input type="text" name="bank_name" class="form-control" value="<?php echo $row['bank_name']?>">
                </div>
                <div class="form-group">
                    <label>ชื่อเจ้าของบัญชี</label>
                        <input type="text" name="bank_account" class="form-control" value="<?php echo $row['bank_account']?>">
                </div>
                <div class="form-group">
                    <label>เลขที่บัญชี</label>
                        <input type="text" name="bank_num" class="form-control" value="<?php echo $row['bank_num']?>">
                </div>
                <div class="form-group">
                    <label>ชื่อเจ้าของบัญชี</label>
                        <input type="text" name="bank_account" class="form-control" value="<?php echo $row['bank_account']?>">
                </div>
                <div class="form-group">
                    <label>รูปตัวอย่างสินค้า</label></br>
                    <img src="<?php echo $row['sample_img'] ?>" rel="nofollow" style="width: 100px; height: 100px;" value="<?php echo $row['sample_img']?>">
                 </div>
                 <div class="form-group">
                    <label>วันที่เริ่มจำหน่าย</label>
                        <input type="text" name="enable" class="form-control" value="<?php echo $row['enable']?>">
                </div>
               
                <!-- <input type="submit" name="submit" class="btn btn-outline-primary" value="บันทึกข้อมูล"> -->
            </form>
        </div>
    </div>
</div>  
