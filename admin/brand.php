<?php
    include '../connect.php';
    $sql="SELECT * FROM brand";
    $result=$con->query($sql);
?>
<div class="container">
    <a href="index.php?page=brand_add" class="btn btn-outline-success">+เพิ่มสินค้า</a><br><br>
    <table class="table">
        <tr style="background:#9c27b0;color:#fff;">
            <th>ลำดับ</th>
            <th>ชื่อแบรนด์รนด์</th>
            <th></th>
        </tr>
        <?php 
            $i=1;
            while($row=mysqli_fetch_array($result)){?>
        <tr>
            <td><?php echo $row['brand_id'] ?></td>
            <td><?php echo $row['brand_name'] ?></td>
            <td>
            
                <a href="brand_del.php?brand_id=<?php echo $row['brand_id']?>"
                 class="btn btn-danger" onclick="return confirm('ยืนยันการลบ?')">
                    <i class="material-icons">close</i>
                </a> 
                <a href="index.php?page=brand_edit&brand_id=<?php echo $row['brand_id']?>"
                 class="btn btn-success">
                    <i class="material-icons">edit</i>
                </a> 
            </td>
        </tr>
        <?php } ?>
    </table>
</div>