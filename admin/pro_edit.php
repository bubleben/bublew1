<?php
    include '../connect.php';
    $pro_id=$_GET['pro_id'];
    $sql="SELECT product.pro_id,product.pro_name,product.cate_id,category.cate_name,product.sale_price,product.unit_stock,product.pro_detail,product.pro_img,product.dea_id,dealer.dea_name 
    FROM product,category,dealer WHERE product.pro_id='$pro_id' and product.cate_id=category.cate_id and product.dea_id=dealer.dea_id";

    $result=$con->query($sql);
    $row=mysqli_fetch_array($result);
?>
<div class="container">
    <div class="card">
        <div class="card-header card-header-primary">
            <h3>แก้ไขข้อมูลสินค้า</h3>
        </div>
        <div class=card-body>
            <form action="pro_save.php" method="post" enctype="multipart/form-data">

                <div class="form-group">
                    <label>ลำดับ</label>
                        <input type="text" name="pro_id" class="form-control" value="<?php echo $row['pro_id']?>" readonly>
                </div>
                <div class="form-group">
                    <label>ชื่อสินค้า</label>
                        <input type="text" name="pro_name" class="form-control" value="<?php echo $row['pro_name']?>">
                </div>
                <div class="form-group">
                    <label>ประเภทสินค้า</label>
                      <?php  
                      $sql2="SELECT * FROM category"; 
                      $category=$con->query($sql2);
                     ?>
                    <select name="category" class="form-control">
                       <option value="<?php echo $row['cate_id'];?>"><?php echo $row['cate_name'];?> </option>
                       <?php while($row2=mysqli_fetch_array($category)){
                        ?>
                        <option value="<?php echo $row2['cate_id'];?>"><?php echo $row2['cate_name'];?> </option>
                       <?php } ?>
                     </select>  
                </div>
                <div class="form-group">
                    <label>ราคาขายต่อหน่วย</label>
                        <input type="text" name="sale_price" class="form-control" value="<?php echo $row['sale_price']?>">
                </div>
                <div class="form-group">
                    <label>จำนวนสินค้าในสต็อก</label>
                        <input type="text" name="unit_stock" class="form-control" value="<?php echo $row['unit_stock']?>">
                </div>
                <div class="form-group">
                    <label>รายละเอียดสินค้า</label>
                        <input type="text" name="pro_detail" class="form-control" value="<?php echo $row['pro_detail']?>">
                </div>
                <div class="form-group">
                    <label>รูปสินค้า</label></br>
                    <img src="<?php echo $row['pro_img'] ?>" rel="nofollow" style="width: 100px; height: 100px;">
                 </div>
                 <div>
                <input type="file" name="fileupload" id="fileupload" ></br></br>
                </div>
                <div class="form-group">
                    <label>ผู้จำหน่าย</label>
                      <?php  $sql3="SELECT * FROM dealer"; 
                      $dealer=$con->query($sql3);
                     ?>
                       <select name="dealer" class="form-control" value="<?php echo $row['dea_name'];?>">
                       <option value="<?php echo $row['dea_id'];?>"><?php echo $row['dea_name'];?> </option>
                       <?php while($row3=mysqli_fetch_array($dealer)){
                        ?>
                        <option value="<?php echo $row3['dea_id'];?>"><?php echo $row3['dea_name'];?> </option>
                       <?php } ?>
                     </select>  
                </div>

                <input type="submit" name="submit" class="btn btn-outline-primary" value="บันทึกข้อมูล">
            </form>
        </div>
    </div>
</div>  