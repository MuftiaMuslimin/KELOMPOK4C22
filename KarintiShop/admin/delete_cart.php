<?php

include '../koneksi.php';
$id_order = $_GET['id_order'];

mysqli_query($conn, "DELETE FROM orders WHERE id_order = '$id_order'");

echo "
        <script>
            alert('Berhasil delete data order!');
            window.location.href='order.php';
        </script>
    ";
