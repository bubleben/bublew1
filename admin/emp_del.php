<?php
    include '../connect.php';
    $emp_no=$_GET['emp_no'];
    $sql="DELETE FROM employee WHERE emp_no='$emp_no'";
    $result=$con->query($sql);
    if($result){
        echo "<script>window.location.href='index.php?page=employee'</script>";
    }else{
        echo "<script>
                alert('Error:ไม่สามารถลบข้อมูลได้');
                window.location.href='index.php?page=employee';
              </script>";
    }
?>