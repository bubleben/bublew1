<?php
    include '../connect.php';
    $sql="SELECT * FROM member";
    $result=$con->query($sql);
?>
<div class="container">
    <a href="index.php?page=mem_add" class="btn btn-outline-success">+เพิ่มสมาชิก</a><br><br>
    <table class="table">
        <tr style="background:#9c27b0;color:#fff;">
            <th>รหัส</th>
            <th>ชื่อผู้ใช้</th>
            <th>อีเมล</th>
            <th>ชื่อ</th>
            <th>นามสกุล</th>
            <th>เพศ</th>
            <th>วันเกิด</th>
            <th>เบอร์ติดต่อ</th>
            <th>วันที่เป็นสมาชิก</th>
            <th>ตำแหน่ง</th>
            <th></th>
        </tr>
        <?php 
            $i=1;
            while($row=mysqli_fetch_array($result)){?>
        <tr>
            <td><?php echo $row['mem_id'] ?></td>
            <td><?php echo $row['mem_name'] ?></td>
            <td><?php echo $row['mem_mail'] ?></td>
            <td><?php echo $row['f_name'] ?></td>
            <td><?php echo $row['l_name'] ?></td>
            <td><?php echo $row['gender'] ?></td>
            <td><?php echo $row['birthday'] ?></td>
            <td><?php echo $row['phone'] ?></td>
            <td><?php echo $row['enable'] ?></td>
            <td><?php echo $row['position'] ?></td>
            <td>
                 <a href="mem_del.php?mem_id=<?php echo $row['mem_id']?>"
                 class="btn btn-danger" onclick="return confirm('ยืนยันการลบ?')">
                    <i class="material-icons">close</i>
                </a> 
                <a href="index.php?page=mem_edit&mem_id=<?php echo $row['mem_id']?>"
                 class="btn btn-success">
                    <i class="material-icons">edit</i>
                </a> 
            </td>
        </tr>
        <?php } ?>
    </table>
</div>