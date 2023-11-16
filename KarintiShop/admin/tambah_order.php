<?php
session_start();
include('../koneksi.php');

$user = mysqli_query($conn, "SELECT * FROM user WHERE id_level = '2'");
$product = mysqli_query($conn, "SELECT * FROM product ");

if (isset($_POST['tambah'])) {
    $id_user = $_POST['id_user'];
    $id_product = $_POST['id_product'];
    $payment = $_POST['payment'];

    mysqli_query($conn, "INSERT INTO orders VALUES(NULL, '$id_user', '$id_product', '$payment', 'order')");

    echo "
        <script>
            alert('Berhasil tambah data order!');
            window.location.href='order.php';
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
        <h1>Tambah Order</h1>
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
        <form action="" method="POST">
            <label>Pengguna</label>
            <select name="id_user">
                <?php foreach ($user as $td) : ?>
                    <option value="<?= $td['id_user']; ?>"><?= $td['username'] ?></option>
                <?php endforeach; ?>
            </select>

            <label>Product</label>
            <select name="id_product">
                <?php foreach ($product as $td) : ?>
                    <option value="<?= $td['id_product']; ?>"><?= $td['name'] ?></option>
                <?php endforeach; ?>
            </select>

            <label>Payment</label>
            <select name="payment">
                <option value="Transfer">Transfer</option>
                <option value="Cash">Cash</option>
            </select>
            <input type="submit" name="tambah" class="btn">
        </form>
    </section>

    <div class="space"></div>
</body>

</html>