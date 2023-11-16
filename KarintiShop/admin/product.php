<?php
session_start();
include('../koneksi.php');

$product = mysqli_query($conn, "SELECT * FROM product");

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
        <h1>Product</h1>
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

    <section>
        <a href="tambah_product.php" class="btn" style="margin-bottom:20px">Tambah Product</a>
        <table>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Image</th>
                <th>Rating</th>
                <th>Category</th>
                <th>Aksi</th>
            </tr>
            <?php foreach ($product as $td) : ?>
                <tr>
                    <td><?= $td['name'] ?></td>
                    <td><?= $td['price'] ?></td>
                    <td><img src="../imgdb/<?= $td['image']; ?>" style="width:100px;height:100px"></td>
                    <td>
    <div class="star">
        <?php
        $rating = $td['rating']; // Assuming $td['rating'] contains the rating value

        for ($i = 1; $i <= 5; $i++) {
            if ($i <= $rating) {
                echo '<i class="fas fa-star"></i>';
            } else {
                echo '<i class="far fa-star"></i>';
            }
        }
        ?>
    </div>
</td>

                    <td><?= $td['category'] ?></td>
                    <td>
                        <a href="edit_product.php?id_product=<?= $td['id_product']; ?>">Edit</a>
                        ||
                        <a href="delete_product.php?id_product=<?= $td['id_product']; ?>">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </section>

    <div class=" space"></div>
</body>

</html>