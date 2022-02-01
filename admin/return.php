<?php
    include '../connect.php';
    $sql="SELECT * FROM returns ";
    $result=$con->query($sql);
?>
<div class="container">
    <!-- <a href="index.php?page=pro_add" class="btn btn-outline-success">+เพิ่มสินค้า</a><br><br> -->
    <table class="table">
        <tr style="background:#9c27b0;color:#fff;">
            <th>รหัสสินค้า</th>
            <th>รหัสการขาย</th>
            <th>จำนวน</th>
            <th>วันที่คืน</th>
            <th>สาเหตุ</th>
            <!-- <th></th> -->
        </tr>
        <?php 
            $i=1;
            while($row=mysqli_fetch_array($result)){?>
        <tr>
            <td><?php echo $row['pro_id'] ?></td>
            <td><?php echo $row['sale_id'] ?></td>
            <td><?php echo $row['amount'] ?></td>
            <td><?php echo $row['return_date'] ?></td>
            <td><?php echo $row['comment'] ?></td>
            <!-- <td>
            
                <a href="pro_del.php?pro_id=<?php echo $row['pro_id']?>"
                 class="btn btn-danger" onclick="return confirm('ยืนยันการลบ?')">
                    <i class="material-icons">close</i>
                </a> 
                <a href="index.php?page=pro_edit&pro_id=<?php echo $row['pro_id']?>"
                 class="btn btn-success">
                    <i class="material-icons">edit</i>
                </a> 
            </td> -->
        </tr>
        <?php } ?>
    </table>
</div>