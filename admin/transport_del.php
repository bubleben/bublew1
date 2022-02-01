<?php
    include '../connect.php';
    $transport_no=$_GET['transport_no'];
    $sql="DELETE FROM transport WHERE transport_no='$transport_no'";
    $result=$con->query($sql);
    if($result){
        echo "<script>window.location.href='index.php?page=transport'</script>";
    }else{
        echo "<script>
                alert('Error:ไม่สามารถลบข้อมูลได้');
                window.location.href='index.php?page=transport';
              </script>";
    }
?>