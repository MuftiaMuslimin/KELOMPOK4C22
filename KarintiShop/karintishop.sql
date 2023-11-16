-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Nov 2023 pada 15.19
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `karintishop`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `level`
--

CREATE TABLE `level` (
  `id_level` int(11) NOT NULL,
  `level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `level`
--

INSERT INTO `level` (`id_level`, `level`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `id_order` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `payment` enum('Transfer','Cash') DEFAULT NULL,
  `status` enum('cart','order') NOT NULL DEFAULT 'cart'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`id_order`, `id_user`, `id_product`, `payment`, `status`) VALUES
(1, 1, 1, 'Cash', 'order'),
(2, 5, 3, NULL, 'cart'),
(5, 4, 3, 'Cash', 'order'),
(32, 6, 7, 'Transfer', 'order');

-- --------------------------------------------------------

--
-- Struktur dari tabel `product`
--

CREATE TABLE `product` (
  `id_product` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` bigint(20) NOT NULL,
  `image` text NOT NULL,
  `rating` decimal(10,0) NOT NULL,
  `category` enum('bread','cookies','cupcake','whole') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `product`
--

INSERT INTO `product` (`id_product`, `name`, `price`, `image`, `rating`, `category`) VALUES
(1, 'Keju Coklat Bun', 8000, 'bread (2).png', 4, 'bread'),
(2, 'Cheesausage Bread', 15000, 'bread (5).png', 4, 'bread'),
(3, 'Black forest Donut', 12000, 'bread (9).png', 4, 'bread'),
(4, 'Croissant', 15000, 'bread (13).png', 4, 'bread'),
(5, 'Avocado Genoise', 295000, 'WholeCakes (1).png', 4, 'whole'),
(6, 'Mixfruits Cheesecake', 265000, 'WholeCakes (6).png', 4, 'whole'),
(7, 'Tiramisu', 325000, 'WholeCakes (11).png', 4, 'whole'),
(8, 'Chocomaltine Cheesecake', 230000, 'WholeCakes (12).png', 4, 'whole'),
(9, 'Regal Chocolate', 225000, 'WholeCakes (16).png', 4, 'whole'),
(10, 'Chocolate Hazelnut Granola', 2755000, 'WholeCakes (18).png', 4, 'whole'),
(11, 'Almond Macaroons', 55000, 'Cookies (1).png', 4, 'cookies'),
(12, 'Chocolate Ricotta', 65000, 'Cookies (5).png', 4, 'cookies'),
(13, 'Plain Ricotta', 55000, 'Cookies (8).png', 4, 'cookies'),
(14, 'Strawberry Cupcake', 22000, 'CupCakes (1).png', 4, 'cupcake'),
(15, 'Flower Cupcake', 25000, 'CupCakes (3).png', 4, 'cupcake');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `id_level`) VALUES
(6, 'arin', '$2y$10$wOzVNTSkXGciMOKoPnA1iuKCwJr672aSdXRp0n/HLOVuTzBdYztFK', 2),
(7, 'admin', '$2y$10$gbvx.KDV8U92PX72/VZxmOJpwTOCA14EJkHINb1KO3s4Zky9nd3EC', 1),
(9, 'erika', '$2y$10$hvGZtYarOTtPn6Y6EtLCBe0OejgUALQn/p8Pqoex3waaF25oOTM2.', 2),
(11, 'muftia', '$2y$10$gJ5AhAfD8vIfYY3tABwAxu7X4jqOfZf/nn9.1E3TcURJV4j81Qbqa', 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_order`);

--
-- Indeks untuk tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `product`
--
ALTER TABLE `product`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
