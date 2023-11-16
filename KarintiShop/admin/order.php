<?php
session_start();
include('../koneksi.php');

$order = mysqli_query($conn, "SELECT * FROM orders 
                            JOIN product ON orders.id_product = product.id_product
                            JOIN user ON orders.id_user = user.id_user");


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
        <h1>Order</h1>
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

    <section>
        <a href="tambah_order.php" class="btn" style="margin-bottom:20px">Tambah Order</a>
        <table>
            <tr>
                <th>Pengguna</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Image</th>
                <th>Category</th>
                <th>Status/Payment</th>
                <th>Aksi</th>
            </tr>
            <?php foreach ($order as $td) : ?>
                <tr>
                    <td><?= $td['username'] ?></td>
                    <td><?= $td['name'] ?></td>
                    <td><?= number_format($td['price'], 0); ?></td>
                    <td><img src="../imgdb/<?= $td['image']; ?>" style="width:150px;height:150px"></td>
                    <td><?= $td['category'] ?></td>
                    <td><?= $td['status'] ?> || <?= $td['payment'] ?></td>
                    <td>
                        <a href="edit_cart.php?id_order=<?= $td['id_order']; ?>">Edit Product</a>
                        ||
                        <a href="delete_cart.php?id_order=<?= $td['id_order']; ?>">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </section>

    <div class=" space"></div>
</body>

</html>