<?php
session_start();
include('../koneksi.php');

if (isset($_POST['tambah'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $gambar = upload();
    $rating = $_POST['rating'];
    $category = $_POST['category'];

    mysqli_query($conn, "INSERT INTO product VALUES(NULL, '$name', '$price', '$gambar', '$rating', '$category')");

    echo "
        <script>
            alert('Berhasil tambah data product!');
            window.location.href='product.php';
        </script>
    ";
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
        <h1>Tambah Product</h1>
    </div>
    <header class="header">

        <a href="#" class="logo"> <i class="fas fa-shopping-basket"></i> Karinti's Cake </a>

        <nav class="navbar">
            <a href="index.php">Home</a>
            <a href="product.php">Product</a>
            <a href="order.php">Order</a>
            <a href="pengguna.php">Pengguna</a>
            <a href="ganti_password.php">Ganti Password</a>
        </nav>

    </header>

    <section id="contact" class="contact">
        <form action="" method="POST" enctype="multipart/form-data">
            <input type="text" name="name" placeholder="Name..." required>
            <input type="number" name="price" placeholder="Price..." required>
            <input type="file" name="gambar" required>
            <input type="number" name="rating" placeholder="Rating..." required>
            <select name="category">
                <option value="bread">bread</option>
                <option value="cookies">cookies</option>
                <option value="cupcake">cupcake</option>
            </select>
            <input type="submit" name="tambah" class="btn">
        </form>
    </section>

    <div class="space"></div>
</body>

</html>