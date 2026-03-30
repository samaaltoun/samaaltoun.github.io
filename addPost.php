<?php
session_start();
include 'config.php';

$title = $_POST['title'] ?? '';
$content = $_POST['content'] ?? '';

if (!$title || !$content) {
    echo "Please fill out both the title and content.";
    exit();
}

$date = date('F j, Y, g:i a');
$stmt = $conn->prepare("INSERT INTO posts (title, content) VALUES (?, ?)");
$stmt->bind_param("ss", $title, $content);
$stmt->execute();
$stmt->close();
$conn->close();

header("Location: viewBlog.php");
exit();
?>
