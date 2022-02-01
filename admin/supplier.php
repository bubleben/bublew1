<?php
    include '../connect.php';
    $sql="SELECT * FROM supplier";
    $result=$con->query($sql);
?>
<div class="container">
    <a href="index.php?page=sup_add" class="btn btn-outline-success">+เพิ่มผู้ผลิต</a><br><br>
    <table class="table">
        <tr style="background:#9c27b0;color:#fff;">
            <th>ลำดับ</th>
            <th>รหัสจังหวัด</th>
            <th>ชื่อผู้ผลิต</th>
            <th>ที่อยู่ผู้ผลิต</th>
            <th>เบอร์โทรผู้ผลิต</th>
            <th></th>
        </tr>
        <?php 
            $i=1;
            while($row=mysqli_fetch_array($result)){?>
        <tr>
            <td><?php echo $row['sup_id'] ?></td>
            <td><?php echo $row['pv_id'] ?></td>
            <td><?php echo $row['sup_name'] ?></td>
            <td><?php echo $row['sup_address'] ?></td>
            <td><?php echo $row['sup_tel'] ?></td>
            <td>
            
                <a href="sup_del.php?sup_id=<?php echo $row['sup_id']?>"
                 class="btn btn-danger" onclick="return confirm('ยืนยันการลบ?')">
                    <i class="material-icons">close</i>
                </a> 
                <a href="index.php?page=sup_edit&sup_id=<?php echo $row['sup_id']?>"
                 class="btn btn-success">
                    <i class="material-icons">edit</i>
                </a> 
            </td>
        </tr>
        <?php } ?>
    </table>
</div>