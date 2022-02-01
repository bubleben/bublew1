<?php
    include '../connect.php';
    $sup_id=$_GET['sup_id'];
        $pv_id=$_POST['pv_id'];
        $sup_name=$_POST['sup_name'];
        $sup_address=$_POST['sup_address'];
        $sup_tel=$_POST['sup_tel'];
    $sql="UPDATE supplier SET pv_id='$pv_id',sup_name='$sup_name',sup_address='$sup_address',sup_tel='$sup_tel' WHERE sup_id='$sup_id'";
    $result=$con->query($sql);
    if($result){
        echo "<script>window.location.href='index.php?page=supplier'</script>";
    }else{
        echo"<script>
                alert('Error: ไม่สามารถบันทึกข้อมูลได้');
                window.history.back()';
                </script>";
    }
?>