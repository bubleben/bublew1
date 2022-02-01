<!DOCTYPE html>
<html lang="en">
<head>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Register</title>
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
<section class="page-section" id="category">
        <div class="container">
            <div class="row">
                <div class="title-box text-center">
                    <h2 class="section-heading text-uppercase">Register</h2>
                </div>
            <form class="container" action="register_db.php" method="post" style="margin:0px 400px;">
                <?php if (isset($_SESSION['error'])) : ?>
                    <div class="error">
                        <h3>
                            <?php 
                                echo $_SESSION['error'];
                                unset($_SESSION['error']);
                            ?>
                        </h3>
                    </div>
                <?php endif ?>

                <div class="form-floating mb-3 col-4 text-align: center" style="margin: -10px 30px">
                    <input type="text" class="form-control" id="floatingInput" placeholder="Username"  name="mem_name">
                    <label for="floatingInput">Username</label>
                </div>
                <div class="form-floating mb-3 col-4 text-align: center" style="margin: 0px 30px">
                    <input type="email" class="form-control" id="floatingInput" placeholder="Email" name="mem_mail">
                    <label for="floatingInput">Email</label>
                </div>
                <div class="form-floating mb-3 col-4  text-align: center" style="margin: 0px 30px">
                    <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password_1">
                    <label for="floatingPassword">Password</label>
                </div>
                <div class="form-floating col-4  text-align: center" style="margin: 0px 30px">
                    <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password_2">
                    <label for="floatingPassword">Confirm Password</label>
                </div>
                <div class="form-floating col-4 text-align: left" style="margin: 10px 57px">
                    <p class="col-md-6" style="margin: -23px 235px; color : red;"> Be a member <a href="login.php">Sign in</a></p>
                </div>
                <div class="col-md-4 text-align: center" style="margin: 30px 210px">
                    <button type="submit" name="submit" class="btn btn-primary">Sign Up</button>
                </div>
                
            </form>
    </section>
</body>
</html>