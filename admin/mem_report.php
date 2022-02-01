<?php
    include '../connect.php';
    $sql="SELECT * FROM member";
    $result=$con->query($sql);

    $date=date('d-m-Y');
    $countmem="SELECT SUM(`position`='dealer') as s_Total FROM member";
    $query = $con->query($countmem);
    $resultcountmem = mysqli_num_rows($query);

    $count="SELECT * FROM member"; 
    $query1 = $con->query($count);
    $fetch = mysqli_fetch_array($query1);
    $resultcount = mysqli_num_rows($query1);

    while($resultcountmem=mysqli_fetch_array($query)){
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
    <h3 style="text-align: center;" > รายงานข้อมูลสมาชิก </h3>
        <div class="col-xs-8" style="text-align: right;">
            <p style="text-align:right;">พิมพ์วันที่&nbsp;&nbsp;:&nbsp;&nbsp;<?php echo $date;?>  </p>
            </div>
    <p>
    มีสมาชิกที่มีบัญชีผู้ใช้ในระบบ จำนวน  &nbsp;&nbsp;<?php echo $resultcount ?> &nbsp;&nbsp;คน
    และในจำนวนนี้ เป็นผู้จำหน่ายจำนวน &nbsp;&nbsp; <?php echo  $resultcountmem['s_Total'] ?> &nbsp;&nbsp;  แอคเคาท์ </p>
    <?php } ?>
    <table class="table"  style="width: 100%;  text-align: center;" >
        <tr>
            <th  style="width: 5%">รหัสสมาชิก</th>
            <th  style="width: 10%">ชื่อผู้ใช้</th>
            <th  style="width: 20%">อีเมล</th>
            <th  style="width: 10%">ชื่อจริง</th>
            <th  style="width: 10%">นามสกุล</th>
            <th  style="width: 10%">เพศ</th>
            <th  style="width: 10%">วันเกิด</th>
            <th  style="width: 10%">เบอร์ติดต่อ</th>
            <th  style="width: 10%">วันที่เป็นสมาชิก</th>
            <th  style="width: 5%">ตำแหน่ง</th>
          
        </tr>  
        <?php 
            $i=1;
            while($row=mysqli_fetch_array($result)){?>
      
        <tr>
            <td ><?php echo $row['mem_id'] ?></td>
            <td ><?php echo $row['mem_name'] ?></td>
            <td ><?php echo $row['mem_mail'] ?></td>
            <td ><?php echo $row['f_name'] ?></td>
            <td ><?php echo $row['l_name'] ?></td>
            <td ><?php echo $row['gender'] ?></td>
            <td ><?php echo $row['birthday'] ?></td>
            <td ><?php echo $row['phone'] ?></td>
            <td ><?php echo $row['enable'] ?></td>
            <td ><?php echo $row['position'] ?></td>
     
          
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
  