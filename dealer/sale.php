<?php
    include '../connect.php';

    // $memid = $_SESSION['mem_id'];
    // $sql="SELECT * FROM sale WHERE mem_id = '$memid'";
    // $result=$con->query($sql);

    $dea_id=$_SESSION['dea_id'];
?>
<div class="container">
    <!-- <a href="index.php?page=order_add" class="btn btn-outline-success">+ขาย </a><br><br> -->
    <table class="table">
        <tr style="background:#9c27b0;color:#fff;">
         
            <th>รหัสกรขาย</th>
            <th>รหัสสมาชิก</th>
            <th>วันที่ขาย</th>
            <th>รวมค่าสินค้า</th>
            <th>ค่าส่ง</th>
            <th>ยอดคำสั่งซื้อทั้งหมด</th>
            <th>เวลาที่ชำระ</th>
            <th>หลักฐานการโอน</th>
            <th>รหัสที่อยู่</th>
            <th>เวลาส่งของ</th>
            <th>อัปเดทสถานะ/เช็คประวัติการชำระเงิน</th>
            <th></th>
        </tr>
        <?php
            $sql1 = "SELECT p.*, d.*, s.*, m.*, l.*
            FROM product as p 
            INNER JOIN sale_detail as d ON d.pro_id = p.pro_id 
            INNER JOIN sale as s ON d.sale_id = s.sale_id
            INNER JOIN member as m ON s.mem_id = m.mem_id
            INNER JOIN dealer as l ON p.dea_id = l.dea_id
            WHERE l.dea_id = $dea_id";
            $rscartdetail=$con->query($sql1);
        ?>
        <?php 
            $i=1;
            while($row=mysqli_fetch_array($rscartdetail)){?>
        <tr>
            <td><?php echo $row['sale_id'] ?></td>
            <td><?php echo $row['mem_id'] ?></td>
            <td><?php echo $row['sale_date'] ?></td>
            <td><?php echo $row['total_price'] ?></td>
            <td><?php echo $row['total_cost'] ?></td>
            <td><?php echo $row['net_price'] ?></td>
            <td><?php echo $row['payment_time'] ?></td>
            <td style="width: 120px"><img src="<?php echo $row['receipt_img'] ?>" rel="nofollow" style="width: 100px; height: 100px;"></td>
            <td><?php echo $row['ship_no'] ?></td>
            <td><?php echo $row['ship_time'] ?></td>
            <td>
            <?php 
               $st = $row['o_status']; //1 = Waiting for payment 2 = Pedding 3 = Wait dealer to sent 4 = Shipping is in progress 5 = Cancel
               if($st==1){
                   echo '<font color = "red">';
                   echo 'Waiting for payment';
               }elseif ($st==2){
                   echo '<font color = "orange">';
                   echo 'Pedding';
               }elseif ($st==3){
                   echo '<font color = "green">';
                   echo 'Payment Success';
                }elseif ($st==4){
                    echo '<font color = "green">';
                    echo 'Wait dealer sent';
                }elseif ($st==5){
                    echo '<font color = "green">';
                    echo 'Shipping Success';
               }else{
                   echo '<font color = "red">';
                   echo 'Cancel';
               } ?>
            </td>
         
            <td>
                <a href="index.php?page=sale_edit&sale_id=<?php echo $row['sale_id']?>"
                 class="btn btn-success">
                    <i class="material-icons">receipt</i>
                </a>
            </td>
        </tr>
        <?php } ?>
    </table>
</div>