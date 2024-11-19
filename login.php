<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="login-container">
        <div class="logo">
            <img src="manu-logo.png" alt="Logo">
        </div>
        <h2>WELCOME BACK</h2>
        <form method="POST" action="index.html">
            <div class="input-group">
                <input type="text" name="username" placeholder="Username" required>
            </div>
            <div class="input-group">
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <a href="#" class="forgot-password">Forgot Password</a>
            <button type="submit" class="login-btn">Login</button>
            <p>Don't Have an Account? <a href="#" class="create-account">Create Account</a></p>
        </form>
    </div>
</body>
</html>



<?php
session_start();
include 'koneksi.php';

if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);
    
    // Query untuk memeriksa kredensial
    $data_akses = mysqli_query($koneksi, "SELECT * FROM login WHERE username='$username' AND password='$password'");
    
    // Mengambil data pengguna
    if ($r = mysqli_fetch_array($data_akses)) {
        // Jika data ditemukan
        $_SESSION["login"] = true;
        $_SESSION['username'] = $r['username'];
        $_SESSION['nama'] = $r['nama'];
        $_SESSION['level'] = $r['level'];

        // Arahkan ke index.html
        header('location:index.html');
        exit();
    } else {
        // Jika kredensial salah
        echo "<script type='text/javascript'>
            alert('Kode Akses Salah');
            window.location.replace('index.php');
        </script>";
    }
}
?>

</body>
</html>