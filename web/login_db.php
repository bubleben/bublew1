<?php
    include 'connect.php';
    session_start();
    if(isset($_POST['login'])){

        $username = $_POST['mem_name'];
        $password= $_POST['mem_pass'];
        
        $sql="SELECT * FROM member WHERE mem_name = '$username' AND mem_pass = '$password' ";
        $result=$con->query($sql);
        $row=mysqli_fetch_array($result);
        $num_row=mysqli_num_rows($result);

        $deaid="SELECT * FROM dealer WHERE mem_id ='$row[mem_id]'";
        $result1=$con->query($deaid);
        $row1=mysqli_fetch_array($result1);
    
        if($num_row==1){
            $_SESSION['username']=$row['mem_name'];
            $_SESSION['mem_id']=$row['mem_id'];
            if($row['position']=='admin'){
                header('location: homeadmin.php');               
            }elseif($row['position']=='dealer'){
                $_SESSION['dea_id']=$row1['dea_id'];
                header('location: homedealer.php');
            }elseif($row['position']=='customer'){
                header('location: home.php');
            } 
        }else{
            echo "<script>
                    alert('username หรือ password ไม่ถูกต้อง');
                    window.history.back();
                  </script>";
        }
    }
?>