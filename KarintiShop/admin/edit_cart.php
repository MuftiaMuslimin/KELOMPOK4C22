<?php
session_start();

include '../koneksi.php';

$id_order = $_GET['id_order'];
$order_detail = query("SELECT * FROM orders WHERE id_order = '$id_order'")[0];
$id_product_detail = $order_detail['id_product'];

$product = mysqli_query($conn, "SELECT * FROM product");

if (isset($_POST['ubah'])) {
    $id_product = mysqli_real_escape_string($conn, $_POST["id_product"]);

    $res = mysqli_query($conn, "UPDATE orders 
                SET id_product = '$id_product'
                WHERE id_order = '$id_order'
    ");
    if (mysqli_affected_rows($conn) > 0) {
        echo "
            <script>
                alert('Berhasil Edit Order!');
                window.location.href='order.php'
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
    <title>Bread Cake</title>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


    <link rel="stylesheet" href="../style.css">
</head>

<body>



    <header class="header">

        <a href="#" class="logo"> <i class="fas fa-shopping-basket"></i> Karinti's Cake </a>

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
        <h1>Edit Product</h1>
    </div>

    <section id="products" class="products">

        <h1 class="title"><span>Edit Cart</span> </h1>
        <center>
            <div class="box-container">
                <form action="?id_order=<?= $id_order ?>" method="post">
                    <label> Select Product for Edit</label> <br><br>
                    <select name="id_product">
                        <?php foreach ($product as $td) : ?>
                            <?php if ($id_product_detail == $td['id_product']) : ?>
                                <option value="<?= $td['id_product']; ?>">
                                    <?= $td['name'] . " - Rp " . number_format($td['price'], 0); ?> *data saat ini</option>
                            <?php else : ?>
                                <option value="<?= $td['id_product']; ?>">
                                    <?= $td['name'] . " - Rp " . number_format($td['price'], 0); ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                    <button type="submit" name="ubah" class="btn">Ubah</button>
                </form>
            </div>
        </center>
    </section>


    <section class="credit">created by Karinti's Cake || all rights reserved</section>

    <script src="main.js" defer data-deferred="1"></script>
</body>

</html>