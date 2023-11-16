<?php
session_start();

include 'koneksi.php';

if (!isset($_SESSION['user'])) {
    header("location: login.php");
}
$id_user = $_SESSION['id_user'];

$cart = mysqli_query($conn, "SELECT * FROM orders 
                            JOIN product ON orders.id_product = product.id_product
                            JOIN user ON orders.id_user = user.id_user
                            WHERE orders.id_user = '$id_user'
                            AND orders.status = 'cart'");

$order = mysqli_query($conn, "SELECT * FROM orders 
                            JOIN product ON orders.id_product = product.id_product
                            JOIN user ON orders.id_user = user.id_user
                            WHERE orders.id_user = '$id_user'
                            AND orders.status = 'order'");

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



    <header class="header">

        <a href="#" class="logo"> <i class="fas fa-shopping-basket"></i> Karinti's Bakery </a>

        <nav class="navbar">
            <a href="index.php#home">Home</a>
            <a href="product.php">Shop</a>
            <a href="index.php#about">About</a>
            <a href="index.php#contact">Contact</a>
        </nav>

        <div class="icons">
            <div id="menu-btn" class="fas fa-bars"></div>
            <div id="search-btn" class="fas fa-search"></div>
            <a href="cart.php">
                <div id="cart-btn" class="fas fa-shopping-cart"></div>
            </a>
            <a href="logout.php">
                <div class="fas fa-power-off"></div>
            </a>
            <a href="ganti_password.php">
                <div class="fas fa-gear"></div>
            </a>
        </div>

    </header>

    <div class="heading">
        <h1>Our Product</h1>
        <p>Freshly made with premium ingredients</p>
    </div>

    <section id="products" class="products">

<h1 class="title"><span>cart</span> </h1>
<form action="checkout.php" method="POST">
    <select name="payment">
        <option value="Transfer">Transfer</option>
        <option value="Cash">Cash</option>
    </select>
    <button type="submit" name="checkout" class="btn" style="margin-top: -20px; margin-bottom:20px">Checkout</button>
</form>
<center>
    <div class="box-container">
        <table>
            <tr>
                <th>Pengguna</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Image</th>
                <th>Category</th>
                <th>Aksi</th>
            </tr>
            <?php
            $totalCartPrice = 0; // Initialize the total price variable
            foreach ($cart as $td) : ?>
                <tr>
                    <td><?= $td['username'] ?></td>
                    <td><?= $td['name'] ?></td>
                    <td><?= number_format($td['price'], 0); ?></td>
                    <td><img src="imgdb/<?= $td['image']; ?>" style="width:150px;height:150px"></td>
                    <td><?= $td['category'] ?></td>
                    <td>
                        <a href="edit_cart.php?id_order=<?= $td['id_order']; ?>">Edit Product</a>
                        ||
                        <a href="delete_cart.php?id_order=<?= $td['id_order']; ?>">Delete</a>
                    </td>
                </tr>
                <?php
                $totalCartPrice += $td['price']; // Add the product price to the total
            endforeach; ?>
            <!-- Display total cart price within the box container -->
            <tr>
                <td colspan="5" style="text-align:right;">Total Price:</td>
                <td>Rp <?= number_format($totalCartPrice, 0); ?></td>
            </tr>
        </table>
    </div>
</center>
</section>

<section id="products" class="products">

<h1 class="title"><span>order info</span></h1>
<center>
    <div class="box-container">
        <?php
        $totalOrderPrice = 0; // Initialize the total price variable
        foreach ($order as $td) : ?>
            <div class="order-item">
                <div class="order-details">
                    <div><strong>Product:</strong> <?= $td['name'] ?></div>
                    <div><strong>Price:</strong> Rp <?= number_format($td['price'], 0); ?></div>
                    <div><strong>Category:</strong> <?= $td['category'] ?></div>
                    <div><strong>Payment:</strong> <?= $td['payment'] ?></div>
                </div>
            </div>
            <?php
            $totalOrderPrice += $td['price']; // Add the product price to the total
        endforeach; ?>
        <!-- Display total order price within the box container -->
        <div class="total-price">
        <div><strong>Total Pembayaran:</strong> </div>
        <div >Rp <?= number_format($totalOrderPrice, 0); ?></div>
    </div>
    </div>
</center>
</section>



    <section class="credit">created by Karinti's Cake || all rights reserved</section>

    <script src="main.js" defer data-deferred="1"></script>
</body>

</html>