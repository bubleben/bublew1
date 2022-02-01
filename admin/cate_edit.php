<?php
    include '../connect.php';
    $cate_id=$_GET['cate_id'];
    $sql="SELECT * FROM category WHERE cate_id='$cate_id'";
    $result=$con->query($sql);
    $row=mysqli_fetch_array($result);
?>
<div class="container">
    <div class="card">
        <div class="card-header card-header-primary">
            <h3>เพิ่มข้อมูลหมวดหมู่</h3>
        </div>
        <div class=card-body>
            <form action="cate_save.php?cate_id=<?php echo $row['cate_id']?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>ลำดับ</label>
                        <input type="text" name="cate_id" class="form-control" value="<?php echo $row['cate_id']?>">
                </div>
                <div class="form-group">
                    <label>ชื่อหมวดหมู่</label>
                        <input type="text" name="cate_name" class="form-control" value="<?php echo $row['cate_name']?>">
                </div>
                                     
                <input type="submit" name="submit" class="btn btn-outline-primary" value="บันทึกข้อมูล">
            </form>
        </div>
    </div>
</div>  