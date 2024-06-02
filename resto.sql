-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Jun 2024 pada 16.22
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `resto`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `restoran`
--

CREATE TABLE `restoran` (
  `id_resto` int(11) NOT NULL,
  `nama_resto` varchar(100) NOT NULL,
  `alamat` varchar(300) NOT NULL,
  `telp` varchar(25) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `jam` varchar(20) NOT NULL,
  `harga` varchar(50) NOT NULL,
  `map` varchar(200) NOT NULL,
  `layanan` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `restoran`
--

INSERT INTO `restoran` (`id_resto`, `nama_resto`, `alamat`, `telp`, `kategori`, `jam`, `harga`, `map`, `layanan`) VALUES
(1, 'Eastern Kopi TM Seturan', 'Jl. Seturan Raya No.A9-10, Kledokan, Caturtunggal, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55281.', '(0274) 484441', 'Coffee, Tea, Smoothies, Snacks', '09.00-22.00', 'Rp. 25.000 - Rp. 95.000', 'https://maps.app.goo.gl/bytvck8gzQkNozw78', 'Pesan Antar, Makanan Halal, Kopi, Tempat duduk di area terbuka, Makan di tempat, Pilihan menu vegetarian, Toilet, Wi-Fi, Menerima reservasi, Kartu debit, Kartu kredit, Menu untuk anak-anak, Banyak tempat parkir'),
(2, 'Mie Gacoan Babarsari', 'Jl. Babarsari Ruko Raflesia Blok B7-B10, Jl. Raya Kledokan, Caturtunggal, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55281.', '(0274) 111222', 'Noodles, Dimsum, Smoothies, Snacks', '09.00-21.00', 'Rp. 5.000 - Rp. 35.000', 'https://maps.app.goo.gl/6xUNBwqgVMWwjJri6', 'Pesan Antar, Makanan Halal, Dessert, Makan di tempat, Toilet, Wi-Fi, Menerima reservasi, Kartu debit, Q-RIS, Menu untuk anak-anak, Banyak tempat parkir'),
(3, 'Ayam Goreng Suharti', 'Jl. Laksda Adisucipto No.208, Janti, Caturtunggal, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55281.', '(0274) 484522', 'Chicken, Vegetables, Traditional', '08.00-21.00', 'Rp. 30.000 - Rp. 120.000', 'https://maps.app.goo.gl/yN7BuMSCh9A4H7zF7', 'Pesan Antar, Makanan halal, Pintu masuk khusus pengguna kursi roda, Makan di tempat, Toilet, Musik live, Menerima reservasi, Nyaman, Menu untuk anak-anak, Banyak tempat parkir'),
(4, 'Food Truck Barsa City', 'Ngentak, Caturtunggal, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55281.', '081335953355', 'Coffee, Smoothies, Snacks', '15.00-23.30', 'Rp. 10.000 - Rp. 40.000', 'https://maps.app.goo.gl/3RWJJP4bNFtZ6KXS6', 'Drive-through, Dessert, Makan di tempat, Salad prasmanan, Live musik, Q-RIS, Banyak tempat parkir'),
(5, 'OTW Ramen', 'Jl. Sukun Raya No.8, Jaranan, Banguntapan, Kec. Banguntapan, Kabupaten Bantul, Daerah Istimewa Yogyakarta 55281.', '081228666605', 'Noodles, Dimsum, Smoothies, Ramen', '11.00-21.00', 'Rp. 18.000 - Rp. 52.000', 'https://maps.app.goo.gl/KyuSH4ZVZ8hK27FSA', 'Pesan antar, Makanan halal, Parkir gratis, Makan di tempat, Toilet, Menerima reservasi, Kartu debit, Q-RIS, Menu untuk anak-anak'),
(6, 'J.Co - Plaza Ambarrukmo', 'Ground Floor , A - 35 Plaza Ambarukmo, Jl. Laksda Adisucipto, Ambarukmo, Caturtunggal, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55281.', '(0274) 4331192', 'Coffee, Tea, Smoothies, Donut', '10.00-22.00', 'Rp. 25.000 - Rp. 70.000', 'https://maps.app.goo.gl/DKfCbBVdo3YNf2h47', 'Pesan antar, Makanan halal, Dessert, Makan di tempat, Toilet khusus pengguna kursi roda, Wi-Fi, Pembayaran NFC dengan ponsel, Kartu debit, Q-RIS'),
(7, 'McDonald\'s Ambarukmo', 'Jl. Laksda Adisucipto No.21, Ambarukmo, Caturtunggal, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55281.', '08118162853', 'Burger, Chicken, Smoothies', '24 Jam', 'Rp. 15.000 - Rp. 70.000', 'https://maps.app.goo.gl/yihov8R8GyRmzpjk7', 'Drive-through, Makanan halal, Makan di tempat, Toilet, Wi-Fi, Menerima reservasi, Kartu debit, Pelayanan cepat, Cepat saji, Banyak tempat parkir');

-- --------------------------------------------------------

--
-- Struktur dari tabel `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `rating` int(5) NOT NULL,
  `date` varchar(20) NOT NULL,
  `nama_resto` varchar(100) NOT NULL,
  `id_resto` int(11) NOT NULL,
  `pesan` text NOT NULL,
  `image` mediumblob NOT NULL,
  `user_id` int(11) NOT NULL,
  `edited` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `review`
--

INSERT INTO `review` (`id`, `rating`, `date`, `nama_resto`, `id_resto`, `pesan`, `image`, `user_id`, `edited`) VALUES
(51, 5, '31-05-2024', 'Eastern Kopi TM Seturan', 1, 'Mantab', '', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `name` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_id`, `username`, `name`, `password`) VALUES
(1, 'fathanras', 'Fathan Rasyidi', '123'),
(11, 'adityarahman', 'Aditya Rahman', 'abc'),
(12, 'admin', 'Guest', '111');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `restoran`
--
ALTER TABLE `restoran`
  ADD PRIMARY KEY (`id_resto`);

--
-- Indeks untuk tabel `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `id_resto` (`id_resto`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `restoran`
--
ALTER TABLE `restoran`
  MODIFY `id_resto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`id_resto`) REFERENCES `restoran` (`id_resto`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
