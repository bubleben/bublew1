<?php 
    $a=0;
    include '../connect.php';
    if(isset($_POST['adddetail'])){
        $sale_id=$_POST['sale_id'];
        $cust_id=$_POST['cust_id'];
        $sale_date=$_POST['sale_date'];
        $net_price=$_POST['net_price'];
        $net_discount=$_POST['net_discount'];
        $pro_id=$_POST['pro_id'];
        $amount=$_POST['amount'];
        $sale_price=$_POST['sale_price'];
            $sql="INSERT INTO sale VALUES('$sale_id','$cust_id','$sale_date','$net_price','$net_discount')";
            $result=$con->query($sql);
        

            $sql1="INSERT INTO sale_detail VALUES('$sale_id','$pro_id','$amount','$sale_price','discount')";
            $result1=$con->query($sql1);
    }
    if(isset($_POST['search'])){
        $pro_id=$_POST['pro_id'];
        $sql2="SELECT * FROM product WHERE pro_id='$pro_id'";
        $result2=$con->query($sql2);
        $row = mysqli_fetch_assoc($result2);
        $a++;
    }
?>

<div class="container">
    <div class="card">
        <div class="card-header card-header-primary">
            <h5>สร้างใบเสร็จขายสินค้า</h5>
        </div>
        <div class=card-body>
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
                <div class="form-group ">
                    <label >รหัสการขาย</label>
                    <input type="text" name="sale_id" class="form-control">      
                </div>
                <div class="form-group ">
                    <label name="sale_date" > วันที่/เวลา</label>
                    <input type="datetime-local" class="form-control" name="sale_date"
                    <?
 
                        $date = date("Y-m-d");
                        $time = date("H:i:s");

                        echo $date." / ".$time;

                        ?>>
                </div>
                <div class="form-group ">
                    <label >รหัสลูกค้า</label>
                        <input type="text" name="cust_id" class="form-control">
                </div>
                <div class="form-group ">
                    <label >รหัสสินค้า</label>
                    <input type="text" name="pro_id" class="form-control" 
                        <?php  if($a==0){ ?> 
                            value=""
                            <?php }else{?>
                                value="<?php echo $row['pro_id']?>"
                                <?php } ?>
                                >   
                    <input type="submit" name="search" class="btn btn-info" value="ค้นหา">

                </div> 
                <div class="form-group ">
                    <label >ชื่อสินค้า</label>
                    <input type="text" name="pro_name" class="form-control" 
                        <?php  if($a==0){ ?> 
                            value=""
                            <?php }else{?>
                                value="<?php echo $row['pro_name']?>"
                                <?php } ?>
                                >                
                </div>
                <div class="form-group ">
                    <label >ราคา</label>
                        <input type="text" name="sale_price" class="form-control" 
                        <?php  if($a==0){ ?> 
                            value=""
                            <?php }else{?>
                                value="<?php echo $row['sale_price']?>"
                                <?php } ?>
                                >
                </div>
                <div class="form-group ">
                    <label >จำนวน</label>
                        <input type="text" name="amount" class="form-control">
                </div>
                <div class="form-group ">
                    <label >ยอดขาย</label>
                        <input type="text" name="net_price" class="form-control" > 
                    
                </div>
                <div class="form-group ">
                    <label >ส่วนลด</label>
                        <input type="text" name="net_discount" class="form-control">
                </div>
                
                <input type="submit" name="adddetail" class="btn btn-primary" value="add">
            </form>
        </div>
    </div>
</div>
<?php
    
    $sql1="SELECT pro_id,amount,sale_price,discount FROM sale_detail WHERE sale_id='$sale_id'";
    $result1=$con->query($sql1);
    
?>

<div class="container">
    <table class="table">
        <tr style="background:#9c27b0;color:#fff;">
            <th>รหัสสินค้า</th>
            <th>จำนวน</th>
            <th>ราคา</th>
            <th>ส่วนลด</th>
            <th></th>
        </tr>
        <?php 
            $i=1;
            while($row=mysqli_fetch_array($result1)){?>
        <tr>
            <td><?php echo $row['pro_id'] ?></td>
            <td><?php echo $row['amount'] ?></td>
            <td><?php echo $row['sale_price'] ?></td>
            <td><?php echo $row['discount'] ?></td>
            <td>
            
                <a href="sale_del.php?pro_id=<?php echo $row['pro_id']?>"
                 class="btn btn-danger" onclick="return confirm('ยืนยันการลบ?')">
                    <i class="material-icons">close</i>
                </a> 
            </td>
        </tr>
        <?php } ?>
    </table>
    <input type="submit" name="add" class="btn btn-primary" value="save">
</div>