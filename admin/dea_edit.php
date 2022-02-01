<?php
    include '../connect.php';
    $mem_id=$_GET['mem_id'];
    $sql="SELECT * FROM member WHERE mem_id='$mem_id'";
    $result=$con->query($sql);
    $row=mysqli_fetch_array($result);
?>
<div class="container">
    <div class="card">
        <div class="card-header card-header-primary">
            <h3>แก้ไขข้อมูลสมาชิก</h3>
        </div>
        <div class=card-body>
            <form action="dea_save.php?mem_id=<?php echo $row['mem_id']?>" method="post" enctype="multipart/form-data">
            <div class="form-group ">
                    <label >รหัสลูกค้า</label>
                        <input type="text" name="mem_id" class="form-control" value="<?php echo $row['mem_id']?>" readonly>
                </div>
                <div class="form-group ">
                    <label >ชื่อผู้ใช้งาน</label>
                        <input type="text" name="mem_name" class="form-control" value="<?php echo $row['mem_name']?>">
                </div>
                <div class="form-group ">
                    <label >รหัสผ่าน</label>
                        <input type="text" name="mem_pass" class="form-control" value="<?php echo $row['mem_pass']?>">
                </div>
                <div class="form-group ">
                    <label >อีเมล</label>
                        <input type="text" name="mem_mail" class="form-control" value="<?php echo $row['mem_mail']?>">
                </div>
                <div class="form-group ">
                    <label >ชื่อจริง</label>
                        <input type="text" name="f_name" class="form-control" value="<?php echo $row['f_name']?>">
                </div>
                <div class="form-group ">
                    <label >นามสกุล</label>
                        <input type="text" name="l_name" class="form-control" value="<?php echo $row['l_name']?>">
                </div>
                <div class="form-group ">
                    <label >เพศ</label>
                    <select name="gender" class="form-control" value="<?php echo $row['gender']?>">
                        
                        <option value="male">ชาย</option>
                        <option value="female">หญิง</option>
                        <option value="LGBTQ+">LGBTQ+</option>
                    </select> 
                </div>
                <div class="form-group ">
                    <label >วันเกิด</label>
                        <input type="date" name="birthday" class="form-control" value="<?php echo $row['birthday']?>">
                </div>
                <div class="form-group ">
                    <label >เบอร์โทรติดต่อ</label>
                        <input type="text" name="phone" class="form-control" value="<?php echo $row['phone']?>">
                </div>
                <div class="form-group ">
                    <label >วันที่เริ่มเป็นสมาชิก</label>
                        <input type="date" name="enable" class="form-control" value="<?php echo $row['enable']?>" readonly>
                </div>
                <div class="form-group ">
                    <label >ตำแหน่ง</label>
                        <select name="position" class="form-control" value="<?php echo $row['position']?>">
                        <option value="customer">ลูกค้า</option>
                        <option value="dealer">ผู้จำหน่าย</option>
                        <option value="admin">ผุ้ดูแลระบบ</option>
                    </select> 
                </div>
                <input type="submit" name="submit" class="btn btn-outline-primary" value="บันทึกข้อมูล">
            </form>
        </div>
    </div>
</div>  