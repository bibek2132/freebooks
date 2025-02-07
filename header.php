<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<header>
    <div class="container navbar">
        <div class="brand">FreeBooks</div>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="book.php">Books</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
                
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
