<?php
    include 'connect.php';

    // print_r($_POST);
    // exit;

    $mem=$_SESSION['mem_id'];
    // echo $mem;
    // exit;
    if(isset($_POST['add'])){
    $dea_name = $_POST['dea_name'];
    $brand_name = $_POST['brand_name'];
    $dea_address = $_POST['dea_address'];
    $pvv = $_POST['province'];
    $dea_tel = $_POST['dea_tel'];
    $bank_name = $_POST['bank_name'];
    $bank_account = $_POST['bank_account'];
    $bank_num = $_POST['bank_number'];

    $province="SELECT pv_id FROM province WHERE pv_name= '$pvv' ";
    $query=$con->query($province);
    $pvq=mysqli_fetch_array($query);

    $pv = $pvq['pv_id'];

    $date = date("Ymd");

    // echo $pv;
    // exit;


    $numrand = (mt_rand());

    $sample_img = (isset($_POST['sample_img']) ? $_POST['sample_img'] : '');
    $upload = $_FILES['sample_img']['name'];
    if($upload !=''){
        $path = "../assets/img/img_upload/receipt_payment/"; 
        $type = strrchr($_FILES['sample_img']['name'],".");
        $newname = $date1.$numrand.$type;
        $path_copy = $path.$newname;
        $path_link = "../assets/img/img_upload/sample_img/";
        
        move_uploaded_file($_FILES['sample_img']['tmp_name'], $path_link.$path_copy);
    }else{
        $newname = $sample_img2;
    }

    $shipping="INSERT INTO dealer VALUES ('','$mem','$dea_name','$brand_name','$dea_address','$pv', '$dea_tel', '$bank_name', '$bank_account','$bank_num', '$newname','$date')";
    $query=$con->query($shipping);

    // echo $shipping;
    // exit;


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