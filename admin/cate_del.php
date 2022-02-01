<?php
    include '../connect.php';
    $cate_id=$_GET['cate_id'];
    $sql="DELETE FROM category WHERE cate_id='$cate_id'";
    $result=$con->query($sql);
    if($result){
        echo "<script>window.location.href='index.php?page=category'</script>";
    }else{
        echo "<script>
                alert('Error:ไม่สามารถลบข้อมูลได้');
                window.location.href='index.php?page=category';
              </script>";
    }
?>