<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add Blog Entry</title>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/styles.css">
  <script defer src="js/script.js"></script>
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
      <li><a href="viewBlog.php">Blog</a></li>
      <li><a href="logout.php">Logout</a></li>
    </ul>
  </nav>


  <main>
    <h2>Create New Post</h2>
    <form id="postForm" action="addPost.php" method="POST">
        <label for="title"><strong>Title:</strong></label>
        <input type="text" id="title" name="title" required>

        <label for="content"><strong>Content:</strong></label>
        <textarea id="content" name="content" required></textarea>

        <div class="form-buttons">
            <button type="submit">Post</button>
            <button type="reset" id="clearBtn">Clear</button>
        </div>
    </form>

  </main>

  <footer class="site-footer">
    <p>© 2025 Sama's Portfolio | All rights reserved</p>
  </footer>
</body>
</html>
