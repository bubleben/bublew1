<?php
    include '../connect.php';
    $emp_no=$_GET['emp_no'];
    $sql="SELECT * FROM employee WHERE emp_no='$emp_no'";
    $result=$con->query($sql);
    $row=mysqli_fetch_array($result);
?>
<div class="container">
    <div class="card">
        <div class="card-header card-header-primary">
            <h3>เพิ่มข้อมูลพนักงาน</h3>
        </div>
        <div class=card-body>
            <form action="emp_save.php?emp_no=<?php echo $row['emp_no']?>" method="post" enctype="multipart/form-data">
            <div class="form-group ">
                    <label >รหัสพนักงาน</label>
                        <input type="text" name="emp_no" class="form-control" value="<?php echo $row['emp_no']?>">
                </div>
                <div class="form-group ">
                    <label >รหัสประจำตัวประชาชน</label>
                        <input type="text" name="emp_id" class="form-control" value="<?php echo $row['emp_id']?>">
                </div>
                <div class="form-group ">
                    <label >ชื่อ</label>
                        <input type="text" name="emp_name" class="form-control" value="<?php echo $row['emp_name']?>">
                </div>
                <div class="form-group ">
                    <label >อีเมล</label>
                        <input type="text" name="emp_mail" class="form-control" value="<?php echo $row['emp_mail']?>">
                </div>
                <div class="form-group ">
                    <label >เบอร์ติดต่อ</label>
                        <input type="text" name="phone" class="form-control" value="<?php echo $row['phone']?>">
                </div>
                <div class="form-group ">
                    <label >ชื่อผู้ใช้งาน</label>
                        <input type="text" name="emp_username" class="form-control" value="<?php echo $row['emp_username']?>">
                </div>
                <div class="form-group ">
                    <label >รหัสผ่าน</label>
                        <input type="text" name="emp_pass" class="form-control" value="<?php echo $row['emp_pass']?>">
                </div>
                <div class="form-group ">
                    <label >ตำแหน่ง</label>
                        <input type="text" name="position" class="form-control" value="<?php echo $row['position']?>">
                </div>        
                <input type="submit" name="submit" class="btn btn-outline-primary" value="บันทึกข้อมูล">
            </form>
        </div>
    </div>
</div>  