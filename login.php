<?php
include 'koneksi.php';
session_start(); // Mulai sesi

// Cek apakah pengguna sudah login, jika ya, redirect ke halaman lain
if (isset($_SESSION['user_id'])) {
    header("Location: index.php"); // Ganti dengan halaman setelah login
    exit();
}
// Cek apakah form login telah di-submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil nilai dari form login
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // Cek koneksi
    if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
    }

    // Query untuk memeriksa login
    $query = "SELECT * FROM tb_user WHERE username = '$username' AND
    password_hash = md5('$password')";
    $result = $koneksi->query($query);
    if ($result->num_rows == 1) {
        // Login sukses
        $row = $result->fetch_assoc();
        $_SESSION['user_id'] = $row['user_id']; 
        $_SESSION['username'] = $row['username'];
        header("Location: index.php"); // Ganti dengan halaman setelah login
        exit();
    } else {
        // Login gagal
        $error_message = "Login gagal. Periksa kembali username dan password.";
        }
        // Tutup koneksi      
        $koneksi->close();  
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
<div class="container">
    <h2>Login</h2>

    <?php
    if (isset($error_message)) {
        echo "<p style='color: red;'>$error_message</p>";
    }
    ?>
    
    <form method="post" action="">
        <label for="username">Username: </label>
        <input type="text" id="username" name="username" placeholder="Input your Username here" required><br>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" placeholder="Input your Password here" required><br>

        <input type="submit" value="Login">
    </form>   
</div>
</body>

</html>