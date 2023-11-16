<?php
session_start();
include('../koneksi.php');

if (isset($_POST['daftar'])) {
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $password_sebelum = mysqli_real_escape_string($conn, $_POST["password"]);
    $id_level = 2;

    // cek username sudah ada atau belum
    $prosescek = mysqli_query($conn, "SELECT * FROM user WHERE username='$username'");
    if (mysqli_num_rows($prosescek) > 0) {
        echo "<script>alert('Username Sudah Digunakan!');history.go(-1) </script>";
        exit;
    }
    // enkripsi password
    $password = password_hash($password_sebelum, PASSWORD_DEFAULT);

    $res = mysqli_query($conn, "INSERT INTO user VALUES(NULL, '$username','$password', '$id_level')");
    if (mysqli_affected_rows($conn) > 0) {
        echo "
            <script>
                alert('Berhasil Tambah Pengguna!');
                window.location.href='pengguna.php'
            </script>
        ";
    } else {
        echo mysqli_error($conn);
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Karinti's Cake</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../style.css">
</head>

<body>

    <div class="heading">
        <h1>Tambah Pengguna</h1>
    </div>

    <section id="contact" class="contact">
        <div class="row">
            <form action="" method="POST">
                <div class="inputBox">
                    <input type="text" name="username" placeholder="enter your username" class="box" style="width: 100%;">
                </div>
                <div class="inputBox">
                    <input type="password" name="password" placeholder="enter your password" class="box" style="width: 100%;">
                </div>
                <input type="submit" name="daftar" class="btn"></input>
                <a href="pengguna.php">Kembali</a>
            </form>
        </div>

    </section>

    <div class="space"></div>
</body>

</html>