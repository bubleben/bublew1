<?php
    include '../connect.php';

    $track_no=$_POST['track_no'];
    $sale_id=$_POST['sale_id']; 
    $transport_no=$_POST['transport_no']; 
    $sql="UPDATE tracking SET sale_id='$sale_id',transport_no='$transport_no' WHERE track_no='$track_no'";
    $result=$con->query($sql);
    if($result){
        echo "<script>window.location.href='index.php?page=Tracking'</script>";
    }else{
        echo"<script>
                alert('Error: ไม่สามารถบันทึกข้อมูลได้');
                window.history.back()';
                </script>";
    }
?>