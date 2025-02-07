<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>FreeBooks</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="index.css" />
</head>
<body>

  <!-- ========== Header & Nav ========== -->
  <?php include 'header.php'; ?>

  <!-- ========== Hero Section ========== -->
  <section class="container hero">
    <div class="hero-content">
      <h1>Discover Free Books for Everyone</h1>
      <p>Access thousands of free digital books. Read, learn, and grow with our extensive collection.</p>
      <a href="book.php" class="btn">Browse Books</a>
    </div>
    <div class="hero-image">
    <img src="./Image/homeimage1.png" alt="Floating Books">

    </div>
  </section>

  <!-- ========== Popular Categories Section ========== -->
  <section class="categories">
    <div class="container">
      <h2>Popular Categories</h2>
      <div class="category-cards">
        <!-- Category Card 1 -->
        <div class="card">
          <div class="card-icon">📖</div>
          <h3>Fiction</h3>
          <p>Explore imaginative storytelling.</p>
        </div>
        <!-- Category Card 2 -->
        <div class="card">
          <div class="card-icon">🎓</div>
          <h3>Education</h3>
          <p>Learn new skills and knowledge.</p>
        </div>
        <!-- Category Card 3 -->
        <div class="card">
          <div class="card-icon">💻</div>
          <h3>Technology</h3>
          <p>Stay ahead with tech trends.</p>
        </div>
        <!-- Category Card 4 -->
        <div class="card">
          <div class="card-icon">💼</div>
          <h3>Business</h3>
          <p>Grow your professional expertise.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- ========== Footer ========== -->
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
        <div class="social-icons"> <a href="https://www.facebook.com" target="_blank">
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
