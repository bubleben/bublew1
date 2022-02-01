<?php
    include '../connect.php';
    // session_start();

    $memid=$_SESSION['mem_id'];
    // $mem_id=$_POST['mem_id'];
    $dea_name=$_POST['dea_name'];
    $brand_name=$_POST['brand_name'];
    $dea_address=$_POST['dea_address'];
    $pv_id=$_POST['pv_id'];
    $dea_tel=$_POST['dea_tel'];
    $bank_name=$_POST['bank_name'];
    $bank_account=$_POST['bank_account'];
    $bank_num=$_POST['bank_num'];
    // $mem_name=$_POST['mem_name'];
    // $mem_mail=$_POST['mem_mail'];
    // $f_name=$_POST['f_name'];
    // $l_name=$_POST['l_name'];
    // $phone=$_POST['phone'];
  
    

    //  // $dea_id=$_POST['dealer'];
    //     //ฟังก์ชั่นวันที่
    //     date_default_timezone_set('Asia/Bangkok');
	//     $date = date("Ymd");	
        
    //     //ฟังก์ชั่นสุ่มตัวเลข
    //     $numrand = (mt_rand());

    //     //เอาชื่อไฟล์เก่าออกให้เหลือแต่นามสกุล
    //     $type = strrchr($_FILES['fileupload']['name'],".");
            
    //     //ตั้งชื่อไฟล์ใหม่โดยเอาเวลาไว้หน้าชื่อไฟล์เดิม
    //     $newname = $date.$numrand.$type;
    //     $path_copy=$path.$newname;
    //     // $path_link="../assets/img/img_upload/".$newname;
    //     $dir = "../assets/img/img_upload/product/";

        

        // move_uploaded_file ($_FILES["fileupload"]["tmp_name"], $dir.$path_copy);

    
    $sql="UPDATE dealer SET dea_name='$dea_name',brand_name='$brand_name',dea_address='$dea_address',pv_id='$pv_id',dea_tel='$dea_tel',bank_name='$bank_name',bank_account='$bank_account',bank_num='$bank_num' WHERE mem_id='$memid' ";
    $result=$con->query($sql);
    if($result){
        
    //     $sql1="UPDATE member SET mem_name='$mem_name',mem_mail='$mem_mail',f_name='$f_name',l_name='$l_name',phone='$phone' WHERE member.mem_id='$mem_id';";
    //     $result1=$con->query($sql1);
    //     if($result1){
    //          echo "<script>window.location.href='index.php?page=dealer'</script>";
    //     }else{
    //         echo"<script>
    //             alert('Error: ไม่สามารถบันทึกข้อมูลได้');
    //             window.history.back()';
    //             </script>";
    // }
        echo "<script>window.location.href='index.php?page=dealer'</script>";
    }else{
        echo"<script>
                alert('Error: ไม่สามารถบันทึกข้อมูลได้');
                window.history.back()';
                </script>";
    }

    
   
?>