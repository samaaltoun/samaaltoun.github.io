<?php
session_start();
include 'config.php';

$result = $conn->query("SELECT * FROM posts ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Sama's Blog</title>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/styles.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500&display=swap" rel="stylesheet">
</head>
<body>
  <header>
    <h1>Sama's Blog</h1>
  </header>

  <nav class="main-nav">
    <ul>
      <li><a href="index.html">Home</a></li>
      <li><a href="aboutMe.html">About Me</a></li>
      <li><a href="viewBlog.php" class="active">Blog</a></li>
      <?php if (!isset($_SESSION['email'])): ?>
        <li><a href="login.html">Login</a></li>
      <?php else: ?>
        <li><a href="logout.php">Logout</a></li>
      <?php endif; ?>
    </ul>
  </nav>

  <nav class="blog-subnav">
    <ul>
      <li><a href="addEntry.php"> Add Post</a></li>
    </ul>
  </nav>

  <main>
    <h2>Blog Posts</h2>

    <?php if ($result->num_rows > 0): ?>
      <?php while($row = $result->fetch_assoc()): ?>
        <article>
          <h3><?= htmlspecialchars($row['title']) ?></h3>
          <p><?= nl2br(htmlspecialchars($row['content'])) ?></p>
          <p><small>Posted on <?= date("F j, Y, g:i a", strtotime($row['created_at'])) ?></small></p>
          <hr>
        </article>
      <?php endwhile; ?>
    <?php else: ?>
      <p>No posts yet. Be the first to write something!</p>
    <?php endif; ?>

  </main>

  <footer class="site-footer">
    <p>© 2025 Sama's Portfolio | All rights reserved</p>
  </footer>
</body>
</html>


