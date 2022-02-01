<?php
    include 'connect.php';
    include 'header.php';

    $mem = $_SESSION['mem_id'];

    // print_r ($_SESSION['mem_id']);
?>
    <meta charset=utf-8 />

        <?php

            // echo '<pre>';
            // print_r($_SESSION);
            // echo '</pre>';

            // echo '<pre>';
            // print_r($_POST);
            // echo '</pre>';

            // exit;

            $mem=$_SESSION['mem_id'];
            $total_price=$_POST["total_price"];
            $total_cost=$_POST["total_cost"];
            $net_price=$_POST["net_price"];
            $address=$_POST["shiping"];
            $dttm=Date("Y-m-d H:i:s");
            

            mysqli_query($con, "BEGIN"); 
            $sql1 = "INSERT INTO sale VALUES ('','$mem','$dttm','$total_price','$total_cost','$net_price',null,null,null,'$address',null,'1')";
            $query1 = $con->query($sql1);

            // echo $sql1;
            // exit;

            //ฟังก์ชั่น MAX() จะคืนค่าที่มากที่สุดในคอลัมน์ที่ระบุ ออกมา หรือจะพูดง่ายๆก็ว่า ใช้สำหรับหาค่าที่มากที่สุด นั่นเอง.
            $sql2 = "SELECT MAX(sale_id) AS sale_id FROM sale WHERE mem_id='$mem' AND sale_date='$dttm' ";
            $query2 = $con->query($sql2);
            $row = mysqli_fetch_array($query2);
            $sale_id = $row["sale_id"];


            // echo $sql2;
            // echo $sale_id;
            //exit;

            //PHP foreach() เป็นคำสั่งเพื่อนำข้อมูลออกมาจากตัวแปลที่เป็นประเภท array โดยสามารถเรียกค่าได้ทั้ง $key และ $value ของ array
            foreach($_SESSION['cart'] as $p_id=>$qty)
            {
                $sql3	= "SELECT * FROM product WHERE pro_id=$p_id";
                $query3 = $con->query($sql3);
                $row3	= mysqli_fetch_array($query3);
                $total	= $row3['sale_price']*$qty;
                $sale_price = $row3['sale_price'];
                
                $sql4	= "INSERT INTO sale_detail VALUES ('$sale_id', '$p_id', '$qty', '$sale_price', '$total', '$total_cost')";
                $query4 = $con->query($sql4);
            }
                // echo $sql4;
                // exit;
            
            if($query1 && $query4){
                mysqli_query($con, "COMMIT");
                $msg = "บันทึกข้อมูลเรียบร้อยแล้ว ";
                foreach($_SESSION['cart'] as $p_id)
                {	
                    //unset($_SESSION['cart'][$p_id]);
                    unset($_SESSION['cart']);
                }
            }
            else{
                mysqli_query($con, "ROLLBACK");  
                $msg = "บันทึกข้อมูลไม่สำเร็จ กรุณาติดต่อแอดมินค่ะ ";	
            }
        ?>
        <script type="text/javascript">
            alert("<?php echo $msg;?>");
            window.location ='order.php?mem_id=<?php echo $mem; ?>';
        </script>


<?php include 'footer.php'; ?>