<?php
    include '../connect.php';
    $transport_no=$_POST['transport_no'];
    $transport_name=$_POST['transport_name'];   
    $sql="UPDATE transport SET transport_no='$transport_no',transport_name='$transport_name' WHERE transport_no='$transport_no'";
    $result=$con->query($sql);
    if($result){
        echo "<script>window.location.href='index.php?page=transport'</script>";
    }else{
        echo"<script>
                alert('Error: ไม่สามารถบันทึกข้อมูลได้');
                window.history.back()';
                </script>";
    }
?>