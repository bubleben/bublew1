<?php
    include '../connect.php';

    // echo ('sale_id');
    // exit;
   
    $sql="SELECT tracking.track_no,tracking.sale_id FROM tracking,sale 
    WHERE tracking.sale_id=sale.sale_id 
    AND sale.sale_id='20'";
    $result=$con->query($sql);
?>
    <div class="container">
    <a href="index.php?page=Tracking_add" class="btn btn-outline-success">+อัพเดทเลขแทร็กกิ้ง</a><br><br>
    <table class="table" style="text-align: center;">
        <tr style="background:#9c27b0;color:#fff;">
            <th>เลขพัสดุ</th>
            <th>รหัสการขาย</th>
            <th>ขนส่งที่ใช้</th>
            <th></th>
            <th></th>
        </tr>
        <?php 
            $i=1;
            while($row=mysqli_fetch_array($result)){?>
        <tr>
            <td style="width: 160px"><?php echo $row['track_no'] ?></td>
            <td style="width: 160px"><?php echo $row['sale_id'] ?></td>
            <td style="width: 260px"><?php echo $row['transport_no'] ?></td>
       
            <td>
            
                <a href="Tracking_del.php?track_no=<?php echo $row['track_no']?>"
                 class="btn btn-danger" onclick="return confirm('ยืนยันการลบ?')">
                    <i class="material-icons">close</i>
                </a> 
                <a href="index.php?page=Tracking_edit&track_no=<?php echo $row['track_no']?>"
                 class="btn btn-success">
                    <i class="material-icons">edit</i>
                </a> 
            </td>
        </tr>
        <?php } ?>
    </table>
</div>


<style>
    .ellipsis {
    white-space: nowrap;
    text-overflow: ellipsis;
    overflow: hidden;
    color: #273746;
}
    .description {
    width: 200px;
    padding: 3px;
    margin-top: 30px;
    margin-bottom: 0;
    color: #273746;
}
</style>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
    $(document)
        .on('click','.read-more',function() { 
            $(this).removeClass('read-more').addClass('show-less').html('Show Less').prev('.description').removeClass('ellipsis'); 
        })

        .on('click','.show-less',function() { 
            $(this).removeClass('show-less').addClass('read-more').html('Read More').prev('.description').addClass('ellipsis'); 
        })
    ;
</script>