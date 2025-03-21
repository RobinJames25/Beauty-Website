<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="./css/signinstyle.css">
</head>
<body>
    <div class="signin-container">
        <div class="items">
            <div class="col1 form-section">
                <h2>Log In</h2>
                <p class="para1">See your growth and get consulting support!</p>
                
                <a href="#" class="signin_google">Sign In With Google</a>
                
                <p class="para1">OR Sign in with Your Email</p>
                
                <form action="signin_check.php" method="POST">
                    <?php if (isset($_GET['success'])) { ?>
                        <p class="success"><?php echo $_GET['success']; ?></p>
                    <?php } ?>
                    <?php if (isset($_GET['error'])) { ?>
                        <p class="error"><?php echo $_GET['error']; ?></p>
                    <?php } ?>

                    <label for="email">Email*</label>
                    <input type="text" name="email" class="form-control">

                    <label for="password">Password*</label>
                    <input type="password" name="password" id="password" class="form-control">
                    
                    <div class="remember">
                        <label><input type="checkbox" name="remember"> Remember me</label>
                        <a href="#" class="forgotpwd">Forgot your Password?</a>
                    </div>

                    <input type="submit" name="submit" value="Log In" id="login">
                </form>

                <p>OR</p>

                <a href="./sign_up.php" class="signup_btn">Sign Up For Free</a>
            </div>

            <div class="col1 image-section">
                <img src="Images/download (1).png" class="image">
                <img src="Images/download.png" class="image">
                <img src="Images/download2.png" class="image">
                <p class="para3">Get Your Products and Make Your Fashion</p>
            </div>
        </div>
    </div>
</body>
</html>
