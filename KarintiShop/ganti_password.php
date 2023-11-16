<?php
session_start();
include('koneksi.php');

$id_user = $_SESSION['id_user'];
$pengguna = query("SELECT * FROM user WHERE id_user = '$id_user'")[0];

if (isset($_POST['edit'])) {
    $password_sebelum = mysqli_real_escape_string($conn, $_POST["password"]);
    $password = password_hash($password_sebelum, PASSWORD_DEFAULT);

    $res = mysqli_query($conn, "UPDATE user 
                SET
                password = '$password'
                WHERE id_user = '$id_user'
    ");
    if (mysqli_affected_rows($conn) > 0) {
        echo "
            <script>
                alert('Berhasil Ganti Password!');
                window.location.href='index.php'
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
    <title>Karinti's Bakery</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="heading">
        <h1>Change Password</h1>
    </div>

    <section id="contact" class="contact">
        <div class="row">
            <form action="" method="POST">
                <div class="inputBox">
                    <input type="password" name="password" placeholder="enter new password" class="box" style="width: 100%;">
                </div>
                <input type="submit" name="edit" class="btn"></input>
                <a href="index.php">Kembali</a>
            </form>
        </div>

    </section>

    <div class="space"></div>
</body>

</html>