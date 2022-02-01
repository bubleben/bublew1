<?php
    include '../connect.php';

    $memid = $_SESSION['mem_id'];

    $querydeaid = "SELECT d.*, m.* FROM dealer as d INNER JOIN member as m ON d.mem_id = m.mem_id
    WHERE m.mem_id = $memid";
    $rsdeaid=$con->query($querydeaid);
    $rowdeaid=mysqli_fetch_array($rsdeaid);

    $deaid = $rowdeaid['dea_id'];
   
    $sql = "SELECT s.*, d.*  FROM stock as s INNER JOIN dealer as d ON s.dea_id = d.dea_id WHERE s.dea_id = $deaid ";
    $result=$con->query($sql);
    // $rowdeaid=mysqli_fetch_array($result);

    // echo $rowdeaid['dea_id'];
    // echo $rowdeaid['dea_name'];
    // exit;
?>
    <div class="container">
    <a href="index.php?page=stock_add&dea_id<?php echo $rowdeaid['dea_id']?>" class="btn btn-outline-success">+เพิ่มจำนวนสต็อกสินค้า</a><br><br>
    <table class="table" style="text-align: center;">
        <tr style="background:#9c27b0;color:#fff;">
            <th>รหัสการสต็อกสินค้า</th>
            <th>รหัสผู้จำหน่าย</th>
            <th>ราคาสุุทธิ</th>
            <th>วันที่สต็อกสินค้า</th>
            <th></th>
        </tr>
        <?php 
            $i=1;
            while($row=mysqli_fetch_array($result)){?>
        <tr>
            <td style="width: 160px"><?php echo $row['stock_id'] ?></td>
            <td style="width: 160px"><?php echo $row['dea_name'] ?></td>
            <td style="width: 260px"><?php echo $row['net_price'] ?></td>
            <td style="width: 160px"><?php echo $row['stock_date'] ?></td>
            <td>
            
                <a href="stock_del.php?stock_id=<?php echo $row['stock_id']?>"
                 class="btn btn-danger" onclick="return confirm('ยืนยันการลบ?')">
                    <i class="material-icons">close</i>
                </a> 
                <a href="index.php?page=stock_edit&stock_id=<?php echo $row['stock_id']?>"
                 class="btn btn-success">
                    <i class="material-icons">receipt</i>
                </a> 
            </td>
        </tr>
        <?php } ?>
    </table>
</div>