<?php 
    include '../connect.php';

    if(isset($_POST['submit'])){
         $transport_no=$_POST['transport_no'];
         $ship_cost=$_POST['ship_cost'];
         $deaid=$_SESSION['dea_id']; 
         
            $sql="INSERT INTO transport_detail VALUES('$transport_no','$deaid','$ship_cost')";
            $result=$con->query($sql);
            if($result){
                echo "<script>window.location.href='index.php?page=transport'</script>";
            }else{
                echo"<script>
                        alert('Error: กรุณาอัพเดทอัตราค่าส่งแทน');
                        window.history.back()';
                        </script>";
            }
    }
?>
<div class="container">
    <div class="card">
        <div class="card-header card-header-primary">
            <h5>เพิ่มข้อมูลบริษัทขนส่ง</h5>
        </div>
        <div class=card-body>
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
               <div class="form-group">
                    <label>บริษัทขนส่ง</label>
                      <?php  
                        $sql2="SELECT * FROM transport"; 
                        $transport=$con->query($sql2);
                     ?>
                    <select name="transport_no" class="form-control" >
                       <?php 
                       while($row2=mysqli_fetch_array($transport)){
                        ?>
                        <option value="<?php echo $row2['transport_no'];?>"><?php echo $row2['transport_name'];?> </option>
                       <?php } ?>
                     </select>  
                </div>
                <div class="form-group ">
                    <label >อัตราค่าส่ง</label>
                        <input type="text" name="ship_cost" class="form-control">
                </div>
                <input type="submit" name="submit" class="btn btn-primary" value="บันทึกข้อมูล">
            </form>
        </div>
    </div>
</div>