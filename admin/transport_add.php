<?php 
    include '../connect.php';
    if(isset($_POST['submit'])){
        $transport_no=$_POST['transport_no'];
        $transport_name=$_POST['transport_name'];
            $sql="INSERT INTO transport VALUES('$transport_no','$transport_name')";
            $result=$con->query($sql);
            if($result){
                echo "<script>window.location.href='index.php?page=transport'</script>";
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
            <h5>เพิ่มข้อมูลบริษัทขนส่ง</h5>
        </div>
        <div class=card-body>
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
                <div class="form-group ">
                    <label >รหัส</label>
                        <input type="text" name="transport_no" class="form-control">
                </div>
                <div class="form-group ">
                    <label >ชื่อบริษัทขนส่ง</label>
                        <input type="text" name="transport_name" class="form-control">
                </div>
                <input type="submit" name="submit" class="btn btn-primary" value="บันทึกข้อมูล">
            </form>
        </div>
    </div>
</div>