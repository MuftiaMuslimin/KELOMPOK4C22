<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location:login.php");
}

include('koneksi.php');

$product = mysqli_query($conn, "SELECT * FROM product LIMIT 4");


// $sql = "SELECT * FROM category_product";
// $result = $koneksi->query($sql);
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

        <a href="#" class="logo"> <i class="fas fa-shopping-basket"></i> Karinti's Bakery</a>

        <nav class="navbar">
            <a href="#home">Home</a>
            <a href="product.php">Shop</a>
            <a href="#about">About</a>
            <a href="#contact">Contact</a>
        </nav>

        <div class="icons">
            <div id="menu-btn" class="fas fa-bars"></div>
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

    <section class="home" id="home">

        <div class="slides-container">

            <div class="slide active">
                <div class="content">
                    <span>Have a Cake-Karinti's-Licious</span>
                    <h3>up to 20% off</h3>
                    <a href="product.php" class="btn">Shop Now</a>
                </div>
                <div class="img">
                    <img decoding="async" src="image-product/Home/home1.png" alt="">
                </div>
            </div>

            <div class="slide">
                <div class="content">
                    <span>Have a Cake-Karinti's-Licious</span>
                    <h3>up to 25% off</h3>
                    <a href="product.php" class="btn">Shop Now</a>
                </div>
                <div class="img">
                    <img decoding="async" src="image-product/Home/home2.png" alt="">
                </div>
            </div>

            <div class="slide">
                <div class="content">
                    <span>Have a Cake-Karinti's-Licious</span>
                    <h3>up to 30% off</h3>
                    <a href="product.php" class="btn">Shop Now</a>
                </div>
                <div class="img">
                    <img decoding="async" src="image-product/Home/home3.png" alt="">
                </div>
            </div>

        </div>
        <div id="next-slide" class="fas fa-angle-right" onclick="next()"></div>
        <div id="prev-slide" class="fas fa-angle-left" onclick="next()"></div>

    </section>


    <section class="banner-container">

        <div class="banner">
            <img decoding="async" src="image-product/Banner/banner1.jpg" alt="">
            <div class="content">
                <span>limited sales</span>
                <h3>upto 25% off</h3>
                <a href="product.php" class="btn">shop now</a>
            </div>
        </div>

        <div class="banner">
            <img decoding="async" src="image-product/Banner/banner2.jpg" alt="">
            <div class="content">
                <span>limited sales</span>
                <h3>upto 25% off</h3>
                <a href="product.php" class="btn">shop now</a>
            </div>
        </div>

        <div class="banner">
            <img decoding="async" src="image-product/Banner/banner3.jpg" alt="">
            <div class="content">
                <span>limited sales</span>
                <h3>upto 25% off</h3>
                <a href="product.php" class="btn">shop now</a>
            </div>
        </div>

    </section>

    <div class="heading">
        <h1>our shop</h1>
    </div>

    <section id = "category" class="category">

<h1 class="title"> our <span>category</span></h1>

<div class="box-container">

    <a href="product.php" class="box">
        <img decoding="async" src="image-product/Category/category1.png" alt="">
        <h3>Bread</h3>
    </a>

    <a href="product.php" class="box">
        <img decoding="async" src="image-product/Category/category (2).png" alt="">
        <h3>Whole Cake</h3>
    </a>

    <a href="product.php" class="box">
        <img decoding="async" src="image-product/Category/category3.png" alt="">
        <h3>Cookies Cake</h3>
    </a>

    <a href="product.php" class="box">
        <img decoding="async" src="image-product/Category/category4.png" alt="">
        <h3>Cup Cake</h3>
    </a>

</div>

