<?php
session_start();
include('../koneksi.php');

$id_product = $_GET['id_product'];
$product = query("SELECT * FROM product WHERE id_product = '$id_product'")[0];

if (isset($_POST['edit'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $rating = $_POST['rating'];
    $category = $_POST['category'];

    // Pengecekan apakah ada file gambar diupload
    if ($_FILES['gambar']['error'] === 4) {
        // Tidak ada gambar diupload, maka UPDATE tanpa mengubah gambar
        mysqli_query($conn, "UPDATE product SET 
            name = '$name',
            price = '$price',
            rating = '$rating',
            category = '$category'
            WHERE id_product = '$id_product'
        ");
    } else {
        // Ada gambar diupload
        $gambar = upload();
        // UPDATE dengan gambar baru
        mysqli_query($conn, "UPDATE product SET 
                name = '$name',
                price = '$price',
                image = '$gambar',
                rating = '$rating',
                category = '$category'
                WHERE id_product = '$id_product'
            ");
    }

    echo "
        <script>
            alert('Berhasil edit data product!');
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
            <input value="<?= $product['name']; ?>" type="text" name="name" placeholder="Name..." required>
            <input value="<?= $product['price']; ?>" type="number" name="price" placeholder="Price..." required>
            <input type="file" name="gambar">
            <input value="<?= $product['rating']; ?>" type="number" name="rating" placeholder="Rating..." required>
            <select name="category">
                <option value="<?= $product['category']; ?>"> <i><?= $product['category']; ?></i> *data saat ini
                </option>
                <option value="bread">bread</option>
                <option value="cookies">cookies</option>
                <option value="cupcake">cupcake</option>
            </select>
            <input type="submit" name="edit" class="btn">
        </form>
        <a href="product.php">Kembali</a>
    </section>

    <div class="space"></div>
</body>

</html>