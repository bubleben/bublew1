<?php
    include '../connect.php';
     $mem_id=$_POST['mem_id'];
        $mem_name=$_POST['mem_name'];
        $mem_pass=$_POST['mem_pass'];
        $mem_mail=$_POST['mem_mail'];
        $f_name=$_POST['f_name'];
        $l_name=$_POST['l_name'];
        $gender=$_POST['gender'];
        $birthday=$_POST['birthday'];
        $phone=$_POST['phone'];
        $position=$_POST['position'];
       
    $sql="UPDATE member SET mem_id='$mem_id',mem_name='$mem_name',mem_pass='$mem_pass',mem_mail='$mem_mail',
    f_name='$f_name',l_name='$l_name',gender='$gender',birthday='$birthday',phone='$phone',position='$position' WHERE mem_id='$mem_id'";
    $result=$con->query($sql);
    if($result){
        echo "<script>window.location.href='index.php?page=member'</script>";
    }else{
        echo"<script>
                alert('Error: ไม่สามารถบันทึกข้อมูลได้');
                window.history.back()';
                </script>";
    }
?>