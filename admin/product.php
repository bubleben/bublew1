<?php
    include '../connect.php';
    $sql="SELECT product.pro_id,product.pro_name,product.cate_id,category.cate_name,product.sale_price,product.unit_stock,product.pro_detail,product.pro_img,product.dea_id,dealer.dea_name 
    FROM product,category,dealer WHERE product.cate_id=category.cate_id and product.dea_id=dealer.dea_id  ORDER BY `product`.`pro_id` ASC";
    $result=$con->query($sql);
?>
        <div class="container">
    <a href="index.php?page=pro_add" class="btn btn-outline-success">+เพิ่มสินค้า</a><br><br>
    <table class="table" style="text-align: center;">
        <tr style="background:#9c27b0;color:#fff;">
            <th>รหัสสินค้า</th>
            <th>ชื่อสินค้า</th>
            <th>ประเภทสินค้า</th>
            <th>ราคาขาย</th>
            <th>จำนวนในสต็อก</th>
            <th>รายละเอียดสินค้า</th>
            <th>รูปสินค้า</th>
            <th>ผู้ผลิต</th>
            <th></th>
        </tr>
        <?php 
            $i=1;
            while($row=mysqli_fetch_array($result)){?>
        <tr>
            <td style="width: 80px"><?php echo $row['pro_id'] ?></td>
            <td style="width: 160px"><?php echo $row['pro_name'] ?></td>
            <td style="width: 80px"><?php echo $row['cate_name'] ?></td>
            <td style="width: 100px"><?php echo $row['sale_price'] ?></td>
            <td style="width: 80px"><?php echo $row['unit_stock'] ?></td>
            <td style="width: 180px">
            <p class="description ellipsis"><?php echo $row['pro_detail'] ?></p>
            <a href="" class="read-more">Read More</a>
            </td>
            <td style="width: 120px"><img src="<?php echo $row['pro_img'] ?>" rel="nofollow" style="width: 100px; height: 100px;"></td>
            <td style="width: 80px"><?php echo $row['dea_name'] ?></td>
            <td>
                <a href="pro_del.php?pro_id=<?php echo $row['pro_id']?>"
                 class="btn btn-danger" onclick="return confirm('ยืนยันการลบ?')">
                    <i class="material-icons">close</i>
                </a> 
                <a href="index.php?page=pro_edit&pro_id=<?php echo $row['pro_id']?>"
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