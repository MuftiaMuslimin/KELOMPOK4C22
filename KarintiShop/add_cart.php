<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location:login.php");
}

include('koneksi.php');
$id_product = $_GET['id_product'];
$id_user = $_SESSION['id_user'];
$product = mysqli_query($conn, "SELECT * FROM product LIMIT 4");

$res = mysqli_query($conn, "INSERT INTO orders VALUES(NULL, '$id_user','$id_product', NULL, 'cart')");
if (mysqli_affected_rows($conn) > 0) {
    echo "
            <script>
                alert('Berhasil Tambah Cart!');
                window.location.href='product.php'
            </script>
        ";
} else {
    echo mysqli_error($conn);
}
