<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp</title>
    <link rel="stylesheet" type="text/css" href="./css/signupstyle.css">
</head>
<body>
<main>  
<div class="signup-container">
    <div class="row" style="background-color: white;">
        <div class="signup-items">
            <div class="signup">
                <h1 style="text-align: center;">SignUp</h1>
                <h2>Welcome to Beauty Garden</h2>
            </div>
            <div class="para1">See your growth and get consulting support!</div>
            <hr>
            <div class="form">
                <form name="signup" action="signup_process.php" method="POST">

                    <?php if (isset($_SESSION['success'])) { ?>
                        <h1 class="success"><?php echo $_SESSION['success']; ?></h1>
                        <?php unset($_SESSION['success']); ?>
                    <?php } ?>

                    <?php if (isset($_SESSION['error'])) { ?>
                        <p class="error"><?php echo $_SESSION['error']; ?></p>
                        <?php unset($_SESSION['error']); ?>
                    <?php } ?>

                    <div class="form-rows">
                        <div class="form-group1">
                            <label for="fname" class="inputnames">First Name* </label>
                            <input type="text" name="fname" id="fname" class="form-control" required>
                        </div>
                        <div class="form-group2">
                            <label for="lname" class="inputnames">Last Name* </label>
                            <input type="text" name="lname" id="lname" class="form-control" required>
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="email" class="inputnames">Email*</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="password" class="inputnames">Password*</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="confpwd" class="inputnames">Confirm Password* </label>
                        <input type="password" name="confpwd" id="confpwd" class="form-control" required>
                    </div>
                    <br>
                    <span>
                        <input type="submit" id="signup" name="submit" value="Create Account">
                    </span>
                    <span>
                        <a href="index.php" class="homebtn">Back To Home</a>
                    </span>
                </form>
                <div class="signin">Already have an account? <a href="sign_in.php" style="color: blue;">Sign In</a></div>
            </div>
        </div>
    </div>
</div>
</main>
</body>
</html>
