<?php
session_start();
include "./db-connect.php";

if (isset($_POST['submit'])) {
    function validate($data) {
        return htmlspecialchars(stripslashes(trim($data)));
    }

    $email = validate($_POST['email']);
    $pass = validate($_POST['password']);

    if (empty($email)) {
        header("Location: sign_in.php?error=Email is required");
        exit();
    } elseif (empty($pass)) {
        header("Location: sign_in.php?error=Password is required");
        exit();
    }

    // Enable debugging
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    // Fetch user from database
    $sql_user = "SELECT * FROM users WHERE LOWER(Email) = LOWER(?)";
    $stmt = $conn->prepare($sql_user);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result_user = $stmt->get_result();

    if ($result_user->num_rows > 0) {
        $row = $result_user->fetch_assoc();

        // Debugging: Check stored password
        echo "Stored Password: " . $row['Password'] . "<br>";

        // Compare MD5 hashed password
        if (md5($pass) === $row['Password']) {
            if ($row['status'] == "True") {
                $_SESSION['Email'] = $row['Email'];
                $_SESSION['Fname'] = $row['Fname'];
                $_SESSION['Lname'] = $row['Lname'];
                header("Location: index.php");
                exit();
            } else {
                header("Location: sign_in.php?error=Account not activated");
                exit();
            }
        } else {
            header("Location: sign_in.php?error=Incorrect email or password");
            exit();
        }
    }

    // Check for admin login
    $sql_admin = "SELECT * FROM admins WHERE LOWER(Email) = LOWER(?)";
    $stmt = $conn->prepare($sql_admin);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result_admin = $stmt->get_result();

    if ($result_admin->num_rows > 0) {
        $row = $result_admin->fetch_assoc();

        // Compare MD5 hashed password
        if (md5($pass) === $row['Password']) {
            $_SESSION['admin_email'] = $row['Email'];
            $_SESSION['admin_fname'] = $row['Fname'];
            $_SESSION['admin_lname'] = $row['Lname'];
            header("Location: index.php");
            exit();
        } else {
            header("Location: sign_in.php?error=Incorrect email or password");
            exit();
        }
    }

    // If no user or admin was found
    header("Location: sign_in.php?error=Invalid Login");
    exit();
}
?>
