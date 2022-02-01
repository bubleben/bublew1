<?php 
    include '../connect.php';
    if(isset($_POST['submit'])){
        $emp_no=$_GET['emp_no'];
        $emp_id=$_POST['emp_id'];
        $emp_name=$_POST['emp_name'];
        $emp_mail=$_POST['emp_mail'];
        $phone=$_POST['phone'];
        $emp_username=$_POST['emp_username'];
        $emp_pass=$_POST['emp_pass'];
        $position=$_POST['position'];
            $sql="INSERT INTO employee VALUES('$emp_no','$emp_id','$emp_name','$emp_mail','$phone','$emp_username','$emp_pass','$position')";
            $result=$con->query($sql);
            if($result){
                echo "<script>window.location.href='index.php?page=employee'</script>";
            }else{
                echo"<script>
                        alert('Error: ไม่สามารถบันทึกข้อมูลได้');
                        window.history.back()';
                        </script>";
            }
    }
?>
<div class="container">
    <div class="card">
        <div class="card-header card-header-primary">
            <h5>เพิ่มข้อมูลพนักงาน</h5>
        </div>
        <div class=card-body>
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
                <div class="form-group ">
                    <label >รหัสพนักงาน</label>
                        <input type="text" name="emp_no" class="form-control">
                </div>
                <div class="form-group ">
                    <label >รหัสประจำตัวประชาชน</label>
                        <input type="text" name="emp_id" class="form-control">
                </div>
                <div class="form-group ">
                    <label >ชื่อ</label>
                        <input type="text" name="emp_name" class="form-control">
                </div>
                <div class="form-group ">
                    <label >อีเมล</label>
                        <input type="text" name="emp_mail" class="form-control">
                </div>
                <div class="form-group ">
                    <label >เบอร์ติดต่อ</label>
                        <input type="text" name="phone" class="form-control">
                </div>
                <div class="form-group ">
                    <label >ชื่อผู้ใช้งาน</label>
                        <input type="text" name="emp_username" class="form-control">
                </div>
                <div class="form-group ">
                    <label >รหัสผ่าน</label>
                        <input type="text" name="emp_pass" class="form-control">
                </div>
                <div class="form-group ">
                    <label >ตำแหน่ง</label>
                        <input type="text" name="position" class="form-control">
                </div>
                <input type="submit" name="submit" class="btn btn-primary" value="บันทึกข้อมูล">
            </form>
        </div>
    </div>
</div>