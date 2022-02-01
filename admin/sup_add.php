<?php 
    include '../connect.php';
    if(isset($_POST['submit'])){
        $sup_id=$_POST['sup_id'];
        $pv_id=$_POST['pv_id'];
        $sup_name=$_POST['sup_name'];
        $sup_address=$_POST['sup_address'];
        $sup_tel=$_POST['sup_tel'];
            $sql="INSERT INTO supplier VALUES('$sup_id','$pv_id','$sup_name','$sup_address','$sup_tel')";
            $result=$con->query($sql);
            if($result){
                echo "<script>window.location.href='index.php?page=supplier'</script>";
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
            <h5>เพิ่มข้อมูลผู้ผลิต</h5>
        </div>
        <div class=card-body>
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
                <div class="form-group ">
                    <label >ลำดับ</label>
                        <input type="text" name="sup_id" class="form-control">
                </div>
                <div class="form-group ">
                    <label >รหัสจังหวัด</label>
                        <input type="text" name="pv_id" class="form-control">
                </div>
                <div class="form-group ">
                    <label >ชื่อผู้ผลิต</label>
                        <input type="text" name="sup_name" class="form-control">
                </div>
                <div class="form-group ">
                    <label >ที่อยู่ผู้ผลิต</label>
                        <input type="text" name="sup_address" class="form-control">
                </div>
                <div class="form-group ">
                    <label >เบอร์โทรผู้ผลิต</label>
                        <input type="text" name="sup_tel" class="form-control">
                </div>
                <input type="submit" name="submit" class="btn btn-primary" value="บันทึกข้อมูล">
            </form>
        </div>
    </div>
</div>