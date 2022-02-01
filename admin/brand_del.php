<?php
    include '../connect.php';
    $brand_id=$_GET['brand_id'];
    $sql="DELETE FROM brand WHERE brand_id='$brand_id'";
    $result=$con->query($sql);
    if($result){
        echo "<script>window.location.href='index.php?page=brand'</script>";
    }else{
        echo "<script>
                alert('Error:ไม่สามารถลบข้อมูลได้');
                window.location.href='index.php?page=brand';
              </script>";
    }
?>