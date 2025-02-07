<?php
session_start();

// Database connection
$servername = "localhost";
$username = "root"; // Change if needed
$password = ""; // Change if needed
$dbname = "freebooks";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle book upload
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $book_name = $conn->real_escape_string($_POST['book_name']);
    $author = $conn->real_escape_string($_POST['author']);
    $category = $conn->real_escape_string($_POST['category']);

    // File upload directories
    $cover_image_dir = "uploads/covers/";
    $pdf_file_dir = "uploads/pdfs/";

    // Create directories if not exist
    if (!is_dir($cover_image_dir)) mkdir($cover_image_dir, 0777, true);
    if (!is_dir($pdf_file_dir)) mkdir($pdf_file_dir, 0777, true);

    // Handle Cover Image Upload
    $cover_image_name = basename($_FILES["cover_image"]["name"]);
    $cover_image_target = $cover_image_dir . time() . "_" . $cover_image_name;
    move_uploaded_file($_FILES["cover_image"]["tmp_name"], $cover_image_target);

    // Handle PDF File Upload
    $pdf_file_name = basename($_FILES["pdf_file"]["name"]);
    $pdf_file_target = $pdf_file_dir . time() . "_" . $pdf_file_name;
    move_uploaded_file($_FILES["pdf_file"]["tmp_name"], $pdf_file_target);

    // Insert into database
    $sql = "INSERT INTO books (book_name, author, category, cover_image, pdf_file)
            VALUES ('$book_name', '$author', '$category', '$cover_image_target', '$pdf_file_target')";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['success'] = "Book uploaded successfully!";
    } else {
        $_SESSION['error'] = "Error: " . $conn->error;
    }

    header("Location: admin.php");
    exit();
}

$conn->close();
?>
