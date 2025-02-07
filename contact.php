<?php
session_start();


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Contact Us</title>
  <!-- Optional: Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link 
    href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" 
    rel="stylesheet"
  >
  <link rel="stylesheet" href="contact.css" />
</head>
<body>





  <!-- ========== Header & Nav ========== -->
  <?php include 'header.php'; ?>


    <!-- ========== Contact Page Content ========== -->
    <div class="containers">
      <h2>Contact Us</h2>
      <p>Have questions? Get in touch with us.</p>

      <div class="contact-wrapper">
          <!-- Contact Form -->
          <form action="process_contact.php" method="POST" class="contact-form">
              <!-- Display success or error messages -->
  <div class="message-container">
    <?php
    if (isset($_SESSION['success'])) {
        echo "<p style='color: green; text-align: center;'>" . $_SESSION['success'] . "</p>";
        unset($_SESSION['success']); // Remove message after displaying
    }
    if (isset($_SESSION['error'])) {
        echo "<p style='color: red; text-align: center;'>" . $_SESSION['error'] . "</p>";
        unset($_SESSION['error']); // Remove message after displaying
    }
    ?>
  </div>
    <input type="text" name="name" placeholder="Your Name" required>
    <input type="email" name="email" placeholder="Your Email" required>
    <input type="text" name="subject" placeholder="Subject" required>
    <textarea name="message" rows="5" placeholder="Your Message" required></textarea>
    <button type="submit">Send Message</button>
    
</form>


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
