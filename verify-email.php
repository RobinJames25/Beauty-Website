<?php
include "db-connect.php";

if (isset($_GET['mail'])) {
    $email = $_GET['mail'];

    $sql = "SELECT * FROM users WHERE Email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Update user status to verified
        $update_sql = "UPDATE users SET status = 'True' WHERE Email = ?";
        $update_stmt = $conn->prepare($update_sql);
        $update_stmt->bind_param("s", $email);
        $update_stmt->execute();

        echo "<h2>Email Verified Successfully! You can now <a href='sign_in.php'>log in</a>.</h2>";
    } else {
        echo "<h2>Invalid Verification Link!</h2>";
    }
} else {
    echo "<h2>No email provided!</h2>";
}
?>
