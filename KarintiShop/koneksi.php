<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "karintishop";
$koneksi = mysqli_connect($server, $username, $password, $database);
$conn = mysqli_connect($server, $username, $password, $database);
if (!$koneksi) {
  die("Gagal terhubung ke database" . mysqli_connect_error());
}

function query($query)
{
  global $conn;
  $result = mysqli_query($conn, $query);
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  };
  return $rows;
}


function upload()
{
  $namaFile = $_FILES['gambar']['name'];
  $ukuranFile = $_FILES['gambar']['size'];
  $error = $_FILES['gambar']['error'];
  $tmpName = $_FILES['gambar']['tmp_name'];

  // Jika file tidak diunggah, kembalikan nilai NULL
  if ($error === UPLOAD_ERR_NO_FILE) {
    return NULL;
  }

  // Batas ukuran file adalah 10 megabyte (MB)
  $maxSize = 5 * 1024 * 1024;

  // Jika ukuran file melebihi batas maksimum
  if ($ukuranFile > $maxSize) {
    echo "<script>alert('Gambar melebihi 5MB!');</script>";
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit();
  }

  $ekstensiGambar = explode('.', $namaFile);
  $ekstensiGambar = strtolower(end($ekstensiGambar));

  // generate nama gambar baru
  $namaFileBaru = uniqid();
  $namaFileBaru .= '.';
  $namaFileBaru .= $ekstensiGambar;
  move_uploaded_file($tmpName, '../imgdb/' . $namaFileBaru);

  return $namaFileBaru;
}
