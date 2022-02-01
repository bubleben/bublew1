<?php
    include '../connect.php';
    $track_no=$_GET['track_no'];
    $sql="DELETE FROM tracking WHERE track_no='$track_no'";
    $result=$con->query($sql);
    if($result){
        echo "<script>window.location.href='index.php?page=Tracking'</script>";
    }else{
        echo "<script>
                alert('Error:ไม่สามารถลบข้อมูลได้');
                window.location.href='index.php?page=Tracking';
              </script>";
    }
?>