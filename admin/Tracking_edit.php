<?php
    include '../connect.php';
    $track_no=$_GET['track_no'];
    $sql="SELECT * FROM tracking WHERE track_no='$track_no'";
    $result=$con->query($sql);
    $row=mysqli_fetch_array($result);
?>
<div class="container">
    <div class="card">
        <div class="card-header card-header-primary">
            <h3></h3>
        </div>
        <div class=card-body>
            <form action="Tracking_save.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>เลขพัสดุ</label>
                    <input type="text" name="track_no" class="form-control" value="<?php echo $row['track_no']?>">
                </div>
                <div class="form-group">
                    <label>รหัสการขาย</label>
                    <input type="text" name="sale_id" class="form-control" value="<?php echo $row['sale_id']?>">
                </div>
                <div class="form-group">
                    <label>ขนส่งที่ใช้</label>
                        <input type="text" name="transport_no" class="form-control" value="<?php echo $row['transport_no']?>">
                </div>  
                <input type="submit" name="submit" class="btn btn-outline-primary" value="บันทึกข้อมูล">
            </form>
        </div>
    </div>
</div>  