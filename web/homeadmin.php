<?php
    include '../connect.php';
    session_start();
    $product = "SELECT * FROM product";
    $result = $con->query($product);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>CandleCandyShop</title>
        <!-- Favicon -->
        <link rel="icon" type="image/x-icon" href="../assets/img/logo.png" />
        <!-- Font Awesome icons (free version) -->
        <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@200;400&display=swap" rel="stylesheet">
        <!-- Core theme CSS (includes Bootstrap) -->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">


        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="#page-top"><span>CandleCandyShop</span></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ms-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link" href="home.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#category">Category</a></li>
                        <li class="nav-item"><a class="nav-link" href="#product">Product</a></li>
                        <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php echo $_SESSION['username'];?></a>
                        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                            <li><a class="dropdown-item" href="../admin/index.php">Menagement</a></li>
                            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                        </ul>
                    </ul>
                </div>
            </div>
        </nav>


        <!-- Masthead -->
        <header class="masthead">
            <div class="container">
                <div class="masthead-subheading">Welcome To CandleCandyShop!</div>
                <div class="masthead-heading text-uppercase">Let see my shop</div>
                <a class="btn btn-primary btn-xl text-uppercase" href="#product">Enjoy!</a>
            </div>
        </header>


        <!-- Category -->
        <section class="page-section" id="category">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Category</h2>
                </div>
                <div class="row text-center">
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i><img src="../assets/img/cate/001-candle.png" style="height: 100px"></i>
                        </span>
                        <h4 class="my-3">Votive Candles</h4>
                    </div>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i><img src="../assets/img/cate/002-candle-1.png" style="height: 100px"></i>
                        </span>
                        <h4 class="my-3">Pillar Candles</h4>
                    </div>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i><img src="../assets/img/cate/003-candle-2.png" style="height: 100px"></i>
                        </span>
                        <h4 class="my-3">Taper Candles</h4>
                    </div>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i><img src="../assets/img/cate/005-scented-candle.png" style="height: 100px"></i>
                        </span>
                        <h4 class="my-3">Scented Or Aromatherapy Candles</h4>
                    </div>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i><img src="../assets/img/cate/004-candle-3.png" style="height: 100px"></i>
                        </span>
                        <h4 class="my-3">Decorative Candles</h4>
                    </div>
                </div>
            </div>
        </section>


        <!-- Product Grid-->
        <section class="page-section bg-light" id="product">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">All Product</h2>
                </div>
                <div class="row">
                    <?php 
                        $i=1;
                        while($row=mysqli_fetch_array($result)){?>
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <!-- Product item -->
                        <div class="portfolio-item">
                            <a class="portfolio-link" href="view.php?id=<?php echo $row['pro_id']; ?>">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="<?php echo $row['pro_img']; ?>" style="width: 500px; height: 600px;">
                            </a>
                            <div class="portfolio-caption">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder"><?php echo $row['pro_name']; ?></h5>
                                    <!-- Product price-->
                                    <span class="text-muted">฿<?php echo $row['sale_price']; ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    </div>
                </div>
            </div>
        </section>


        <!-- Contact-->
        <section class="page-section" id="contact">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5">
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="card py-4 h-100">
                            <div class="card-body text-center">
                                <i class="fas fa-map-marked-alt text-primary mb-2"></i>
                                <h4 class="text-uppercase m-0">Address</h4>
                                <hr class="my-4 mx-auto" />
                                <div class="small text-black-50">Thai-Austrian Technical College</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="card py-4 h-100">
                            <div class="card-body text-center">
                                <i class="fas fa-envelope text-primary mb-2"></i>
                                <h4 class="text-uppercase m-0">Email</h4>
                                <hr class="my-4 mx-auto" />
                                <div class="small text-black-50">63309010031@tatc.ac.th</a></div>
                                <div class="small text-black-50">63309010032@tatc.ac.th</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="card py-4 h-100">
                            <div class="card-body text-center">
                                <i class="fas fa-mobile-alt text-primary mb-2"></i>
                                <h4 class="text-uppercase m-0">Phone</h4>
                                <hr class="my-4 mx-auto" />
                                <div class="small text-black-50">+666 980077751</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- Footer-->
        <footer class="footer py-4">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 text-lg-start">Copyright &copy; จัดทำขึ้นเพื่อวิชาโครงการเท่านั้น 2021</div>
                    <div class="col-lg-4 my-3 my-lg-0">
                        <a class="btn btn-dark btn-social mx-2"><i class="fa fa-heart" aria-hidden="true"></i></a>
                    </div>
                    <div class="col-lg-4 text-lg-end">
                        <a class="link-dark text-decoration-none me-3">สุคนธ์รัตน์ ทินบุตร</a>
                        <a class="link-dark text-decoration-none me-3"></a>
                        <a class="link-dark text-decoration-none">สุพิชชา วรรณชาติ</a>
                    </div>
                </div>
            </div>
        </footer>

        
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>


    </body>
</html>
