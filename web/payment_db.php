<?php
    include "connect.php";

    $mem=$_SESSION['mem_id'];
    $payment_date = mysqli_real_escape_string($con,$_POST['payment_date']);
    $payment_time = mysqli_real_escape_string($con,$_POST['payment_time']);
    $sale_id = mysqli_real_escape_string($con,$_POST['sale_id']);

    // print_r($_POST);
    // print_r($_FILES)['name'];
    // print_r($_SESSION);
    // echo $pydatetime;
    // exit;


   //ฟังก์ชั่นวันที่
   date_default_timezone_set('Asia/Bangkok');
   $date = date("Ymd");

   //ฟังก์ชั่นสุ่มตัวเลข
   $numrand = (mt_rand());

   //เอาชื่อไฟล์เก่าออกให้เหลือแต่นามสกุล
   $type = strrchr($_FILES['receipt_img']['name'],".");

   //ตั้งชื่อไฟล์ใหม่โดยเอาเวลาไว้หน้าชื่อไฟล์เดิม
   $newname = $date.$numrand.$type;
   $path_copy=@$path.$newname;
   // $path_link="../assets/img/img_upload/".$newname;
   $dir = "../assets/img/img_upload/receipt_payment/";

   move_uploaded_file ($_FILES["receipt_img"]["tmp_name"], $dir.$path_copy);
       $sql="UPDATE sale SET payment_date = '$payment_date', payment_time = '$payment_time', receipt_img = '$dir$newname', o_status = 2 WHERE sale_id = $sale_id";
       $result = $con->query($sql);


    mysqli_close($con);


    if($result){
        echo "<script type='text/javascript'>";
        echo "alert('Payment Success');";
        echo "window.location ='home.php';";
        echo "</script>";
    }else{
        echo "<script type='text/javascript'>";
        echo "alert('Somgthing wrong');";
        echo "window.location ='home.php';";
        echo "</script>";
}
?>