<?php
    include "connect.php";
    include "header.php";
?>
        <section class="page-section" id="confirm">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Confirm</h2>
                </div>
            <form id="frmcart" name="frmcart" method="post" action="saveorder.php">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th width="5%">#</th>
                            <th width="10%">Img</th>
                            <th width="50%">Product</th>
                            <th width="10%">Price</th>
                            <th width="10%">Amount</th>
                            <th width="5%">Total</th>
                            <th width="5%">Delete</th>
                        </tr>
                    </thead>
            <?php
                $total=0;
                foreach($_SESSION['cart'] as $p_id=>$qty)
                {
                    $sql = "SELECT * FROM product WHERE pro_id='$p_id'";
                    $query=$con->query($sql);
                    $row=mysqli_fetch_array($query);

                    $ship_cost="45";

                    $province=$_SESSION['mem_id'];
                    $prov="SELECT shipping_address.ship_no,shipping_address.f_name,shipping_address.l_name,shipping_address.phone,shipping_address.house_no,shipping_address.street,shipping_address.city,shipping_address.postal_code,shipping_address.pv_id,province.pv_id,province.pv_name
                    FROM shipping_address,province,member WHERE shipping_address.pv_id=province.pv_id AND shipping_address.mem_id=member.mem_id AND member.mem_id='$province'";
                    $query=$con->query($prov);

                    // $province=$_SESSION['mem_id'];
                    // $prov="SELECT shipping_address.f_name,shipping_address.l_name,shipping_address.phone,shipping_address.house_no,shipping_address.street,shipping_address.city,shipping_address.postal_code,shipping_address.pv_id,province.pv_id,province.pv_name
                    // FROM shipping_address,province,member WHERE shipping_address.pv_id=province.pv_id AND shipping_address.mem_id=member.mem_id AND member.mem_id='$province'";
                    // $query=$con->query($prov);

                    $sum = $row['sale_price'] * $qty;
                    $total += $sum;
                    $netprice = $total + $ship_cost;  

                    echo "<tbody>";
                        echo "<tr>";
                            echo "<td>" . @$i +=1  . "</td>"; ?>
                            <td><img class="img-fluid" src="<?php echo $row['pro_img']; ?>" style="width: 100px; height: 100px;"></td> <?php
                            echo "<td>" . $row["pro_name"] . "</td>";
                            echo "<td>" .number_format($row["sale_price"],2) . "</td>";
                            echo "<td>";
                            echo "<input type='number' name='amount[$p_id]' value='$qty' clss='form-control' style='width: 80px;' min='1' readonly/></td>";
                            echo "<td>".number_format($sum,2)."</td>";
                            //remove product
                            echo "<td align='center'><a href='cart.php?p_id=$p_id&act=remove' class='btn btn-danger btn-sm'>Delete</a></td>";
                        echo "</tr>";
                }
                        echo "<tr>";
                            echo "<td colspan='6' align='center'><b>ค่าส่ง</b></td>";
                            echo "<td align='center'>" . $ship_cost . "</td>";;
                        echo "</tr>";
                        echo "<tr>";
                            echo "<td colspan='6' align='center'><b>ราคารวม</b></td>";
                            echo "<td align='center'"."<b>".number_format($netprice,2)."</b>"."</td>";
                        echo "</tr>";
                    echo "</tbody>";
                
            ?>
                </table>
                <table class="table">
                    <thead>
                        <tr>
                            <th colspan='6'>ที่อยู่ในการจัดส่ง</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                        $i=1;
                        while($row=mysqli_fetch_array($query)){?>
                        <tr>
                            <td class="form-check" style="padding-left: 5%">
                                <input class="form-check-input" type="radio" name="shiping" value="<?php echo $row['ship_no']; ?>" required>

                                <b><?php echo $row['f_name']; ?>&nbsp;<?php echo $row['l_name']; ?>
                                <?php echo $row['phone']; ?></b> &nbsp;<?php echo $row['house_no']; ?>&nbsp;<?php echo $row['street']; ?>&nbsp;<?php echo $row['city']; ?>
                                <?php echo $row['postal_code']; ?>&nbsp;<?php echo $row['pv_name']; ?>
                            </td>
                        </tr>
                        <?php } ?>
                        <tr>
	                        <td colspan="2" align="right">
                                <input type="hidden" name="total_price" value="<?php echo $total; ?>">
                                <input type="hidden" name="total_cost" value="<?php echo $ship_cost; ?>">
                                <input type="hidden" name="net_price" value="<?php echo $netprice; ?>">
	                            <input type="submit" name="Submit2" class="btn btn-success" value="Purchase" />
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
            </div>
        </section>


<?php include "footer.php"; ?>