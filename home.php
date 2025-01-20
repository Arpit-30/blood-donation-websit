<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | Blood Donation</title>
    <link rel="stylesheet" href="home.css"> <!-- Link to your CSS file -->
    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="footer.css">
</head>
<body>
    <!-- Header Section -->
    <?php 
    include("header.php")
    ?>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <h2>Donate Blood, Save Lives</h2>
            <p>Your blood can give someone another chance at life. Donate today and make a difference in someone's life.</p>
            <a href="need_blood.php" class="btn">I Need Blood</a>
            <a href="donate_blood.php" class="btn">Become a Donor</a>
        </div>
    </section>

    <!-- How It Works Section -->
    <section class="how-it-works-section">
        <div class="container">
            <h2>How Blood Donation Works</h2>
            <div class="steps">
                <div class="step-item">
                    <h3>Step 1: Register</h3>
                    <p>Sign up as a donor or request blood for someone in need by registering on our platform.</p>
                </div>
                <div class="step-item">
                    <h3>Step 2: Get Matched</h3>
                    <p>We match eligible blood donors with those in need of blood based on location and blood type.</p>
                </div>
                <div class="step-item">
                    <h3>Step 3: Donate</h3>
                    <p>Once matched, donate blood at the nearest blood bank or hospital, and save a life.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Donate Section -->
    <section class="why-donate-section">
        <div class="container">
            <h2>Why Donate Blood?</h2>
            <p>Blood donation is a simple act of kindness that can make a profound difference in someone's life. Every year, millions of lives are saved thanks to generous blood donors.</p>
            <ul>
                <li>Blood is essential for surgeries, accidents, and cancer treatment.</li>
                <li>One donation can save up to three lives.</li>
                <li>It helps maintain a healthy heart by reducing iron levels in the body.</li>
            </ul>
            <a href="whydonate.php" class="btn">Learn More</a>
        </div>
    </section>

    <!-- Blood Facts Section -->
    <section class="blood-facts-section">
        <div class="container">
            <h2>Did You Know?</h2>
            <div class="facts">
                <div class="fact-item">
                    <h3>Fact 1</h3>
                    <p>Someone needs blood every 2 seconds in the world.</p>
                </div>
                <div class="fact-item">
                    <h3>Fact 2</h3>
                    <p>One donation can save up to 3 lives.</p>
                </div>
                <div class="fact-item">
                    <h3>Fact 3</h3>
                    <p>Your body replaces the donated blood within 24 hours.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer Section -->
    <?php 
    include("footer.php")
    ?>
</body>
</html>
