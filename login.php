<?php
session_start();
include 'config.php';

$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

if (!$email || !$password) {
    header("Location: login.html?error=empty");
    exit();
}

$stmt = $conn->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
$stmt->bind_param("ss", $email, $password);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $_SESSION['email'] = $email;
    header("Location: addEntry.php");
    exit();
} else {
    header("Location: login.html?error=invalid");
    exit();
}

$stmt->close();
$conn->close();
?>
