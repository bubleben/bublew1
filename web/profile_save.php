<?php
     session_start();
    include 'connect.php';
    if(isset($_POST['edit'])){
    $memo=$_SESSION['username'];
    $mem_pass=$_POST['mem_pass'];
    $mem_mail=$_POST['mem_mail'];
    $f_name=$_POST['f_name'];
    $l_name=$_POST['l_name'];
    $gender=$_POST['gender'];
    $birthday=$_POST['birthday'];
    $phone=$_POST['phone'];
    $member="UPDATE member SET mem_mail='$mem_mail',f_name='$f_name',l_name='$l_name',gender='$gender',birthday='$birthday',phone='$phone' WHERE mem_name='$memo'";
    $query=$con->query($member);
    if($query){
        header('location:profile.php');
    }else{
        echo"<script>
                alert('Error: ไม่สามารถบันทึกข้อมูลได้');
                window.history.back()';
                </script>";
    }
}
?>