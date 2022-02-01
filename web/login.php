<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login</title>
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
    <title> Login </title>
</head>
<body>
        <!-- Category -->
        <section class="page-section" id="category">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Login</h2>
            </div>
            <div class="container" style="margin: auto, auto;">
                <form class="container" action="login_db.php" method="post" style="margin: 0px 380px;">
                    <div class="form-floating mb-3 col-4 text-align: center" style="margin: -30px 30px">
                        <input type="text" class="form-control" id="floatingInput" placeholder="Username" name="mem_name">
                        <label for="floatingInput">Username</label>
                    </div>
                    <div class="form-floating col-4  text-align: center" style="margin: 0px 30px;">
                        <input type="password" class="form-control" id="floatingPassword" placeholder="Password"  name="mem_pass">
                        <label for="floatingPassword">Password</label>
                    </div>
                    <div class="form-floating col-4 text-align: left" style="margin: 10px 30px">
                        <p class="col-md-6" style="margin: -20px 0px; color : red;"><a href="forgotpassword.php">lost your password?</a>
                        <p class="col-md-6" style="margin: -65px 215px; color : red;"> Not member yet? <a href="register.php">Sign Up</a></p>
                    </div>
                    <div class="col-md-4 text-align: center" style="margin: 80px 210px">
                        <button type="submit" name="login" class="btn btn-primary">Sign in</button>
                    </div>
                </form>
            </div>
        </section>
</body>
</html>