<?php
    include '../connect.php';
    $transport_no=$_GET['transport_no'];
    $sql="SELECT * FROM transport WHERE transport_no='$transport_no'";
    $result=$con->query($sql);
    $row=mysqli_fetch_array($result);
?>
<div class="container">
    <div class="card">
        <div class="card-header card-header-primary">
            <h3></h3>
        </div>
        <div class=card-body>
            <form action="transport_save.php?transport_no=<?php echo $row['transport_no']?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>รหัส</label>
                    <input type="text" name="transport_no" class="form-control" value="<?php echo $row['transport_no']?>">
                </div>
                <div class="form-group">
                    <label>ชื่อบริษัทขนส่ง</label>
                        <input type="text" name="transport_name" class="form-control" value="<?php echo $row['transport_name']?>">
                </div>  
                <input type="submit" name="submit" class="btn btn-outline-primary" value="บันทึกข้อมูล">
            </form>
        </div>
    </div>
</div>  