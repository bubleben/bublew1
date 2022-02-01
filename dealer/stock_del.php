<?php
    include '../connect.php';
    $stock_id=$_GET['stock_id'];
    $sql="DELETE FROM stock WHERE stock_id='$stock_id'";
    $result=$con->query($sql);
    if($result){
        echo "<script>window.location.href='index.php?page=stock'</script>";
    }else{
        echo "<script>
                alert('Error:ไม่สามารถลบข้อมูลได้');
                window.location.href='index.php?page=stock';
              </script>";
    }
?>