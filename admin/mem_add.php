<?php 
    include '../connect.php';
    if(isset($_POST['submit'])){
        // $mem_id=$_POST['mem_id'];
        $mem_name=$_POST['mem_name'];
        $mem_pass=$_POST['mem_pass'];
        $mem_mail=$_POST['mem_mail'];
        $f_name=$_POST['f_name'];
        $l_name=$_POST['l_name'];
        $gender=$_POST['gender'];
        $birthday=$_POST['birthday'];
        $phone=$_POST['phone'];
        $enable=$_POST['enable'];
        $position=$_POST['position'];
       
            $sql="INSERT INTO member VALUES('','$mem_name','$mem_pass','$mem_mail','$f_name','$l_name','$gender','$birthday','$phone','$enable','$position')";
            $result=$con->query($sql);
            if($result){
                echo "<script>window.location.href='index.php?page=member'</script>";
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
            <h5>เพิ่มข้อมูลสมาชิก</h5>
        </div>
        <div class=card-body>
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
                <div class="form-group ">
                    <label >ชื่อผู้ใช้งาน</label>
                        <input type="text" name="mem_name" class="form-control">
                </div>
                <div class="form-group ">
                    <label >รหัสผ่าน</label>
                        <input type="text" name="mem_pass" class="form-control">
                </div>
                <div class="form-group ">
                    <label >อีเมล</label>
                        <input type="text" name="mem_mail" class="form-control">
                </div>
                <div class="form-group ">
                    <label >ชื่อจริง</label>
                        <input type="text" name="f_name" class="form-control">
                </div>
                <div class="form-group ">
                    <label >นามสกุล</label>
                        <input type="text" name="l_name" class="form-control">
                </div>
                    <div class="dropdown">
                    <label >เพศ</label><br>
                    <select name="gender" class="form-control">
                        <option selected>คลิกเพื่อเลือก</option>
                        <option value="male">ชาย</option>
                        <option value="female">หญิง</option>
                        <option value="LGBTQ+">LGBTQ+</option>
                    </select> 
                </div>
                <br>
                <div class="form-group ">
                    <label >วันเกิด</label>
                        <input type="date" name="birthday" class="form-control">
                </div>
                <div class="form-group ">
                    <label >เบอร์โทรติดต่อ</label>
                        <input type="text" name="phone" class="form-control">
                </div>
                <div class="form-group ">
                    <label >วันที่เริ่มเป็นสมาชิก</label>
                        <input type="date" name="enable" class="form-control">
                </div>
                <div class="form-group ">
                    <label >ตำแหน่ง</label>
                    <select name="position" class="form-control">
                        <option selected>คลิกเพื่อเลือก</option>
                        <option value="memomer">ลูกค้า</option>
                        <option value="dealer">ผู้จำหน่าย</option>
                        <option value="admin">ผุ้ดูแลระบบ</option>
                    </select> 
                </div>
                <input type="submit" name="submit" class="btn btn-primary" value="บันทึกข้อมูล">
            </form>
        </div>
    </div>
</div>