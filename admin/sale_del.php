<?php
    include '../connect.php';
    $sale_id=$_GET['sale_id'];
    $sql1="DELETE FROM sale_detail WHERE sale_id='$sale_id'";
    $result1=$con->query($sql1);
    $sql="DELETE FROM sale WHERE sale_id='$sale_id'";
    $result=$con->query($sql);
    echo "<script>window.location.href='index.php?page=sale'</script>";
    
?>