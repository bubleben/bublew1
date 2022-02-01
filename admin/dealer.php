<?php
    include '../connect.php';
    $sql="SELECT dealer.mem_id,member.mem_name,member.mem_mail,dealer.dea_name,dealer.brand_name,dealer.enable FROM member,dealer 
    WHERE dealer.mem_id=member.mem_id AND member.position = 'customer'";
    $result=$con->query($sql);
?>
<div class="container">
    <table class="table">
        <tr style="background:#9c27b0;color:#fff;">
            <th> id </th>
            <th>ชื่อผู้ใช้</th>
            <th>อีเมล</th>
            <th>ชื่อผู้จำหน่าย</th>
            <th>ชื่อแบรนด์</th>
            <th>วันที่เป็นสมาชิก</th>
            <th></th>
        </tr>
        <?php 
            $i=1;
            while($row=mysqli_fetch_array($result)){?>
        <tr>
            <td><?php echo $row['mem_id'] ?></td>
            <td><?php echo $row['mem_name'] ?></td>
            <td><?php echo $row['mem_mail'] ?></td>
            <td><?php echo $row['dea_name'] ?></td>
            <td><?php echo $row['brand_name']?></td>
            <td><?php echo $row['enable'] ?></td>
            <td>
                <a href="dea_del.php?mem_id=<?php echo $row['mem_id']?>"
                 class="btn btn-danger" onclick="return confirm('ยืนยันการลบ?')">
                    <i class="material-icons">close</i>
                </a> 
                <a href="index.php?page=dea_edit&mem_id=<?php echo $row['mem_id']?>"
                 class="btn btn-success">
                    <i class="material-icons">edit</i>
                </a> 
            </td>
        </tr>
        <?php } ?>
    </table>
</div>