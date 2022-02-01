<?php 
    include '../connect.php';
    if(isset($_POST['submit'])){
        $cate_id=$_POST['cate_id'];
        $cate_name=$_POST['cate_name'];
            $sql="INSERT INTO category VALUES('$cate_id','$cate_name')";
            $result=$con->query($sql);
            if($result){
                echo "<script>window.location.href='index.php?page=category'</script>";
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
            <h5>เพิ่มข้อมูลหมวดหมู่</h5>
        </div>
        <div class=card-body>
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
                <div class="form-group ">
                    <label >ลำดับ</label>
                        <input type="text" name="cate_id" class="form-control">
                </div>
                <div class="form-group ">
                    <label >ชื่อหมวดหมู่</label>
                        <input type="text" name="cate_name" class="form-control">
                </div>
                <input type="submit" name="submit" class="btn btn-primary" value="บันทึกข้อมูล">
            </form>
        </div>
    </div>
</div>