<?php 
    include '../connect.php';

    $memid = $_SESSION['mem_id'];
    $querydeaid = "SELECT d.*, m.* FROM dealer as d INNER JOIN member as m ON d.mem_id = m.mem_id
    WHERE m.mem_id = $memid";
    $rsdeaid=$con->query($querydeaid);
    $rowdeaid=mysqli_fetch_array($rsdeaid);

    $deaid = $rowdeaid['dea_id'];

    $sql = "SELECT p.*, d.*  FROM product as p INNER JOIN dealer as d ON p.dea_id = d.dea_id WHERE d.dea_id = $deaid ";
    $result=$con->query($sql);
    $row=mysqli_fetch_array($result);


    // $qty=$_POST['amount'];
    // $total = 0;
    // $netprice =  $rowsaleprice['sale_price'] + $qty; 

    // $total = 0;
    // $netprice = $total * $qyt;

    // print_r($_POST['dea_id']);
    // echo $deaid;
    // exit;

    if(isset($_POST['add'])){
        $qty=$_POST['amount'];
        $total = 0;
        $netprice =  $row['sale_price'] + $qty;     

        $datestock = date("Ymd_His");


        $instock="INSERT INTO stock VALUES('$deaid','$netprice','$datestock')";
            $resultstock=$con->query($instock);
            if($resultstock){
                echo "<script>window.location.href='index.php?page=stock'</script>";
            }else{
                echo"<script>
                        alert('Error: ไม่สามารถบันทึกข้อมูลได้');
                        window.history.back()';
                        </script>";
            }
    }
    // echo $resultstock;
    // exit;
?>
<div class="container">
    <div class="card">
        <div class="card-header card-header-primary">
            <h5>สต็อกสินค้าเพิ่ม</h5>
        </div>
        <div class=card-body>
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
                
                <!-- <div class="form-group ">
                    <label >สินค้า </label>
                        <input type="text" name="pro_name" class="form-control">
                </div> -->
                <div class="form-group">
                    <label>สินค้า</label>
                      <?php  
                            $sql = "SELECT p.*, d.*  FROM product as p INNER JOIN dealer as d ON p.dea_id = d.dea_id WHERE d.dea_id = $deaid ";
                            $result=$con->query($sql);
                     ?>
                    <select name="stock" class="form-control" >
                       <?php 
                       while($row2=mysqli_fetch_array($result)){
                        ?>
                        <option value="<?php echo $row2['pro_id'];?>"><?php echo $row2['pro_name'];?> </option>
                       <?php } ?>
                     </select>  
                </div>
                <div class="form-group ">
                    <label >จำนวน </label>
                        <input type="text" name="amount" class="form-control">
                </div>
                <div class="form-group">
                    <label>ราคาต่อหน่วย</label>
                      <?php  
                            $sale_price = "SELECT p.*, d.*  FROM product as p INNER JOIN dealer as d ON p.dea_id = d.dea_id WHERE d.dea_id = $deaid ";
                            $rssale_price=$con->query($sale_price);
                            $rowsaleprice=mysqli_fetch_array($rssale_price);
                     ?>
                    <input type="text" class="form-control" name="sale_pirce" value="<?php echo $rowsaleprice['sale_price'];?>">
                </div>
                <!-- <div class="form-group ">
                    <label >รวมค่าสินค้า </label>
                        <lable type="text" name="total_price" class="form-control"  value="<?php echo $total; ?>">
                </div> -->
                <!-- <div class="form-group ">
                    <label >รูปสินค้า</label> -->
                <!-- </div>
                    <input type="file" name="fileupload" id="fileupload"></br></br> 
                <div class="form-group"> -->
                    <!-- <label>ผู้จำหน่าย</label> -->
                    <!-- <input type="hidden"name="dealer"  value=$deaid>
                </div>  -->
                     <!-- ยังไไม่ได้ทำ -->
                    <input type="submit" name="add" class="btn btn-primary" value="เสร็จสิ้น">
            </form>
            
        </div>
    </div>
</div>

<!-- <?php

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
        <?php } ?> -->
    </table>
 
</div>