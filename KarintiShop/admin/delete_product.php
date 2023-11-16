<?php

include '../koneksi.php';
$id_product = $_GET['id_product'];

mysqli_query($conn, "DELETE FROM product WHERE id_product = '$id_product'");

echo "
        <script>
            alert('Berhasil delete data product!');
            window.location.href='product.php';
        </script>
    ";
