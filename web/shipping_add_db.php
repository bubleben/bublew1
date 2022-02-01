<?php
    include 'connect.php';

    // print_r($_POST);
    // exit;

    $mem=$_SESSION['mem_id'];
    // echo $mem;
    // exit;
    if(isset($_POST['add'])){
    $f_name = $_POST['f_name'];
    $l_name = $_POST['l_name'];
    $phone = $_POST['phone'];
    $house_no = $_POST['house_no'];
    $street = $_POST['street'];
    $city = $_POST['city'];
    $postal_code = $_POST['postal_code'];
    $pv = $_POST['province'];

    $province="SELECT pv_id FROM province WHERE pv_name= '$pv' ";
    $query=$con->query($province);
    $pvq=mysqli_fetch_array($query);

    $pv = $pvq['pv_id'];

    // echo $pv;
    // exit;


    $shipping="INSERT INTO shipping_address VALUES ('','$mem','$f_name','$l_name','$phone','$house_no', '$street', '$city', '$postal_code','$pv')";
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