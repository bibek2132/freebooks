<?php
session_start();
if (!isset($_SESSION['user_id'])) {
  header("Location: login.html"); // Redirect to login page if not logged in
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Upload Book | FreeBooks</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="admin.css" />
</head>
<body>

  <!-- ========== Header & Nav ========== -->
  <header>
    <div class="container navbar">
        <div class="brand">FreeBooks</div>
        <nav>
            <ul>
                <li><a href="index.php">User Home</a></li>
                <li id="present"><a href="admin.php">Add Books</a></li>
                <li><a href="message.php">Messages</a></li>
                
                <?php if (!isset($_SESSION['user_id'])): ?>
                    <li><a href="login.html" class="login-btn">Login</a></li>
                    <li><a href="signup.html" class="signup-btn">Create User</a></li>
                <?php else: ?>
                    <li><a href="logout.php" class="logout-btn">Logout (<?= $_SESSION['user_name']; ?>)</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
  </header>

  <!-- ========== Upload Book Form ========== -->
  <div class="container19">
      <h2>Upload a New Book</h2>

      <!-- Success/Error Messages -->
      <?php
      if (isset($_SESSION['success'])) {
          echo "<p style='color: green; text-align: center;'>" . $_SESSION['success'] . "</p>";
          unset($_SESSION['success']);
      }
      if (isset($_SESSION['error'])) {
          echo "<p style='color: red; text-align: center;'>" . $_SESSION['error'] . "</p>";
          unset($_SESSION['error']);
      }
      ?>

      <form action="process_upload.php" method="post" enctype="multipart/form-data">
          <label>Book Name:</label>
          <input type="text" name="book_name" required>

          <label>Author:</label>
          <input type="text" name="author" required>

          <label>Category:</label>
          <select name="category" required>
              <option value="Fiction">Fiction</option>
              <option value="Education">Education</option>
              <option value="Technology">Technology</option>
              <option value="Business">Business</option>
          </select>

          <label>Cover Image:</label>
          <input type="file" name="cover_image" accept="image/*" required>

          <label>PDF File:</label>
          <input type="file" name="pdf_file" accept="application/pdf" required>

          <button type="submit">Upload Book</button>
      </form>
  </div>

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
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="book.php">Books</a></li>
                <li><a href="about.php">About Us</a></li>
                <li><a href="contact.php">Contact Us</a></li>
            </ul>
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
