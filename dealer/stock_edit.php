<?php
    include '../connect.php';
    $stock_id=$_GET['stock_id'];
    $sql="SELECT * FROM stock WHERE stock_id='$stock_id'";
    $result=$con->query($sql);
    $row=mysqli_fetch_array($result);

?>
<div class="container">
    <div class="card">
        <div class="card-header card-header-primary">
            <h3> รายละเอียดการสต็อกเข้า</h3>
        </div>
        <div class=card-body>
            <form action="stock_save.php?stock_id=<?php echo $row['stock_id']?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>รหัสการขาย :</label>  <?php echo $row['stock_id'] ?>
                </div>
                <div class="form-group">
                    <label>ราคาสุทธิ :</label>  <?php echo $row['net_price'] ?>
                </div>
                <div class="form-group">
                    <label> วันที่สต็อกสินค้า :</label>  <?php echo $row['stock_date'] ?>
                </div>
               
               
            </form>
        </div>
    </div>
</div>  
<?php
    $sql1="SELECT * FROM stock_detail WHERE stock_id='$stock_id'";
    $result=$con->query($sql1);
?>
<div class="container">
    <table class="table">
        <tr style="background:#9c27b0;color:#fff;">
            <th>รหัสการสต็อกสินค้า</th>
            <th>รหัสสินค้า</th>
            <th>จำนวน</th>
            <th>ราคาต่อหน่วย</th>
            <th>รวมค่าสินค้า</th>
            <th></th>
        </tr>
        <?php 
            $i=1;
            while($row=mysqli_fetch_array($result)){?>
        <tr>
            <td><?php echo $row['stock_id'] ?></td>
            <td><?php echo $row['pro_id'] ?></td>
            <td><?php echo $row['amount'] ?></td>
            <td><?php echo $row['unit_price'] ?></td>
            <td><?php echo $row['total_price'] ?></td>
            <td>
            </td>
        </tr>
        <?php } ?>
    </table>
 
</div>