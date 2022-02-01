<?php
    include "connect.php";
    include "header.php";

    $sale_id = mysqli_real_escape_string($con,$_GET['sale_id']);
     

    $querycartdetail = "SELECT d.*, p.pro_img, p.pro_name, p.sale_price , s.*, a.*, v.* FROM sale_detail as d INNER JOIN product as p ON d.pro_id = p.pro_id 
    INNER JOIN sale as s ON d.sale_id = s.sale_id INNER JOIN shipping_address as a ON s.ship_no = a.ship_no INNER JOIN province as v ON a.pv_id = v.pv_id
    WHERE s.sale_id = $sale_id";
    $rscartdetail=$con->query($querycartdetail);
    $rowdetail=mysqli_fetch_array($rscartdetail);
?>


        <section class="page-section" id="confirm">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Payment</h2>
                </div>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th width="5%">#</th>
                            <th width="10%">Img</th>
                            <th width="40%">Product</th>
                            <th width="10%">Amount</th>
                            <th width="10%">Total</th>
                            <th width="15%">Total</th>
                            <th></th>
                        </tr>
                    </thead>
            <?php
                $total=0;
                foreach($rscartdetail as $row){

                    $total += $row["total"] + $row["ship_cost"];

                    echo "<tbody>";
                        echo "<tr>";
                            echo "<td>" . @$i +=1  . "</td>"; ?>
                            <td><img class="img-fluid" src="<?php echo $row['pro_img']; ?>" style="width: 100px; height: 100px;"></td> <?php
                            echo "<td>" . $row["pro_name"] . "</td>";
                            echo "<td align='left'>" .number_format($row["amount"]) . "</td>";
                            echo "<td align='left'>" .number_format($row["net_price"],2) . "</td>"; ?>
                            <td>
                                <?php $st = $rowdetail['o_status']; //1 = รอชำระเงิน 2 = ตรวจสอบ 3 = กำลังจัดส่งสินค้า 4 = ยกเลิกสินค้า
                                        if($st==1){
                                            echo '<font color = "red">';
                                            echo 'Waiting for payment';
                                        }elseif ($st==2){
                                            echo '<font color = "green">';
                                            echo 'Pedding';
                                        }elseif ($st==3){
                                            echo '<font color = "green">';
                                            echo 'Shipping is in progress';
                                        }else{
                                            echo '<font color = "red">';
                                            echo 'Cancel';
                                        } ?>
                            </td>
                            <td>
                            <?php 
                                $sale_id = $row['sale_id'];
                                    $st = $rowdetail['o_status'];
                                        if($st==1){
                                            echo "<a href='payment.php?sale_id=$sale_id' class='btn btn-danger btn-sm'>Payment</a>";
                                        }elseif ($st==2){
                                            echo "<a href='payment.php?sale_id=$sale_id' class='btn btn-info btn-sm'>See Detail</a>";
                                        }elseif ($st==3){
                                            echo "<a href='payment.php?sale_id=$sale_id' class='btn btn-info btn-sm'>See Detail</a>";
                                        }elseif ($st==4){
                                            echo "<a href='payment.php?sale_id=$sale_id' class='btn btn-danger btn-sm'>Cancel</a>";
                                        }else{
                                            echo "<a href='payment.php?sale_id=$sale_id' class='btn btn-success btn-sm'>Shipping success</a>";
                                        } ?>
                            </td>
                        </tr>
                            <?php } ?>
                        </tbody>
                </table></br></br>
                <table class="table">
                    <thead>
                        <tr>
                            <th colspan='6'>Shipping Address</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="padding-left: 5%">
                                <b><?php echo $rowdetail['f_name']; ?>&nbsp;<?php echo $rowdetail['l_name']; ?><?php echo $rowdetail['phone']; ?></b>
                                <?php echo $rowdetail['house_no']; ?>&nbsp;<?php echo $rowdetail['street']; ?>&nbsp;<?php echo $rowdetail['city']; ?>
                                <?php echo $rowdetail['postal_code']; ?>&nbsp;<?php echo $rowdetail['pv_name']; ?>
                            </td>
                        </tr>
                    </tbody>
                </table></br></br>
                <h4>Bank account to payment</h4>
                <table class="table">
                    <thead>
                        <tr>
                            <th width="20%" style="padding-left: 10%">Img</th>
                            <th width="20%">Type</th>
                            <th width="20%">Bank</th>
                            <th width="20%">Name</th>
                            <th width="20%">Number</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="padding-left: 10%">
                                <img src="../assets/img/KBANK.png" style="width: 64px; height: 64px;">
                            </td>
                            <td>
                                <p>ออมทรัพย์</p>
                            </td>
                            <td>
                                <p>กสิกร/KBANK</p>
                            </td>
                            <td>
                                <p>CandleCandyShop</p>
                            </td>
                            <td>
                                <p>999-9-99999-9</p>
                            </td>
                        </tr>
                    </tbody>
                </table></br>
                <form class="row" id="frmpayment" name="frmpayment" method="post" action="payment_db.php" enctype="multipart/form-data">
                    <div class="col-md-4">
                        <label for="exampleInputEmail1" class="form-label">Payment date</label>
                        <input type="date" class="form-control" name="payment_date" required>
                    </div>
                    <div class="col-md-4">
                        <label for="exampleInputEmail1" class="form-label">Payment time</label>
                        <input type="time" class="form-control" name="payment_time" required>
                    </div>
                    <div class="col-md-4">
                        <label for="exampleInputPassword1" class="form-label">Receipt</label>
                        <input type="file" class="form-control" name="receipt_img" required>
                    </div></br></br></br></br>
                    <div>
                        <input type="hidden" name="sale_id" value="<?php echo $sale_id; ?>"> 
                        <button class="btn btn-success" type="submit">Purchase</button>
                    </div>
                </form>
            </div>
        </section>


<?php include "footer.php"; ?>