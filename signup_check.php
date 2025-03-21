<?php include "./db-connect.php" ?>

<?php
session_start();
if (isset($_POST['submit'])) {

    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $fname = validate($_POST['fname']);
    $lname = validate($_POST['lname']);
    $email = validate($_POST['email']);
    $pass = validate($_POST['password']);
    $confpass = validate($_POST['confpwd']);

    if (empty($fname)) {
        header("Location: sign_up.php?error=First Name is required");
        exit();
    } else if (empty($lname)) {
        header("Location: sign_up.php?error=Last Name is required");
        exit();
    }
    if (empty($email)) {
        header("Location: sign_up.php?error=Email is required");
        exit();
    } else if (empty($pass)) {
        header("Location: sign_up.php?error=Password is required");
        exit();
    } else if (strlen($pass) <= 4) {
        header("Location: sign_up.php?error=Password is short");
        exit();
    } else if (empty($confpass)) {
        header("Location: sign_up.php?error=Confirm Your Password");
        exit();
    } else if ($pass != $confpass) {
        header("Location: sign_up.php?error=The confirmation password does not match");
        exit();
    } else {
        $securedpass = md5($pass);

        $sql = "SELECT * FROM users WHERE Email='$email'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            header("Location: sign_up.php?error=Try another email");
            exit();
        } else {
            // Sending verification link
            $sql2 = "INSERT INTO users (Email, Fname, Lname, Password, status) VALUES ('$email', '$fname', '$lname', '$securedpass', 'True')";
            $conn->query($sql2);
            header("Location: sign_up.php?success=Activation Email Sent!");
            include "send-email.php";
        }
    }
} else {
    header("Location: sign_up.php");
    exit();
}
?>
