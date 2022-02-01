<?php
    include '../connect.php';
    // session_start();
    $deaid=$_SESSION['mem_id'];
    $pro_id=$_POST['pro_id'];
        $pro_name=$_POST['pro_name'];
        $cate_id=$_POST['category'];
        $sale_price=$_POST['sale_price'];
        $pro_detail=$_POST['pro_detail'];
        
        // $dea_id=$_POST['dealer'];
        //ฟังก์ชั่นวันที่
        date_default_timezone_set('Asia/Bangkok');
	    $date = date("Ymd");	
        
        //ฟังก์ชั่นสุ่มตัวเลข
        $numrand = (mt_rand());

        //เอาชื่อไฟล์เก่าออกให้เหลือแต่นามสกุล
        $type = strrchr($_FILES['fileupload']['name'],".");
            
        //ตั้งชื่อไฟล์ใหม่โดยเอาเวลาไว้หน้าชื่อไฟล์เดิม
        $newname = $date.$numrand.$type;
        $path_copy=$path.$newname;
        // $path_link="../assets/img/img_upload/".$newname;
        $dir = "../assets/img/img_upload/product/";

        

        move_uploaded_file ($_FILES["fileupload"]["tmp_name"], $dir.$path_copy);

        $sql="UPDATE product SET pro_name='$pro_name',cate_id='$cate_id',sale_price='$sale_price',pro_detail='$pro_detail',pro_img='$dir$newname',dea_id='$deaid' WHERE pro_id='$pro_id'";
        $result=$con->query($sql);
    if($result){
        echo "<script>window.location.href='index.php?page=product'</script>";
    }else{
        echo"<script>
                alert('Error: ไม่สามารถบันทึกข้อมูลได้');
                window.history.back()';
                </script>";
    }
?>