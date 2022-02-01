<?php
    include 'connect.php';
    $pro_id=$_GET['pro_id'];

    $sql2="SELECT product.pro_id,product.pro_name,product.cate_id,category.cate_name,product.sale_price,product.unit_stock,product.pro_detail,product.pro_img,product.dea_id,dealer.dea_name,dealer.brand_name
    FROM product,category,dealer WHERE product.pro_id=$pro_id and product.cate_id=category.cate_id and product.dea_id=dealer.dea_id";
    $result2=$con->query($sql2);
    $row2=mysqli_fetch_array($result2);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--styles -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="css/magnific-popup.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/animate.css" />
    <link rel="stylesheet" href="css/etlinefont.css">
    <link href="css/styleweb.css" type="text/css"  rel="stylesheet"/>
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/logo.png" />
    <title>CandleCandyShop</title>
</head>
<body>
<div class="site">
    <a class="skip-link screen-reader-text" href="#content">Skip to content</a>

    <header class="masthead">
       
    </header>

    <main id="content" class="main-content">
    <div class="col">
         <div class="card">
            <img src="<?php echo $row2['pro_img']; ?>" class="card-img-top">
                
        </div>
    </div>
    </main>

    <aside class="sidebar">
        <h3><?php echo $row2['pro_name'] ?></h3>
        <p>PRICE ฿<?php echo $row2['sale_price'] ?> </p>
        <p><?php echo $row2['pro_detail'] ?></p>
        <aside class="twin">
        <a href="cart.php?act=add&p_id=<?php echo $row2['pro_id']; ?>" class="btn btn-outline-dark">Add to cart</a>
        </aside>
        <p> cate  : <?php echo $row2['cate_name'] ?></p>
        <p> brand : <?php echo $row2['brand_name'] ?></p>
        <p> stock : <?php echo $row2['unit_stock'] ?></p>
        
      
    </aside>

    <aside class="twin">
        Interested?
    </aside>
    <aside class="twin">
        Let add to cart!
    </aside>
</div>
</body>
</html>