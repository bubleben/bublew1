<?php
    include '../connect.php';
    $sql="SELECT product.pro_id,product.pro_name,product.cate_id,category.cate_name,product.sale_price,product.unit_stock,product.pro_detail,product.pro_img,product.dea_id,dealer.dea_name 
    FROM product,category,dealer WHERE product.cate_id=category.cate_id and product.dea_id=dealer.dea_id ORDER BY `product`.`pro_id` ASC";
    $result=$con->query($sql);

    $date=date('d-m-Y');
    $countpro="SELECT unit_stock,SUM(unit_stock) as s_Total FROM product";
    $query = $con->query($countpro);
    $resultcountpro = mysqli_num_rows($query);

    $count="SELECT * FROM product"; 
    $query1 = $con->query($count);
    $fetch = mysqli_fetch_array($query1);
    $resultcount = mysqli_num_rows($query1);

    while($resultcountpro=mysqli_fetch_array($query)){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@200&display=swap" rel="stylesheet">
</head>
<body>
<div id="main" class="container col-xs"  onclick="window.print()">
    <h3 style="text-align: center;" > ร้านขายสินค้าออนไลน์ประเภทเทียนหอม </h3>
    <h3 style="text-align: center;" > รายงานข้อมูลสินค้าคงคลัง </h3>
        <div class="col-xs-8" style="text-align: right;">
            <p style="text-align:right;">พิมพ์วันที่&nbsp;&nbsp;:&nbsp;&nbsp;<?php echo $date;?>  </p>
            </div>
    <p>
    มีรายการสินค้าทั้งหมด &nbsp;&nbsp;<?php echo $resultcount ?> &nbsp;&nbsp;รายการ 
    มีสินค้าในสต็อกทั้งหมด &nbsp;&nbsp; <?php echo  $resultcountpro['s_Total'] ?> &nbsp;&nbsp;  ชิ้น </p>
    <?php } ?>
    <table class="table"  style="width: 100%;  text-align: center;" >
        <tr>
            <th  style="width: 5%">รหัสสินค้า</th>
            <th  style="width: 30%">ชื่อสินค้า</th>
            <th  style="width: 20%">ประเภทสินค้า</th>
            <th  style="width: 5%">ราคาขาย</th>
            <th  style="width: 7%">จำนวนในสต็อก</th>
            <th  style="width: 10%">รูปสินค้า</th>
            <th  style="width: 10%">ผู้ผลิต</th>
          
        </tr>  
        <?php 
            $i=1;
            while($row=mysqli_fetch_array($result)){?>
      
        <tr>
            <td ><?php echo $row['pro_id'] ?></td>
            <td ><?php echo $row['pro_name'] ?></td>
            <td ><?php echo $row['cate_name'] ?></td>
            <td ><?php echo $row['sale_price'] ?></td>
            <td ><?php echo $row['unit_stock'] ?></td>
     
            <td ><img src="<?php echo $row['pro_img'] ?>" rel="nofollow" style="width: 80px; height: 80px;"></td>
            <td ><?php echo $row['dea_name'] ?></td>

        </tr>
        <?php } ?>
     
    </table>
   <hr>
</div>
<div><br>
    <label style="text-align: left;">พิมพ์โดย :_____________________________________  </label>  
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


body{
    font-family:'Sarabun', sans-serif;
    font-size: 100%;
    align-content: center;
}
th{
            border-top:2px solid black;
            border-bottom: 2px solid black;
        }
        tr{
            line-height: 24px;
        }
        table {
        /* border-top: collapse; */
        border-bottom: collapse;
        border-collapse: collapse;  
        
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
</body>
</html>
  