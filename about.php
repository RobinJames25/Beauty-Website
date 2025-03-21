<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta name="description" content="E-commerce website">
    <meta name="keywords" content="e-commerce, online shopping">
    <meta name="author" content="Dominic Dorhat | Choo Wei Ken | Choong Jiachenn | Hariz Tay | Lim Kai Wey">
    <title>002 Station | About Us</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/aboutus.css">
    <link rel="stylesheet" href="./css/card.css">
    <link rel="stylesheet" href="./css/product-style.css">
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower|Karla|Roboto|Roboto+Mono" rel="stylesheet">
</head>

<body>
    <?php include 'header.php'; ?>

    <main>
        <div class="maxWidth">Home > About Us</div>
        <hr class="line-long">
        
        <div class="product-title">
            <h1>Our Team</h1>
        </div>

        <div class="product-category">
            <?php
            $team_members = [
                ["name" => "Choo Wei Ken", "role" => "Co-founder of 002 Station.", "description" => "Didn't approve of the name at first, but had no other ideas.", "img" => "ken.jpg", "link" => "https://github.com/weikenchoo"],
                ["name" => "Dominic Dorhat", "role" => "Co-founder of 002 Station.", "description" => "The guy that posts spicy memes.", "img" => "dom.jpg", "contact" => "https://github.com/dominicdorhat"],
                ["name" => "Choong Jiachenn", "role" => "Ping-pong enthusiast", "description" => "Please challenge me to a game of ping-pong. I'll promise to use my non-dominant hand.", "img" => "cj.jpg"],
                ["name" => "Lim Kai Wey", "role" => "Always busy", "description" => "When you don't see me around, I'm probably dating with girls.", "img" => "kai wey.jpg", "contact" => "013-2049887"],
                ["name" => "Hariz", "role" => "Naruto fan", "description" => "Naruto is life.", "img" => "hariz.png", "link" => "https://open.spotify.com/user/1291778837/playlist/6hd9BYHtSuf53vzylghf9G?si=cFTaFUSxT-G0ScZ7WnSodQ"]
            ];
            
            foreach ($team_members as $member) {
                echo "<div class='profile-card'>
                        <div class='profile-pic'>
                            <img src='./Images/about-us/" . $member['img'] . "' alt=''>
                        </div>
                        <div class='personal-details'>
                            <h2>" . $member['name'] . "</h2>
                            <p>" . $member['role'] . "</p>
                            <p>" . $member['description'] . "</p>";
                            
                if (isset($member['link'])) {
                    echo "<a href='" . $member['link'] . "'><p>Other projects here.</p></a>";
                }
                if (isset($member['contact'])) {
                    echo "<p>Contact: " . $member['contact'] . "</p>";
                }
                
                echo "</div>
                    </div>";
            }
            ?>
        </div>

        <div class="product-title">
            <h1>What's Important to Us</h1>
        </div>

        <!-- Quality Products Section -->
        <div class="product-title">
            <h2>Quality and Genuine Products</h2>
        </div>

        <div class="quality-container">
            <div class="quality-card">
                <img src="./Images/about-us/original.png" alt="Original Products">
                <p>We believe in only the best. Only genuine products will be displayed on our site.</p>
            </div>
            <div class="quality-card">
                <img src="./Images/about-us/warranty.png" alt="Manufacturer Warranty">
                <p>Each product purchased from our site will be given a 6-month Manufacturer Warranty.</p>
            </div>
            <div class="quality-card">
                <img src="./Images/about-us/refund.jpg" alt="Full Refund Guarantee">
                <p>Any pirated products shipped by us will be fully refunded.</p>
            </div>
        </div>

        <div class="product-title">
            <h2>Efficient Delivery</h2>
        </div>
        <div class="about-us">
            <div class="card">
                <p>We provide efficient and accurate delivery service.</p>
                <p>One-day delivery will be available soon, stay tuned!</p>
                <img src="./img/aboutus/delivery.png" alt="" style="width:auto; height:auto;">
            </div>
        </div>

        <div class="product-title">
            <h2>Excellent Customer Service</h2>
        </div>
        <div class="about-us">
            <div class="card">
                <p>Your satisfaction is our top priority.</p>
                <p>24-hour hotline is available to assist you with your needs anytime.</p>
                <img src="./img/aboutus/customerservice.jpg" alt="" style="width:auto; height:auto;">
                <img src="./img/aboutus/24_hours.png" alt="" style="width:auto; height:auto;">
            </div>
        </div>
    </main>

    <?php include 'footer.php'; ?>
</body>
</html>
