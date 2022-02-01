<?php 
    include '../connect.php';
    $deaid=$_SESSION['mem_id'];
    if(isset($_POST['add'])){
        $pro_name=$_POST['pro_name'];
        $cate_id=$_POST['category'];
        $sale_price=$_POST['sale_price'];
        $pro_detail=$_POST['pro_detail'];
        
        //ฟังก์ชั่นวันที่
        date_default_timezone_set('Asia/Bangkok');
	    $date = date("Ymd");	
        
        //ฟังก์ชั่นสุ่มตัวเลข
        $numrand = (mt_rand());

        //เอาชื่อไฟล์เก่าออกให้เหลือแต่นามสกุล
        $type = strrchr($_FILES['fileupload']['name'],".");
            
        //ตั้งชื่อไฟล์ใหม่โดยเอาเวลาไว้หน้าชื่อไฟล์เดิม
        $newname = $date.$numrand.$type;
        $path_copy=@$path.$newname;
        // $path_link="../assets/img/img_upload/".$newname;
        $dir = "../assets/img/img_upload/product/";

        move_uploaded_file ($_FILES["fileupload"]["tmp_name"], $dir.$path_copy);
            $sql="INSERT INTO product VALUES('','$pro_name','$cate_id','$sale_price','$pro_detail','$dir$newname','$deaid')";
            $result=$con->query($sql);
            if($result){
                echo "<script>window.location.href='index.php?page=product'</script>";
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
            <h5>เพิ่มข้อมูลสินค้า</h5>
        </div>
        <div class=card-body>
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
                
                <div class="form-group ">
                    <label >ชื่อสินค้า</label>
                        <input type="text" name="pro_name" class="form-control">
                </div>
                <div class="form-group">
                    <label>ประเภทสินค้า</label>
                      <?php  
                        $sql2="SELECT * FROM category"; 
                        $category=$con->query($sql2);
                     ?>
                    <select name="category" class="form-control" >
                       <?php 
                       while($row2=mysqli_fetch_array($category)){
                        ?>
                        <option value="<?php echo $row2['cate_id'];?>"><?php echo $row2['cate_name'];?> </option>
                       <?php } ?>
                     </select>  
                </div>
                <div class="form-group ">
                    <label >ราคาขายต่อหน่วย</label>
                        <input type="text" name="sale_price" class="form-control">
                </div>
                <div class="form-group ">
                    <label >รายละเอียดสินค้า</label>
                        <input type="text" name="pro_detail" class="form-control">
                </div>
                <div class="form-group ">
                    <label >รูปสินค้า</label>
                </div>
                    <input type="file" name="fileupload" id="fileupload"></br></br> 
                <div class="form-group">
                    <!-- <label>ผู้จำหน่าย</label> -->
                    <input type="hidden"name="dealer"  value=$deaid>
                </div>
                    <input type="submit" name="add" class="btn btn-primary" value="บันทึกข้อมูล">
            </form>
        </div>
    </div>
</div>