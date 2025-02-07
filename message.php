<?php
session_start();
if (!isset($_SESSION['user_id'])) {
  header("Location: login.html"); // Redirect to login page if not logged in
  exit();
}

// Database connection
$servername = "localhost";
$username = "root"; // Change if needed
$password = ""; // Change if needed
$dbname = "freebooks"; // Ensure this matches your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch messages from database
$sql = "SELECT * FROM messages ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>User Messages | FreeBooks</title>
  <link rel="stylesheet" href="admin.css" />
  <style>
      body { font-family: Arial, sans-serif; }
      h2 { text-align: center; color: #333; margin-bottom: 20px; margin-top: 40px;}
      table { width: 100%; border-collapse: collapse; margin-top: 20px; margin-bottom:100px; }
      th, td { padding: 10px; border: 1px solid #ddd; text-align: left; }
      th { background: #1f3c88; color: white; }
      tr:nth-child(even) { background: #f2f2f2; }
      .message-content { max-width: 300px; word-wrap: break-word; }
  </style>
</head>
<body>

  <!-- ========== Header & Nav ========== -->
  <header>
    <div class="container navbar">
        <div class="brand">FreeBooks</div>
        <nav>
            <ul>
                <li><a href="index.php">User Home</a></li>
                <li><a href="admin.php">Add Books</a></li>
                <li id="present"><a href="message.php">Messages</a></li>
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

  <!-- ========== Display Messages in Table ========== -->
  <h2>User Messages</h2>
  
  <table>
      <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>Subject</th>
          <th>Message</th>
          <th>Date</th>
      </tr>
      <?php
      if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
              echo "<tr>
                      <td>" . $row['id'] . "</td>
                      <td>" . htmlspecialchars($row['name']) . "</td>
                      <td>" . htmlspecialchars($row['email']) . "</td>
                      <td>" . htmlspecialchars($row['subject']) . "</td>
                      <td class='message-content'>" . htmlspecialchars($row['message']) . "</td>
                      <td>" . $row['created_at'] . "</td>
                    </tr>";
          }
      } else {
          echo "<tr><td colspan='6' style='text-align: center; color: red;'>No messages found.</td></tr>";
      }
      ?>
  </table>

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

<?php $conn->close(); ?>
