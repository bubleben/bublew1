<?php
    include '../connect.php';
    $sql="SELECT  transport_detail.transport_no,transport.transport_name,transport_detail.dea_id,dealer.dea_id,dealer.dea_name,transport_detail.ship_cost,dealer.brand_name 
    FROM transport_detail,transport,dealer 
    WHERE transport_detail.dea_id=dealer.dea_id 
    AND transport_detail.transport_no=transport.transport_no  ORDER BY `transport_detail`.`transport_no` ASC ";
    $result=$con->query($sql);

    $date=date('d-m-Y');
    $countpro="SELECT unit_stock,SUM(unit_stock) as s_Total FROM product ";
    $query = $con->query($countpro);
    $resultcountpro = mysqli_num_rows($query);

    $count="SELECT transport_no FROM transport_detail GROUP BY transport_no"; 
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
    <h3 style="text-align: center;" > รายงานข้อมูลค่าบริการขนส่ง-แจกแจงบริษัทขนส่ง </h3>
        <div class="col-xs-8" style="text-align: right;">
            <p style="text-align:right;">พิมพ์วันที่&nbsp;&nbsp;:&nbsp;&nbsp;<?php echo $date;?>  </p>
            </div>
    <p>
    มีจำนวนบริษัทขนส่งที่ใช้บริการทั้งหมด &nbsp;&nbsp;<?php echo $resultcount ?> &nbsp;&nbsp; บริษัท
   </p>
    <?php } ?>
    <table class="table"  style="width: 100%;  text-align: center;" >
        <tr>
            <th  style="width: 10%">รหัสผู้จำหน่าย</th>
            <th  style="width: 30%">ชื่อผู้จำหน่าย</th>
            <th  style="width: 10%">รหัสบริษัทขนส่ง</th>
            <th  style="width: 20%">ชื่อบริษัทขนส่ง</th>
            <th  style="width: 10%">ชื่อแบรนด์</th>
            <th  style="width: 20%">อัตราค่าบริการ</th>
        </tr>  
        <?php 
            $i=1;
            while($row=mysqli_fetch_array($result)){?>
      
        <tr>
            <td ><?php echo $row['dea_id'] ?></td>
            <td ><?php echo $row['dea_name'] ?></td>
            <td ><?php echo $row['transport_no'] ?></td>
            <td ><?php echo $row['transport_name'] ?></td>
            <td ><?php echo $row['brand_name'] ?></td>
            <td ><?php echo $row['ship_cost'] ?></td>
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
  