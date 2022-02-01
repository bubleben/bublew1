<?php
    include '../connect.php';
    $sql="SELECT * FROM employee";
    $result=$con->query($sql);
?>
<div class="container">
    <a href="index.php?page=emp_add" class="btn btn-outline-success">+เพิ่มข้อมูลพนักงาน</a><br><br>
    <table class="table">
        <tr style="background:#9c27b0;color:#fff;">
            <th>รหัสพนักงาน</th>
            <th>รหัสประจำตัวประชาชน</th>
            <th>ชื่อ</th>
            <th>อีเมล</th>
            <th>เบอร์ติดต่อ</th>
            <th>ชื่อผู้ใช้งาน</th>
            <th>รหัส</th>
            <th>ตำแหน่ง</th>
            <th></th>
        </tr>
        <?php 
            $i=1;
            while($row=mysqli_fetch_array($result)){?>
        <tr>
            <td><?php echo $row['emp_no'] ?></td>
            <td><?php echo $row['emp_id'] ?></td>
            <td><?php echo $row['emp_name'] ?></td>
            <td><?php echo $row['emp_mail'] ?></td>
            <td><?php echo $row['phone'] ?></td>
            <td><?php echo $row['emp_username'] ?></td>
            <td><?php echo $row['emp_pass'] ?></td>
            <td><?php echo $row['position'] ?></td>
            <td>
                <a href="emp_del.php?emp_no=<?php echo $row['emp_no']?>"
                 class="btn btn-danger" onclick="return confirm('ยืนยันการลบ?')">
                    <i class="material-icons">close</i>
                </a> 
                <a href="index.php?page=emp_edit&emp_no=<?php echo $row['emp_no']?>"
                 class="btn btn-success">
                    <i class="material-icons">edit</i>
                </a> 
            </td>
        </tr>
        <?php } ?>
    </table>
</div>