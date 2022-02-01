<?php
    include '../connect.php';
    session_start();
    $deaid=$_SESSION['dea_id'];  
    $transport_no=$_POST['transport_no'];
    $ship_cost=$_POST['ship_cost']; 
    $sql="UPDATE transport_detail SET ship_cost='$ship_cost' WHERE transport_no='$transport_no' AND dea_id='$deaid'";
    $result=$con->query($sql);
    if($result){
        echo "<script>window.location.href='index.php?page=transport'</script>";
    }else{
        echo"<script>
                alert('Error: ไม่สามารถบันทึกข้อมูลได้');
                window.history.back()';
                </script>";
    }
?>