<?php
    include '../connect.php';
    $sql="SELECT * FROM sale";
    $result=$con->query($sql);
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
        </tr>
        <?php 
            $i=1;
            while($row=mysqli_fetch_array($result)){?>
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
                <!-- <a href="sale_del.php?sale_id=<?php echo $row['sale_id']?>"
                 class="btn btn-danger" onclick="return confirm('ยืนยันการลบ?')">
                    <i class="material-icons">close</i>
                </a>  -->
                <a href="index.php?page=sale_edit&sale_id=<?php echo $row['sale_id']?>"
                 class="btn btn-success">
                    <i class="material-icons">receipt</i>
                </a>
            </td>
        </tr>
        <?php } ?>
    </table>
</div>