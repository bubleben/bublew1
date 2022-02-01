<?php
    include '../connect.php'; 
    // print_r($_POST);
    // exit;
    $sale_id=$_POST['sale_id'];
    $ship_time=$_POST['ship_time']; 
    $status = $_POST['o_status'];
   
    $sql="UPDATE sale SET ship_time='$ship_time', o_status='$status' WHERE sale_id='$sale_id'";
    $result=$con->query($sql);
    if($result){
        echo "<script>window.location.href='index.php?page=sale'</script>";
    }else{
        echo"<script>
                alert('Error: ไม่สามารถบันทึกข้อมูลได้');
                window.history.back()';
                </script>";
    }
?>