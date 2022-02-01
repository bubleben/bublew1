<?php
    include '../connect.php';
    $sql="SELECT * FROM transport";
    $result=$con->query($sql);
?>
<div class="container">
    <a href="index.php?page=transport_add" class="btn btn-outline-success">+เพิ่มบริษัทขนส่ง</a><br><br>
    <table class="table">
        <tr style="background:#9c27b0;color:#fff;">
            <th>รหัส</th>
            <th>ชื่อบริษัทขนส่ง</th>
            <th></th>
        </tr>
        <?php 
            $i=1;
            while($row=mysqli_fetch_array($result)){?>
        <tr>
            <td><?php echo $row['transport_no'] ?></td>
            <td><?php echo $row['transport_name'] ?></td>
            <td>
            
                <a href="transport_del.php?transport_no=<?php echo $row['transport_no']?>"
                 class="btn btn-danger" onclick="return confirm('ยืนยันการลบ?')">
                    <i class="material-icons">close</i>
                </a> 
                <a href="index.php?page=transport_edit&transport_no=<?php echo $row['transport_no']?>"
                 class="btn btn-success">
                    <i class="material-icons">edit</i>
                </a> 
            </td>
        </tr>
        <?php } ?>
    </table>
</div>