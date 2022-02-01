<?php
    include '../connect.php';
    $cate_id=$_GET['cate_id'];
    $cate_name=$_POST['cate_name'];
    $sql="UPDATE category SET cate_name='$cate_name' WHERE cate_id='$cate_id'";
    $result=$con->query($sql);
    if($result){
        echo "<script>window.location.href='index.php?page=category'</script>";
    }else{
        echo"<script>
                alert('Error: ไม่สามารถบันทึกข้อมูลได้');
                window.history.back()';
                </script>";
    }
?>