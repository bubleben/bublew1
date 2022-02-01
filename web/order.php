<?php
    include "connect.php";
    include "header.php";

    @$sale_id = mysqli_real_escape_string($con,$_GET['sale_id']);
     
    $querycartdetail = "SELECT d.*, p.pro_img, p.pro_name, p.sale_price , p.*, s.*, a.*, v.*
    FROM sale_detail as d 
    INNER JOIN product as p ON d.pro_id = p.pro_id 
    INNER JOIN sale as s ON d.sale_id = s.sale_id 
    INNER JOIN shipping_address as a ON s.ship_no = a.ship_no 
    INNER JOIN province as v ON a.pv_id = v.pv_id
    WHERE s.mem_id = $memid";
    $rscartdetail=$con->query($querycartdetail);
    $row=mysqli_fetch_array($rscartdetail);

    // $sql = "SELECT s.*, t.*  FROM sale as s INNER JOIN tracking as t ON s.sale_id = t.sale_id
    // WHERE s.sale_id = t.trank_no";
    // $query = $con->query($sql);
    // $row1=mysqli_fetch_array($query);
?>


        <section class="page-section" id="confirm">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">My Order</h2>
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
                                <?php $st = $row['o_status']; //1 = Waiting for payment 2 = Pedding 3 = Wait dealer to sent 4 = Shipping is in progress 5 = Cancel
                                       if($st==1){
                                        echo '<font color = "red">';
                                        echo 'Waiting for payment';
                                    }elseif ($st==2){
                                        echo '<font color = "orange">';
                                        echo 'Pedding';
                                    }elseif ($st==3){
                                        echo '<font color = "blue">';
                                        echo 'Wait dealer to sent';
                                    }elseif ($st==4){
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

                                $sql = "SELECT * FROM tracking 
                                WHERE sale_id = $sale_id";
                                $query = $con->query($sql);
                                $row1=mysqli_fetch_array($query);


                                    $st = $row['o_status'];
                                        if($st==1){
                                            echo "<a href='payment.php?sale_id=$sale_id' class='btn btn-danger btn-sm'>Payment</a>";
                                        }elseif ($st==4){
                                            echo $row1['track_no'];
                                        }else{
                                        } 
                            ?>
                            </td>
                        </tr>
                            <?php } ?>
                        </tbody>
                </table>
            </div>
        </section>


<?php include "footer.php"; ?>