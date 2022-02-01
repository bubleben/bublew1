<?php
    include '../connect.php';
        $emp_no=$_GET['emp_no'];
        $emp_id=$_POST['emp_id'];
        $emp_name=$_POST['emp_name'];
        $emp_mail=$_POST['emp_mail'];
        $phone=$_POST['phone'];
        $emp_username=$_POST['emp_username'];
        $emp_pass=$_POST['emp_pass'];
        $position=$_POST['position'];
    $sql="UPDATE employee SET emp_id='$emp_id',emp_name='$emp_name',emp_mail='$emp_mail',phone='$phone',emp_username='$emp_username',emp_pass='$emp_pass',position='$position' WHERE emp_no='$emp_no'";
    $result=$con->query($sql);
    if($result){
        echo "<script>window.location.href='index.php?page=employee'</script>";
    }else{
        echo"<script>
                alert('Error: ไม่สามารถบันทึกข้อมูลได้');
                window.history.back()';
                </script>";
    }
?>