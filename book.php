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
$dbname = "freebooks";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch books from database
$sql = "SELECT * FROM books ORDER BY uploaded_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Book List | FreeBooks</title>
  <link rel="stylesheet" href="book.css" />
</head>
<body>

  <!-- ========== Header & Nav ========== -->
  <?php include 'header.php'; ?>

  <!-- ============ Search & Category Filters =============== -->
  <div class="filter-container">
    <input type="text" id="searchInput" placeholder="Search books..." onkeyup="filterBooks()">
    
    <select id="categoryFilter" onchange="filterBooks()">
      <option value="all">All Categories</option>
      <option value="fiction">Fiction</option>
      <option value="education">Education</option>
      <option value="technology">Technology</option>
      <option value="business">Business</option>
    </select>

    <button onclick="filterBooks()">Search</button>
  </div>

  <!-- ============ Book List =============== -->
  <div class="containerbook">
    <h1>Book List</h1>
    <div class="book-list">
    <?php
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div class='book' data-category='". strtolower($row['category']) ."'>
                <img src='" . $row['cover_image'] . "' alt='Cover Image'>
                <h2>" . htmlspecialchars($row['book_name']) . "</h2>
                <p>Author: " . htmlspecialchars($row['author']) . "</p>
                <a href='" . $row['pdf_file'] . "' target='_blank' class='download-btn'>Download PDF</a>
              </div>";
    }
} else {
    echo "<p style='text-align:center; color:red;'>No books available.</p>";
}
?>

    </div>
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

  <!-- ========== JavaScript for Filtering ========== -->
  <script>
    function filterBooks() {
      let input = document.getElementById("searchInput").value.toLowerCase();
      let category = document.getElementById("categoryFilter").value;
      let books = document.querySelectorAll(".book");

      books.forEach(book => {
        let title = book.querySelector("h2").textContent.toLowerCase();
        let author = book.querySelector("p").textContent.toLowerCase();
        let bookCategory = book.getAttribute("data-category");

        if ((title.includes(input) || author.includes(input)) &&
            (category === "all" || bookCategory === category)) {
          book.style.display = "block";
        } else {
          book.style.display = "none";
        }
      });
    }
  </script>

</body>
</html>

<?php $conn->close(); ?>
