<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>About Us</title>
  <!-- Optional: Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link 
    href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" 
    rel="stylesheet"
  >
  <link rel="stylesheet" href="about.css" />
</head>
<body>

  <!-- ========== Header & Nav ========== -->
  <?php include 'header.php'; ?>


<!-- ============About Us ===============   -->

<div class="containerabout">
    <div class="text">
        <h1>About Us</h1>
        <p>Welcome to our Digital Bookstore, where knowledge is free for everyone. Our mission is to make books accessible to all, ensuring that literature, learning, and creativity are within reach of every reader.</p>
        <p>We believe that books should be available without barriers. Whether you are looking for classic literature, educational materials, or modern fiction, our collection is always expanding to meet the needs of our community.</p>
        <p>Thank you for being a part of our journey in spreading knowledge and fostering a love for reading.</p>
    </div>
    <div class="image">
        <img src="./Image/profile.jpg" alt="Digital Bookstore">
    </div>
</div>



  <!-- ========== Footer (Optional) ========== -->
  <footer>
    <div class="footer-container">
        <div class="footer-section">
            <h3>FreeBooks</h3>
            <p>Your source for free digital books.</p>
        </div>
        <div class="footer-section">
            <h3>Quick Links</h3>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="book.php">Books</a></li>
                <li><a href="about.php">About Us</a></li>
                <li><a href="contact.php">Contact Us</a></li>
            </ul>
        </div>
        <div class="footer-section">
        <h3>Categories</h3>
        <ul>
          <li><a href="book.php">Fiction</a></li>
          <li><a href="book.php">Education</a></li>
          <li><a href="book.php">Technology</a></li>
          <li><a href="book.php">Business</a></li>
        </ul>
      </div>
      <div class="footer-section">
        <h3>Follow Us</h3>
        <div class="social-icons">
        <a href="https://www.facebook.com" target="_blank">
            <img src="./Image/facebook.png" alt="facebook">
        </a>

          <a href="https://www.x.com" target="_blank">
            <img src="./Image/twitter.png" alt="X">
        </a>
          <a href="https://www.instagram.com" target="_blank">
            <img src="./Image/instragram.png" alt="Instagram">
        </a>
        </div>
      </div>
    </div>
    <div class="footer-bottom">
        <p>&copy; 2025 FreeBooks. All rights reserved.</p>
    </div>
</footer>

</body>
</html>
