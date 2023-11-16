<?php
session_start();
include('koneksi.php');

$error = false;


if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' AND id_level = '1'")) > 0) {
        $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' AND id_level = '1'");
        $detail = query("SELECT * FROM user WHERE username = '$username'")[0];
        $id_user = $detail['id_user'];
        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if (password_verify($password, $row["password"])) {
                $_SESSION["id_user"] = $id_user;
                $_SESSION["login"] = true;
                $_SESSION["admin"] = true;
                $_SESSION["username"] = $username;
                header("Location: admin");
                exit;
            }
        }
    } elseif (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' AND id_level = '2'")) > 0) {
        $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
        $detail = query("SELECT * FROM user WHERE username = '$username'")[0];
        $id_user = $detail['id_user'];
        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if (password_verify($password, $row["password"])) {
                $_SESSION["id_user"] = $id_user;
                $_SESSION["login"] = true;
                $_SESSION["user"] = true;
                $_SESSION["username"] = $username;
                header("Location:index.php");
                exit;
            }
        }
    }

    $error = true;
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

<style>
    .row {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 50%;
        margin: 0 auto; /* This centers the element and also provides a bit of space on the left and right */
    }
</style>

<body>

    <div class="heading">
        <h1>Login</h1>
    </div>

    <section id="contact" class="contact">
        <center>
            <?php if ($error) :  ?>
                <p>Username/password salah!</p>
            <?php endif; ?>
        </center>
        <div class="row" style="width: 40%;">

            <form action="" method="POST">
                <div class="inputBox">
                    <input type="text" name="username" placeholder="enter your username" class="box" style="width: 100%;">
                </div>
                <div class="inputBox">
                    <input type="password" name="password" placeholder="enter your password" class="box" style="width: 100%;">
                </div>
                <input type="submit" name="login" class="btn"></input>
                <a href="registrasi.php">Registrasi</a>
            </form>
        </div>

    </section>

    <div class="space"></div>
</body>

</html>