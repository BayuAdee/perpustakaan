<?php
session_start();
include 'Library.php';

// Jika sudah login, redirect ke halaman yang sesuai
if (isset($_SESSION['nim'])) {
    if ($_SESSION['nim'] == "2213010496") {
        header("Location: form496.php");
    } elseif ($_SESSION['nim'] == "2213010490") {
        header("Location: form490.php");
    }
    exit;
}

// Proses login jika form dikirim
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $library = new Library();
    $library->proses_login0496($_POST['username'], $_POST['password']);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Perpustakaan</title>
</head>
<body>
    <form method="POST" action="">
        <label>Username:</label>
        <input type="text" name="username" required>
        <br>
        <label>Password:</label>
        <input type="password" name="password" required>
        <br>
        <button type="submit">Login</button>
    </form>
    <a href="group6.php" class="button">Kunjungi Group 6</a>
</body>
</html>
