<?php
    include '../connect.php';
    $pro_id=$_GET['pro_id'];
    $sql="DELETE FROM product WHERE pro_id='$pro_id'";
    $result=$con->query($sql);
    if($result){
        echo "<script>window.location.href='index.php?page=product'</script>";
    }else{
        echo "<script>
                alert('Error:ไม่สามารถลบข้อมูลได้');
                window.location.href='index.php?page=product';
              </script>";
    }
?>