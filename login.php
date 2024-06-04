<?php
session_start();
include 'Library.php';
$error_message = "";

// Jika sudah login, redirect ke halaman yang sesuai
if (isset($_SESSION['nim'])) {
    if ($_SESSION['nim'] == "2213010496") {
        header("Location: form496.php");
    } elseif ($_SESSION['nim'] == "2213010490") {
        header("Location: form490.php");
    }
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $library = new Library();
    if ($_POST['username'] == '2213010496') {
        $error_message = $library->proses_login0496($_POST['username'], $_POST['password']);
    } elseif ($_POST['username'] == '2213010490') {
        $error_message = $library->proses_login0490($_POST['username'], $_POST['password']);
    } else {
        $error_message = "Username dan password tidak tepat.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="assets/css/login.css" rel="stylesheet">
    <link rel="stylesheet" href="../uts/assets/css/login.css">
    <title>Login Perpustakaan</title>
</head>

<body>
    <!-- <form method="POST" action="">
        <label>Username:</label>
        <input type="text" name="username" required>
        <br>
        <label>Password:</label>
        <input type="password" name="password" required>
        <br>
        <button type="submit">Login</button>
    </form>
    <a href="group6.php" class="button">Kunjungi Group 6</a> -->
    <div class="kotak">
        <div class="text-center mt-4 name">
            Sign In
        </div>
        <form class="p-3 mt-3" method="POST" action="">
            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="text" name="username" id="username" placeholder="Username">
            </div>
            <div class="form-field d-flex align-items-center">
                <span class="fas fa-key"></span>
                <input type="password" name="password" id="password" placeholder="Password">
            </div>
            <button type="submit" class="btn mt-3" name="submit">Login</button>
        </form>
        <?php if (!empty($error_message)) : ?>
            <p style="color:red;"><?= $error_message ?></p>
        <?php endif; ?>
        <div class="text-center fs-6">
            <a href="group6.php">Kembali ke Beranda</a>
        </div>
    </div>
</body>

</html>
<style>
    body {
        width: 100%;
        height: 100vh;
        background-image: url('assets/img/book.jpeg');
        background-size: cover;
        position: relative;
    }
</style>