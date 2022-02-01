<?php 
    include '../connect.php';
    if(isset($_POST['submit'])){
        $brand_id=$_POST['brand_id'];
        $brand_name=$_POST['brand_name'];
            $sql="INSERT INTO brand VALUES('$brand_id','$brand_name')";
            $result=$con->query($sql);
            if($result){
                echo "<script>window.location.href='index.php?page=brand'</script>";
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
            <h5>เพิ่มข้อมูลสินค้า</h5>
        </div>
        <div class=card-body>
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
                <div class="form-group ">
                    <label >ลำดับ</label>
                        <input type="text" name="brand_id" class="form-control">
                </div>
                <div class="form-group ">
                    <label >ชื่อแบรนด์</label>
                        <input type="text" name="brand_name" class="form-control">
                </div>
                <input type="submit" name="submit" class="btn btn-primary" value="บันทึกข้อมูล">
            </form>
        </div>
    </div>
</div>