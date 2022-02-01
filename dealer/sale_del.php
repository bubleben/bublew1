<?php
    include '../connect.php';
    $sale_id=$_GET['sale_id'];
    $sql="DELETE FROM sale WHERE sale_id='$sale_id'";
    $result=$con->query($sql);
    if($result){
        echo "<script>window.location.href='index.php?page=sale'</script>";
    }else{
        echo "<script>
                alert('Error:ไม่สามารถลบข้อมูลได้');
                window.location.href='index.php?page=sale';
              </script>";
    }
?>