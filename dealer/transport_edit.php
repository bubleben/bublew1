<?php
    include '../connect.php';
    $transport_no=$_GET['transport_no'];

    $sql="SELECT * FROM transport WHERE transport_no='$transport_no'";
    $result=$con->query($sql);
    $row=mysqli_fetch_array($result);
    
    $sql1="SELECT * FROM transport_detail WHERE transport_no='$row[transport_no]' ";
    $result1=$con->query($sql1);
    $row1=mysqli_fetch_array($result1);
    
?>
<div class="container">
    <div class="card">
        <div class="card-header card-header-primary">
            <h3></h3>
        </div>
        <div class=card-body>
            <form action="transport_save.php" method="post" enctype="multipart/form-data">
                
                <div class="form-group">
                    <label>ชื่อบริษัทขนส่ง</label>
                        <input type="text" name="transport_name" class="form-control" value="<?php echo $row['transport_name']?>" readonly>
                        <input type="hidden" name="transport_no" class="form-control" value="<?php echo $row['transport_no']?>">
                </div> 
                <div class="form-group">
                    <label>ค่าส่ง</label>
                    <input type="text" name="ship_cost" class="form-control" value="<?php echo $row1['ship_cost']?>">
                </div>
                
                <input type="submit" name="submit" class="btn btn-outline-primary" value="บันทึกข้อมูล">
            </form>
        </div>
    </div>
</div>  

<!-- 
SELECT transport_detail.transport_no,transport_detail.dea_id,transport_detail.ship_cost,transport.transport_no,transport.transport_name
FROM transport_detail,transport,dealer,member
WHERE transport_detail.dea_id=dealer.dea_id
AND dealer.dea_id=member.mem_id -->