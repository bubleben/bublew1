<?php
    include '../connect.php';
    $memid = $_SESSION['mem_id'];
    $querydeaid = "SELECT d.*, m.* FROM dealer as d INNER JOIN member as m ON d.mem_id = m.mem_id
    WHERE m.mem_id = $memid";
    $rsdeaid=$con->query($querydeaid);
    $rowdeaid=mysqli_fetch_array($rsdeaid);

    $deaid = $rowdeaid['dea_id'];

    $sql="SELECT transport_detail.transport_no,transport_detail.dea_id,transport_detail.ship_cost,transport.transport_no,transport.transport_name,dealer.mem_id,member.mem_id   FROM transport_detail,transport,dealer,member 
    WHERE transport_detail.transport_no=transport.transport_no 
    AND transport_detail.dea_id=dealer.dea_id
    AND dealer.mem_id=member.mem_id
    AND member.mem_id='$memid'";
    $result=$con->query($sql);
    
?>
<div class="container">
    <a href="index.php?page=transport_add" class="btn btn-outline-success">+เพิ่มบริษัทขนส่ง</a><br><br>
    <table class="table">
        <tr style="background:#9c27b0;color:#fff;">
       
            <th>ชื่อบริษัทขนส่ง</th>
            <th>อัตราค่า</th>

            <th></th>
            <th></th>
        </tr>
        <?php 
            $i=1;
            while($row=mysqli_fetch_array($result)){?>
            <td><?php echo $row['transport_name'] ?></td>
            <td><?php echo $row['ship_cost'] ?></td>
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