</section>


    <section id="products" class="products">

        <h1 class="title"> our <span>products</span> </h1>

        <div class="box-container">

            <div class="box">
                <div class="img">
                    <img decoding="async" src="imgdb/WholeCakes (20).png" alt="">
                </div>
                <div class="content">
                    <h3>berries citrus fruits cake</h3>
                    <div class="price">Rp235000</div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                </div>
            </div>

            <div class="box">
                <div class="img">
                    <img decoding="async" src="imgdb/bread (24).png" alt="">
                </div>
                <div class="content">
                    <h3>Resh Mellow sp Color Cake</h3>
                    <div class="price">Rp35000</div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                </div>
            </div>

            <div class="box">
                <div class="img">
                    <img decoding="async" src="imgdb/WholeCakes (19).png" alt="">
                </div>
                <div class="content">
                    <h3>Rose Color Sparkel Cake</h3>
                    <div class="price">Rp275000</div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                </div>
            </div>

            <div class="box">
                <div class="img">
                    <img decoding="async" src="imgdb/WholeCakes (21).png" alt="">
                </div>
                <div class="content">
                    <h3>Strawberry Nutella Cake</h3>
                    <div class="price">Rp215000</div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <div class="heading">
        <h1>About us</h1>
    </div>

    <section id="about" class="about">
    <div class="img">
         <img decoding="async" src="about-img.jpeg" alt="">
    </div>

    <div class="content">
        <h3>Our History</h3>
        <p>Awal mula website Karinti’s Bakery Shop ini berdiri disebabkan karena Projek Akhir Pemrograman Web akan dimulai. Kami dari kelompok 4 beranggotakan 3 orang yaitu Erika, Arin, dan Tia. Kami memulai KerKel (Kerja Kelompok) pada Senin, 23 Oktober 2023 tepatnya di D408-409.
            Dipertengahan Kerkel, Erika mengeluarkan ide untuk mengganti nama website karena terlalu umum dan tidak menarik. Dan jadilah Karinti, Karinti berasal dari 3 gabungan nama kami. ERIKA, ARIN, TIA >> KARINTI. 
            Karinti’s Bakery Shop menjual berbagai macam kue, cemilan, dan masih banyak lagi. Website ini juga terinspirasi dari salah satu Bakery & Pastry Shop yang ada di Samarinda.</p>
        <a href="#" class="btn">read more</a>
    </div>
</section>

    <div class="heading">
        <h1>Contact us</h1>
    </div>

    <section id="contact" class="contact">
        <div class="icons-container">

            <div class="icons">
                <i class="fas fa-phone"></i>
                <h3>our number</h3>
                <p>0852xxxxxx</p>
                <p>0823xxxxxx</p>
            </div>

            <div class="icons">
                <i class="fas fa-envelope"></i>
                <h3>our email</h3>
                <p>Karinti's@gmail.com</p>
                <p>ErikArinTia@gmail.com</p>
            </div>

            <div class="icons">
                <i class="fas fa-map-marker-alt"></i>
                <h3>our address</h3>
                <p>Samarinda, Indonesia - +62</p>
            </div>

        </div>

        <div class="row">
            <form action="">
                <h3>get in touch</h3>
                <div class="inputBox">
                    <input type="text" placeholder="enter your name" class="box">
                    <input type="text" placeholder="enter your email" class="box">
                </div>
                <div class="inputBox">
                    <input type="number" placeholder="enter your number" class="box">
                    <input type="text" placeholder="enter your subject" class="box">
                </div>
                <textarea placeholder=" your message" cols="30" rows="10"></textarea>
                <input type="submit" value="send message" class="btn">
            </form>
            <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.6885477348837!2d117.1540700734957!3d-0.462118935277612!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2df678b13a98df85%3A0x228d7721ce3b88fe!2sGg.%20Alam%20Segar%203%20No.6%2C%20Sempaja%20Sel.%2C%20Kec.%20Samarinda%20Utara%2C%20Kota%20Samarinda%2C%20Kalimantan%20Timur%2075243!5e0!3m2!1sen!2sid!4v1699170745117!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>


    </section>

    <div class="space"></div>

    <section class="footer">
        <div class="box-container">
            <div class="box">
                <h3>quick links</h3>
                <a href="#home"> <i class="fas fa-arrow-right"></i>Home</a>
                <a href="#category"> <i class="fas fa-arrow-right"></i>Shop</a>
                <a href="#about"> <i class="fas fa-arrow-right"></i>About</a>
                <a href="#contact"> <i class="fas fa-arrow-right"></i>Contact</a>
            </div>

            <div class="box">
                <h3>extra links</h3>
                <a href="#"> <i class="fas fa-arrow-right"></i> my favorite </a>
                <a href="#"> <i class="fas fa-arrow-right"></i> my account </a>
            </div>

            <div class="box">
                <h3>follow us</h3>
                <a href="#"> <i class="fab fa-facebook-f"></i> facebook </a>
                <a href="#"> <i class="fab fa-instagram"></i> instagram </a>
            </div>

            <div class="box">
                <h3>newsletter</h3>
                <p>subscribe for latest update</p>
                <form action="">
                    <input type="email" placeholder="enter your email address">
                    <input type="submit" value="subscribe" class="btn">
                </form>
            </div>
        </div>
    </section>

    <section class="credit">created by Karinti's Cake || all rights reserved</section>

    <script src="main.js" defer data-deferred="1"></script>
</body>

</html>