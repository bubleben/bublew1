<?php
    include '../connect.php';
    $brand_id=$_GET['brand_id'];
    $brand_name=$_POST['brand_name'];
    $sql="UPDATE brand SET brand_name='$brand_name' WHERE brand_id='$brand_id'";
    $result=$con->query($sql);
    if($result){
        echo "<script>window.location.href='index.php?page=brand'</script>";
    }else{
        echo"<script>
                alert('Error: ไม่สามารถบันทึกข้อมูลได้');
                window.history.back()';
                </script>";
    }
?>