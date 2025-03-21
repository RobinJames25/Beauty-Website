<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
    <link rel="stylesheet" href="./css/contact.css">
</head>
<body>
    <div class="container">
        <h1>Get in Touch</h1>
        <p>Fill up the form to get in touch with us.</p>

        <!-- Display success or error messages -->
        <?php if (isset($_SESSION['message'])): ?>
            <p class="<?= $_SESSION['message_type']; ?>"><?= $_SESSION['message']; ?></p>
            <?php unset($_SESSION['message'], $_SESSION['message_type']); ?>
        <?php endif; ?>

        <div class="contact-box">
            <div class="container-left">
                <h3>Fill the Form*</h3>
                <form id="contactForm" action="process_form.php" method="POST">
                    <div class="input-row">
                        <div class="input-group">
                            <label>Name*</label>
                            <input type="text" name="name" placeholder="Enter your Name" required>
                        </div>
                        <div class="input-group">
                            <label>Phone*</label>
                            <input type="text" name="phone" placeholder="+91 1234567890" required>
                        </div>
                    </div>
                    
                    <div class="input-row">
                        <div class="input-group">
                            <label>Email*</label>
                            <input type="email" name="email" placeholder="youremail@gmail.com" required>
                        </div>
                        <div class="input-group">
                            <label>Subject</label>
                            <input type="text" name="subject" placeholder="Inquiry">
                        </div>                       
                    </div>

                    <label>Message*</label>
                    <textarea rows="10" name="message" placeholder="Enter your Message" required></textarea>
                    <button type="submit" name="submit">SEND MESSAGE</button>
                </form>
            </div>
            <div class="container-right">
                <h3>Reach Us</h3>
                <table>
                    <tr><td>Email:</td><td>contact@rj45kilimani@gmail.com</td></tr>
                    <tr><td>Phone:</td><td>+254 045656183</td></tr>
                    <tr><td>Address:</td><td>Ugunja, C-4, Mbita, Kisumu - 115000, Kenya</td></tr>
                </table>
                <div class="map">
                    <iframe src="https://www.google.com/maps/embed?..."></iframe>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
