<?php
    // session_start();
    include 'connect.php';
   
    $custo=$_SESSION['username'];
    $member="SELECT * FROM member WHERE mem_name='$custo'";
    $query=$con->query($member);
    $cust=mysqli_fetch_array($query);
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
<body>
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
                            <li><a class="dropdown-item" href="profile.php">My Profile</a></li>
                            <li><a class="dropdown-item" href="cart.php">Cart</a></li>
                            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                        </ul>
                        <li>
                            <button class="btn btn-outline-dark" type="submit">
                                <i class="bi-cart-fill me-1"></i>
                                Cart
                                <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>


        <!-- Profile -->
        <section class="page-section" id="profile">
        <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Edit your profile</h2>
                </div>
                <div class="d-flex justify-content-center">
                  <form class="row g-4" style="margin-left: 20px;" action="profile_save.php " method="post">
                  <h3>My Profile</h3>
                  <div class="col-md-5">
                      <label for="cust_name" class="form-label">User name</label>
                      <input type="text" class="form-control" name="mem_name" value="<?php echo $cust['mem_name'] ?>" readonly>
                    </div>
                  
                    <div class="col-md-5">
                      <label for="cust_mail" class="form-label">e-mail</label>
                      <input type="text" class="form-control" name="mem_mail" value="<?php echo $cust['mem_mail'] ?>">
                    </div>
                    <div class="col-md-5">
                      <label for="f_name" class="form-label">First Name</label>
                      <input type="text" class="form-control" name="f_name" value="<?php echo $cust['f_name'] ?>">
                    </div>
                    <div class="col-md-5">
                      <label for="l_name" class="form-label">Last Name</label>
                      <input type="text" class="form-control" name="l_name" value="<?php echo $cust['l_name'] ?>">
                    </div>
                    <div class="col-md-2">
                      <label for="inputEmail4" class="form-label">Gender</label>
                      <select name="gender" class="form-select">
                        <option selected><?php echo $cust['gender'] ?></option>
                        <option>Male</option>
                        <option>Female</option>
                        <option>LGBTQP+</option>
                      </select>
                    </div>
                    <div class="col-md-4">
                      <label for="Birthday" class="form-label">Birthday</label>
                      <input type="date" class="form-control" name="birthday" value="<?php echo $cust['birthday'] ?>">
                    </div>
                    <div class="col-md-3">
                      <label for="inputEmail4" class="form-label">Phone</label>
                      <input type="text" class="form-control" name="phone" value="<?php echo $cust['phone'] ?>">
                    </div>
                    <div class="col-md-3">
                      <label for="inputEmail4" class="form-label">enable</label>
                      <input type="text" class="form-control" name="enable" value="<?php echo $cust['enable'] ?>" readonly>
                    </div>
                   <!--ยังเปลี่ยนหน้าไม่ได้-->
                    <div class="col-md-6">
                    <button type="submit" name="edit" class="btn btn-primary">บันทึก</button> 
                   
                    </div>
                    </br></br></br>
                    <hr>
                  </form> 
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
                        <a class="link-dark text-decoration-none me-3">&</a>
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