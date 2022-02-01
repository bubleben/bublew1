<?php 
  include '../connect.php';
  if(isset($_POST['add'])){
      $track_no=$_POST['track_no'];
      $sale_id=$_POST['sale_id'];
      $transport_no=$_POST['transport_no'];
          $sql="INSERT INTO tracking VALUES('$track_no','$sale_id','$transport_no')";
          $result=$con->query($sql);
          if($result){
              echo "<script>window.location.href='index.php?page=Tracking'</script>";
          }else{
              echo"<script>
                      alert('Error: ไม่สามารถบันทึกข้อมูลได้');
                      window.history.back()';
                      </script>";
          }
  }
?>
<div class="container">
    <div class="card">
        <div class="card-header card-header-primary">
            <h5>อัพเดทเลขแทร็กกิ้ง</h5>
        </div>
        <div class=card-body>
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
                
                <div class="form-group ">
                    <label >เลขพัสดุ</label>
                        <input type="text" name="track_no" class="form-control">
                </div>
                <div class="form-group ">
                    <label >รหัสการขาย</label>
                        <input type="text" name="sale_id" class="form-control">
                </div>
                <div class="form-group">
                    <label>ขนส่งที่ใช้</label>
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
                    <input type="submit" name="add" class="btn btn-primary" value="บันทึกข้อมูล">
            </form>
        </div>
    </div>
</div>