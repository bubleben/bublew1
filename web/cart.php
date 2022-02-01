<?php
    include 'connect.php';
    include 'header.php';
	
	@$p_id = mysqli_real_escape_string($con,$_GET['p_id']); 
	@$act = mysqli_real_escape_string($con,$_GET['act']);

	//Add Product
	if($act=='add' && !empty($p_id))
	{
		if(isset($_SESSION['cart'][$p_id]))
		{
			$_SESSION['cart'][$p_id]++;
		} 
		else
		{
			$_SESSION['cart'][$p_id]=1;
		}
	}

	//Remove Product
	if($act=='remove' && !empty($p_id))  
	{
		unset($_SESSION['cart'][$p_id]);
	}

	//Update cart
	if($act=='update')
	{
		$amount_array = $_POST['amount'];
		foreach($amount_array as $p_id=>$amount)
		{
			$_SESSION['cart'][$p_id]=$amount;
		}
	}

    //Cancel cart
    if($act=='cancel')
	{
		unset($_SESSION['cart']);
	}
?>
        <section class="page-section" id="cart">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Cart</h2>
                </div>
                <a href="home.php#product" class="btn btn-primary">กลับหน้ารายการสินค้า</a>
                    <form id="frmcart" name="frmcart" method="post" action="?act=update&p_id=0">
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
                    if(!empty($_SESSION['cart']))
                    {
                        foreach($_SESSION['cart'] as $p_id=>$qty)
                        {
                            $sql = "SELECT * FROM product WHERE pro_id='$p_id'";
                            $query=$con->query($sql);
                            $row=mysqli_fetch_array($query);
                            $sum = $row['sale_price'] * $qty;
                            $total += $sum;
							echo "<tbody>";
								echo "<tr>";
									echo "<td>" . @$i +=1  . "</td>"; ?>
									<td><img class="img-fluid" src="<?php echo $row['pro_img']; ?>" style="width: 100px; height: 100px;"></td> <?php
									echo "<td>" . $row["pro_name"] . "</td>";
									echo "<td>" .number_format($row["sale_price"],2) . "</td>";
									echo "<td>";  
									echo "<input type='number' name='amount[$p_id]' value='$qty' clss='form-control' style='width: 80px;' min='1'/></td>";
									echo "<td>".number_format($sum,2)."</td>";
									//remove product
									echo "<td align='center'><a href='cart.php?p_id=$p_id&act=remove' class='btn btn-danger btn-sm'>Delete</a></td>";
								echo "</tr>";
						}
								echo "<tr>";
									echo "<td colspan='5' bgcolor='#CEE7FF' align='center'><b>ราคารวม</b></td>";
									echo "<td align='right' bgcolor='#CEE7FF'>"."<b>".number_format($total,2)."</b>"."</td>";
									echo "<td align='left' bgcolor='#CEE7FF'></td>";
								echo "</tr>";
					}
						    echo "</tbody>";

                            if($total > 0){
                            
                ?>
                            <tr>
                            <td></td>
                            <td colspan="6" align="right">
                                <input type="button" name="btncancel" class="btn btn-danger" value="Cancel" onclick="window.location='cart.php?act=cancel';" />
                                <input type="submit" name="button" id="button" class="btn btn-warning" value="Update" />
                                <input type="button" name="Submit2" class="btn btn-success" value="Purchase" onclick="window.location='confirm.php';" />
                            </td>
                            </tr>
                            <?php }else{
                                echo '<h4 align="center" class="section-heading text-uppercase">No product in cart</h4>';
                            } ?>
                        </table>
                    </form>
            </div>
        </section>

<?php include 'footer.php'; ?>