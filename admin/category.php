<?php
    include '../connect.php';
    $sql="SELECT * FROM category";
    $result=$con->query($sql);
?>
<div class="container">
    <a href="index.php?page=cate_add" class="btn btn-outline-success">+เพิ่มหมวดหมู่</a><br><br>
    <table class="table">
        <tr style="background:#9c27b0;color:#fff;">
            <th>ลำดับ</th>
            <th>ชื่อหมวดหมู่</th>
            <th></th>
        </tr>
        <?php 
            $i=1;
            while($row=mysqli_fetch_array($result)){?>
        <tr>
            <td><?php echo $row['cate_id'] ?></td>
            <td><?php echo $row['cate_name'] ?></td>
            <td>
            
                <a href="cate_del.php?cate_id=<?php echo $row['cate_id']?>"
                 class="btn btn-danger" onclick="return confirm('ยืนยันการลบ?')">
                    <i class="material-icons">close</i>
                </a> 
                <a href="index.php?page=cate_edit&cate_id=<?php echo $row['cate_id']?>"
                 class="btn btn-success">
                    <i class="material-icons">edit</i>
                </a> 
            </td>
        </tr>
        <?php } ?>
    </table>
</div>