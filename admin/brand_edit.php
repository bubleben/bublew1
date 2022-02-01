<?php
    include '../connect.php';
    $brand_id=$_GET['brand_id'];
    $sql="SELECT * FROM brand WHERE brand_id='$brand_id'";
    $result=$con->query($sql);
    $row=mysqli_fetch_array($result);
?>
<div class="container">
    <div class="card">
        <div class="card-header card-header-primary">
            <h3>เพิ่มข้อมูลสินค้า</h3>
        </div>
        <div class=card-body>
            <form action="brand_save.php?brand_id=<?php echo $row['brand_id']?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>ชื่อสินค้า</label>
                        <input type="text" name="brand_id" class="form-control" value="<?php echo $row['brand_id']?>">
                </div>
                <div class="form-group">
                    <label>ราคาที่ซื้อมา</label>
                        <input type="text" name="brand_name" class="form-control" value="<?php echo $row['brand_name']?>">
                </div>
                                     
                <input type="submit" name="submit" class="btn btn-outline-primary" value="บันทึกข้อมูล">
            </form>
        </div>
    </div>
</div>  