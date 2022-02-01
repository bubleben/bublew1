<?php
    include '../connect.php';
    $sql="SELECT * FROM province";
    $result=$con->query($sql);
?>
<div class="container">
    <table class="table">
        <tr style="background:#9c27b0;color:#fff;">
            <th>ลำดับ</th>
            <th>ชื่อจังหวัด</th>
            <th></th>
        </tr>
        <?php 
            $i=1;
            while($row=mysqli_fetch_array($result)){?>
        <tr>
            <td><?php echo $row['pv_id'] ?></td>
            <td><?php echo $row['pv_name'] ?></td>
        </tr>
        <?php } ?>
    </table>
</div>