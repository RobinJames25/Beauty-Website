<?php
session_start();
include "db-connect.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    function validate($data) {
        return htmlspecialchars(stripslashes(trim($data)));
    }

    $fname = validate($_POST['fname']);
    $lname = validate($_POST['lname']);
    $email = validate($_POST['email']);
    $pass = validate($_POST['password']);
    $confpass = validate($_POST['confpwd']);

    if (empty($fname) || empty($lname) || empty($email) || empty($pass) || empty($confpass)) {
        $_SESSION['error'] = "All fields are required!";
        header("Location: sign_up.php");
        exit();
    } elseif ($pass !== $confpass) {
        $_SESSION['error'] = "Passwords do not match!";
        header("Location: sign_up.php");
        exit();
    }

    // Secure password hashing
    $securedpass = password_hash($pass, PASSWORD_DEFAULT);

    // Check if email already exists (using prepared statements)
    $stmt = $conn->prepare("SELECT * FROM users WHERE Email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['error'] = "Email already exists. Try another!";
        header("Location: sign_up.php");
        exit();
    } else {
        // Insert new user
        $stmt2 = $conn->prepare("INSERT INTO users (Email, Fname, Lname, Password, status) VALUES (?, ?, ?, ?, 'False')");
        $stmt2->bind_param("ssss", $email, $fname, $lname, $securedpass);
        
        if ($stmt2->execute()) {
            // Call Python script to send email
            $output = shell_exec("python3 send_email.py '$email' '$fname' 2>&1");

            if (strpos($output, "Success") !== false) {
                $_SESSION['success'] = "Activation Email Sent!";
            } else {
                $_SESSION['error'] = "Email sending failed: " . $output;
            }

            header("Location: sign_up.php");
            exit();
        } else {
            $_SESSION['error'] = "Something went wrong!";
            header("Location: sign_up.php");
            exit();
        }
    }
} else {
    $_SESSION['error'] = "Invalid request!";
    header("Location: sign_up.php");
    exit();
}
?>
