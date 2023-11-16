<?php

session_start();
include 'koneksi.php';
$id_user = $_SESSION['id_user'];
$payment = $_POST['payment'];

mysqli_query($conn, "UPDATE orders
                SET 
                payment = '$payment',
                status = 'order'
                WHERE id_user = '$id_user'");

echo "
        <script>
            alert('Berhasil checkout!');
            window.location.href='cart.php';
        </script>
    ";
