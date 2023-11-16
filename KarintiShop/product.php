<?php
session_start();

include 'koneksi.php';

if (!isset($_SESSION['user'])) {
    header("location: login.php");
}

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


    <link rel="stylesheet" href="product.css">
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
                <div id="login-btn" class="fas fa-power-off"></div>
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

        <h1 class="title"> our <span>products</span> </h1>
        <center>
            <div class="box-container">
                <?php foreach ($product as $td) : ?>
                    <div class="box">
                        <div class="img">
                            <img decoding="async" src="imgdb/<?= $td['image']; ?>" alt="">
                        </div>
                        <div id="products">
                            <h3><?= $td['name'] ?></h3>
                            <h5>Rp <?= number_format($td['price'], 0); ?></h5>
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
                            <h5><?= $td['category']; ?></h5>
                            <a href="add_cart.php?id_product=<?= $td['id_product']; ?>" class="btn">
                                <div class="fas fa-shopping-cart"></div>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </center>
    </section>


    <section class="credit">created by Karinti's Bakery|| all rights reserved</section>

    <script src="main.js" defer data-deferred="1"></script>
</body>

</html>