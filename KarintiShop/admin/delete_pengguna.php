<?php

include '../koneksi.php';
$id_user = $_GET['id_user'];

mysqli_query($conn, "DELETE FROM user WHERE id_user = '$id_user'");

echo "
        <script>
            alert('Berhasil delete data pengguna!');
            window.location.href='pengguna.php';
        </script>
    ";
