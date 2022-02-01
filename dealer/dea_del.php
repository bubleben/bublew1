<?php
    include '../connect.php';
    $sup_id=$_GET['sup_id'];
    $sql="DELETE FROM supplier WHERE sup_id='$sup_id'";
    $result=$con->query($sql);
    if($result){
        echo "<script>window.location.href='index.php?page=supplier'</script>";
    }else{
        echo "<script>
                alert('Error:ไม่สามารถลบข้อมูลได้');
                window.location.href='index.php?page=supplier';
              </script>";
    }
?>