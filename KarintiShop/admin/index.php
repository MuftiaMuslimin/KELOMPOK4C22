<?php
session_start();
include('../koneksi.php');


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Karinti's Bakery</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../style.css">
</head>

<body>

    <div class="heading">
        <h1>Dashboard Admin</h1>
    </div>
    <header class="header">

        <a href="#" class="logo"> <i class="fas fa-shopping-basket"></i> Karinti's Cake </a>

        <nav class="navbar">
            <a href="index.php">Home</a>
            <a href="product.php">Product</a>
            <a href="order.php">Order</a>
            <a href="pengguna.php">User</a>
            <a href="ganti_password.php">Ganti Password</a>
        </nav>

    </header>

    <section id="contact" class="contact">
        <center>
            <a href="../logout.php">
                <div class="fas fa-power-off"></div>
            </a>
        </center>
    </section>

    <div class="space"></div>
</body>

</html>