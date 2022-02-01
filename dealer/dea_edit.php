<?php
    include '../connect.php';
    $sup_id=$_GET['sup_id'];
    $sql="SELECT * FROM supplier WHERE sup_id='$sup_id'";
    $result=$con->query($sql);
    $row=mysqli_fetch_array($result);
?>
<div class="container">
    <div class="card">
        <div class="card-header card-header-primary">
            <h3>เพิ่มข้อมูลผู้ผลิต</h3>
        </div>
        <div class=card-body>
            <form action="sup_save.php?sup_id=<?php echo $row['sup_id']?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>ลำดับ</label>
                        <input type="text" name="sup_id" class="form-control" value="<?php echo $row['sup_id']?>">
                </div>
                <div class="form-group">
                    <label>รหัสจังหวัด</label>
                        <input type="text" name="pv_id" class="form-control" value="<?php echo $row['pv_id']?>">
                </div>
                <div class="form-group">
                    <label>ชื่อผู้ผลิต</label>
                        <input type="text" name="sup_name" class="form-control" value="<?php echo $row['sup_name']?>">
                </div>
                <div class="form-group">
                    <label>ที่อยู่ผู้ผลิต</label>
                        <input type="text" name="sup_address" class="form-control" value="<?php echo $row['sup_address']?>">
                </div>
                <div class="form-group">
                    <label>เบอร์โทรผู้ผลิต</label>
                        <input type="text" name="sup_tel" class="form-control" value="<?php echo $row['sup_tel']?>">
                </div>              
                <input type="submit" name="submit" class="btn btn-outline-primary" value="บันทึกข้อมูล">
            </form>
        </div>
    </div>
</div>  