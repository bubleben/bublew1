<?php
    include '../connect.php';
    $memid=$_SESSION['mem_id']; 

    $sale_id=$_GET['sale_id'];
    $sql="SELECT * FROM sale WHERE sale_id='$sale_id'";
    $result=$con->query($sql);
    $row=mysqli_fetch_array($result);

?>
<div class="container">
    <div class="card">
        <div class="card-header card-header-primary">
            <h3> รายละเอียดการขายสินค้า </h3>
        </div>
        <div class=card-body>
            <form action="sale_save.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>รหัสการขาย :</label>  <?php echo $row['sale_id'] ?>
                    <input hidden type="text" name="sale_id" value="<?php echo $row['sale_id'];?>">
                </div>
                <div class="form-group">
                    <label>รหัสสมาชิก :</label>  <?php echo $row['mem_id'] ?>
                </div>
                <div class="form-group">
                    <label> วันที่ขาย :</label>  <?php echo $row['sale_date'] ?>
                </div>
                <div class="form-group">
                    <label> รวมค่าสินค้า :</label>  <?php echo $row['total_price'] ?>
                </div>
                <div class="form-group">
                    <label> ค่าส่ง :</label>  <?php echo $row['total_cost'] ?>
                </div>
                <div class="form-group">
                    <label> ยอดคำสั่งซื้อทั้งหมด :</label>  <?php echo $row['net_price'] ?>
                </div>
                <div class="form-group">
                    <label> เวลาที่ชำระเงิน  :</label>  <?php echo $row['payment_time'] ?>
                </div>
                <div class="form-group">
                    <label> หลักฐานการโอน :</label>  <?php echo $row['receipt_img'] ?>
                </div>
                <div class="form-group">
                    <label> เวลาที่ชำระเงิน  :</label>  <?php echo $row['payment_time'] ?>
                </div>
                <div class="form-group">
                    <label> หลักฐานการโอน :</label>  <?php echo $row['receipt_img'] ?>
                </div>
                <div class="form-group">
                    <?php   
                    $sql1="SELECT * FROM shipping_address WHERE mem_id='$row[mem_id]'
                    AND ship_no='$row[ship_no]' ";
                    $result1=$con->query($sql1);
                    $row1=mysqli_fetch_array($result1);

                    $sql2="SELECT * FROM province WHERE pv_id='$row1[pv_id]'";
                    $result2=$con->query($sql2);
                    $row2=mysqli_fetch_array($result2);

                   ?>
                  
                    <label> ที่อยู่  :</label>  <?php echo $row1['f_name']; ?>&nbsp;<?php echo $row1['l_name'];  ?>&nbsp;<?php echo $row1['phone'];  ?>&nbsp;<lable>บ้านเลขที่ </lable>&nbsp;<?php echo $row1['house_no']; ?>&nbsp;<?php echo $row1['street']; ?> <br>
                    <label>       </label>  <?php echo $row1['city']; ?>&nbsp;<?php echo $row2['pv_name'];  ?>&nbsp;<?php echo $row1['postal_code'];  ?>
                </div>
                <div class="form-group">
                    <label> เวลาส่งของ : </label>
                        <input type="datetime-local" name="ship_time" class="form-control" value="<?php echo $row['ship_time']?>">
                </div>
                <div class="form-group">
                    <label> ยอดขายทั้งหมด :</label>  <?php echo $row['net_price'] ?>
                </div>
                <div class="form-group">
                    <label> สถานะ :</label>
                    <select name="o_status" class="form-control" value="<?php echo $row['o_status']?>">
                        <option value="3">Payment Success</option>
                        <option value="4">Shipping is in progress</option>
                        <option value="5">Cancel</option>
                    </select> 
                </div>
                <input type="submit" name="submit" class="btn btn-outline-primary" value="บันทึกข้อมูล">
            </form>
        </div>
    </div>
</div>  
<?php
    include '../connect.php';
    $sql1="SELECT * FROM sale_detail WHERE sale_id='$sale_id'";
    $result=$con->query($sql1);
?>
<div class="container">
    <table class="table">
        <tr style="background:#9c27b0;color:#fff;">
            <th>รหัสสินค้า</th>
            <th>จำนวน</th>
            <th>ราคาขายต่อหนวย</th>
            <th>รวมค่าสินค้า</th>
            <th>ค่าส่ง</th>
            <th></th>
        </tr>
        <?php 
            $i=1;
            while($row=mysqli_fetch_array($result)){?>
        <tr>
            <td><?php echo $row['pro_id'] ?></td>
            <td><?php echo $row['amount'] ?></td>
            <td><?php echo $row['sale_price'] ?></td>
            <td><?php echo $row['total'] ?></td>
            <td><?php echo $row['ship_cost'] ?></td>
            <td>
            </td>
        </tr>
        <?php } ?>
    </table>
 
</div>