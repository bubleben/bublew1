<?php
    include '../connect.php';
    $mem_id=$_GET['mem_id'];
    $sql="DELETE FROM member WHERE mem_id='$mem_id'";
    $result=$con->query($sql);
    if($result){
        echo "<script>window.location.href='index.php?page=member'</script>";
    }else{
        echo "<script>
                alert('Error:ไม่สามารถลบข้อมูลได้ กรุณาเช็คบิลของคุณอีกครั้ง');
                window.location.href='index.php?page=member';
              </script>";
    }
?>