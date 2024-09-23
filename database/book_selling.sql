-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2024 at 08:51 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookselling`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `id_katalog` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `judul` varchar(90) NOT NULL,
  `pengarang` varchar(50) NOT NULL,
  `penerbit` varchar(50) NOT NULL,
  `hal` varchar(4) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `harga` varchar(11) NOT NULL,
  `deskripsi` varchar(300) NOT NULL,
  `tanggal` date NOT NULL,
  `tanggal_edit` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `id_katalog`, `id_kategori`, `judul`, `pengarang`, `penerbit`, `hal`, `gambar`, `harga`, `deskripsi`, `tanggal`, `tanggal_edit`) VALUES
(1, 3, 4, 'Sistem Operasi', 'Abdul Ghony', 'Abdol PRESS', '90', 'sistem.jpg', '56000', 'Ingin lebih tau tentang Sistem Operasi? buku\r\nini mempelajari tentang Pengertian sistem informasi\r\ndan selengkap nya silahkan anda membeli buku ini', '2024-04-02', '2024-09-12'),
(2, 4, 4, 'Panduan Sukses SPMB PKN STAN 2021', 'Tim Instruktur Ein-stan Academy', 'Forum Edukasi', '720', 'pknstan.jpg', '80500', 'Buku Panduan Resmi Sukses SPMB PKN STAN CAT 2021 adalah panduan lengkap untuk persiapan tes masuk PKN STAN. Buku ini membedah ribuan soal dengan level HOTS dan mencakup materi tes numerik, verbal, penalaran analitis, logis, serta tes gambar abstrak. Selain itu, terdapat pembahasan Suplemen Seleksi K', '2024-04-02', '0000-00-00'),
(5, 3, 1, 'PHP Komplet', 'Jubilee Enterprise', 'Elex Media Komputindo', '247', 'php.jpg', '150000', 'Buku ini mengajarkan PHP dari dasar hingga pengembangan web berbasis database, cocok bagi pemula dan profesional. Jubilee Enterprise, penerbit terkemuka di Indonesia sejak 1999, fokus pada buku Teknologi Informasi dan berkontribusi pada perkembangan IT di Asia Tenggara.', '2024-04-02', '0000-00-00'),
(6, 1, 2, 'SUPER YOYO', 'Hashiguchi Takashi', 'Gramedia', '24', 'yoyo.jpeg', '35000', 'Super YoYo mengisahkan Shunichi Domoto, seorang anak muda yang terjun ke dunia kompetisi yoyo. Dengan menghadapi berbagai tantangan dan menguasai trik-trik tingkat tinggi, Shunichi belajar tentang ketekunan, persahabatan, dan menemukan jati diri', '2024-04-29', '2024-04-29'),
(7, 4, 4, 'IPA Kimia', 'Unggul Sudarmo', 'Erlangga', '160', 'ipakimia.jpg', '68000', 'Buku “IPA Kimia Untuk SMA/MA Kelas 10 Kurikulum Merdeka” menyajikan materi Kimia esensial, kegiatan praktikum, soal latihan, dan uji pemahaman. Fitur-fiturnya termasuk Profil Pelajar Pancasila, Soal AKM, dan Praproyek, dirancang untuk mendukung pembelajaran holistik sesuai Kurikulum Merdeka.', '2024-05-01', '0000-00-00'),
(8, 4, 4, 'Buku Pintar Kimia SMA/MA Kelas 10-12', 'Devina Putri, M.Si.', 'Bintang Wahyu', '416', 'mtkipa.jpg', '64000', 'Buku “Fresh Update Buku Pintar Kimia SMA/MA IPA Kelas 1, 2, 3” menawarkan materi mendetail, pembahasan soal lengkap, rumus praktis, trik menghafal, dan bank soal lengkap (dari Ujian Harian hingga SBMPTN). Buku ini juga dilengkapi trik penyelesaian cepat, desain menarik, serta kumpulan rumus pintar k', '2024-04-02', '0000-00-00'),
(9, 3, 1, 'Pemrograman Berorientasi Objek Menggunakan Java', ' Adam Mukharil Bachtiar & Firman Nizammudin Fakhru', 'Informatika', '262', 'java.png', '69300', 'Buku \"Pemrograman Berorientasi Objek Menggunakan Java\" ditujukan bagi pemula yang ingin mempelajari OOP dengan Java. Buku ini mencakup pembahasan tentang dasar Java, OOP, Generic Programming, Exception Handling, Concurrent Programming, Lambda, dan pembuatan GUI dengan JavaFX. Dilengkapi dengan conto', '2024-05-03', '0000-00-00'),
(10, 2, 3, 'The Midnight Library', 'Matt Haig', 'Gramedia Pustaka Utama', '368', 'midnight.jpg', '84000', 'Perpustakaan Tengah Malam karya Matt Haig mengisahkan tentang Nora Seed, seorang wanita yang di ambang kematian menemukan dirinya di sebuah perpustakaan ajaib. Di sana, setiap buku memberikan kesempatan baginya untuk mencoba berbagai versi kehidupannya yang berbeda. Dibantu oleh penjaga perpustakaan', '2024-05-03', '0000-00-00'),
(11, 2, 0, 'Educated (Terdidik): Sebuah Memoar', 'TARA WESTOVER', 'Gramedia Pustaka Utama', '520', '20240912035541.jpg', '102400', '', '2024-04-03', '0000-00-00'),
(12, 2, 3, 'Heartbreak Motel', 'Ika Natassa', 'Gramedia Pustaka Utama', '400', 'heartbreak.jpg', '79200', 'Ava, seorang aktris sejak usia enam belas tahun, mengarungi kehidupan yang penuh misteri dan pertanyaan yang tak terpecahkan. Di ulang tahunnya yang ketiga puluh, setelah setiap peran yang dijalaninya, dia menyendiri di tempat yang disebut Heartbreak Motel untuk memulihkan diri. Di sana, tiga lelaki', '2024-04-03', '0000-00-00'),
(13, 2, 3, 'Nebula', ' Tere Liye', 'Gramedia Pustaka Utama', '376', 'nebula.jpg', '100000', '\r\nNebula adalah lanjutan dari Selena dalam serial Bumi oleh Tere Liye, yang terbit pada 2020. Mengisahkan Selena selama liburan kuliahnya, membantu Bibi Leh mempersiapkan pernikahan, dan berlanjut ke petualangan di Akademi Bayangan Tingkat Tinggi. Buku ini mengeksplorasi persahabatan yang diuji oleh', '2024-04-03', '0000-00-00'),
(14, 2, 3, 'Laut Bercerita', 'Leila S. Chudori', 'Kepustakaan Populer Gramedia', '400', 'lautbercerita.jpg', '142500', 'Laut Bercerita menggambarkan kekejaman yang dialami aktivis mahasiswa di era Orde Baru, serta hilangnya tiga belas aktivis yang hingga kini belum ditemukan. Novel ini juga mengisahkan keluarga yang kehilangan dan sahabat yang merasa hampa. Cerita terbagi dalam dua bagian: bagian pertama melalui sudu', '2024-04-03', '0000-00-00'),
(15, 1, 2, 'Adit Sopo Jarwo', 'BENTANG PUSTAKA	', 'ATOMIK STUDIO', '36', 'aditsopojarwo.jpg', '22500', 'Adit Sopo Jarwo adalah komik lucu yang menceritakan petualangan Adit dan teman-temannya, yang sering berhadapan dengan kelucuan Sopo dan Jarwo. Ceritanya penuh humor dan nilai persahabatan, cocok untuk segala usia.', '2024-04-04', '0000-00-00'),
(16, 1, 2, 'Karya Mangaka Cilik', 'Adnin Zaqiyah Salma ', ' DAR! Mizan', '88', 'cilik.jpg', '40000', 'Komik ini bercerita tentang Karin, seorang anak yang sangat menyukai Jepang, terutama manga. Dia sering menggambar dan menulis cerita khayalannya tentang Jepang di blognya. Cerita ini menginspirasi pembaca muda untuk berani bermimpi dan berkarya, serta menyampaikan pesan tentang pentingnya kreativit', '2024-04-04', '0000-00-00'),
(17, 3, 1, 'Algoritma & Struktur Data C++', 'Cipta Ramadhani, S.T.,M.Eng', 'Andi Offset', '396', 'c++.jpg', '123.250', 'Buku ini membahas algoritma dan struktur data dengan C++, mencakup dasar-dasar seperti tipe data, operator, fungsi, serta struktur data seperti linked list, tree, dan graph. Visualisasi dan konsep Object-Oriented Programming (Class dan Object) juga dijelaskan untuk membantu pembaca memahami teknik p', '2024-04-04', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id_cus` int(11) NOT NULL,
  `nama_cus` varchar(40) NOT NULL,
  `email_cus` varchar(40) NOT NULL,
  `password_cus` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id_cus`, `nama_cus`, `email_cus`, `password_cus`) VALUES
(1, 'mimi ', 'mimi@gmail.com', 'mimi'),
(2, 'alvita', 'vitaazalia3@gmail.com', 'vita'),
(3, 'jasmine', 'jasmine@gmail.com', 'jasmine'),
(4, 'azalia', 'azalia@gmail.com', 'azalia'),
(5, 'altan', 'altan@gmail.com', 'altan'),
(6, 'Mohammed', 'Mohammed@gmail.com', 'mohammed'),
(7, 'nana', 'nana@gmail.com', 'nana');

-- --------------------------------------------------------

--
-- Table structure for table `katalog`
--

CREATE TABLE `katalog` (
  `id_katalog` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `katalog` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `katalog`
--

INSERT INTO `katalog` (`id_katalog`, `id_kategori`, `katalog`) VALUES
(1, 2, 'Komik'),
(2, 3, 'Novel'),
(3, 4, 'Informatika'),
(4, 4, 'buku SMA');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`) VALUES
(1, 'Dewasa'),
(2, 'Anak'),
(3, 'Remaja'),
(4, 'Pendidikan');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` int(11) NOT NULL,
  `kode_beli` varchar(100) NOT NULL,
  `id_cus` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `qty` varchar(5) NOT NULL,
  `harga` varchar(12) NOT NULL,
  `total_harga` varchar(12) NOT NULL,
  `total_bayar` varchar(20) NOT NULL,
  `qty_total` varchar(10) NOT NULL,
  `status_beli` enum('order','lunas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `keranjang`
--

INSERT INTO `keranjang` (`id_keranjang`, `kode_beli`, `id_cus`, `id_buku`, `qty`, `harga`, `total_harga`, `total_bayar`, `qty_total`, `status_beli`) VALUES
(27, '802097660', 16, 6, '1', '35000', '', '', '', 'order'),
(30, '1855772473', 18, 6, '1', '35000', '', '', '', 'order');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_beli` int(11) NOT NULL,
  `kode_beli` varchar(100) NOT NULL,
  `id_cus` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `qty` varchar(10) NOT NULL,
  `harga` varchar(15) NOT NULL,
  `total_harga` varchar(15) NOT NULL,
  `total_bayar` varchar(15) NOT NULL,
  `qty_total` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_beli`, `kode_beli`, `id_cus`, `id_buku`, `qty`, `harga`, `total_harga`, `total_bayar`, `qty_total`) VALUES
(16, '23131', 11, 2, '3', '80500', '241500', '', ''),
(17, '23131', 11, 1, '1', '56000', '56000', '', ''),
(18, '12786', 11, 1, '11', '56000', '616000', '', ''),
(19, '30870', 12, 2, '3', '80500', '241500', '', ''),
(20, '30870', 12, 3, '1', '90000', '90000', '', ''),
(21, '21850', 11, 2, '3', '80500', '241500', '', ''),
(25, '14830', 14, 1, '1', '56000', '56000', '', ''),
(26, '14830', 14, 4, '1', '20000', '20000', '', ''),
(27, '1795449686', 15, 5, '1', '150000', '', '', ''),
(28, '802097660', 16, 6, '1', '35000', '', '', ''),
(29, '1830641153', 17, 8, '1', '64000', '', '', ''),
(30, '1353984326', 18, 5, '1', '150000', '', '', ''),
(31, '1855772473', 18, 6, '1', '35000', '', '', ''),
(32, '798140021', 17, 12, '1', '79200', '', '', ''),
(33, '29816618', 20, 16, '1', '40000', '', '', ''),
(34, '42048297', 21, 13, '1', '100000', '', '', ''),
(35, '461979381', 22, 14, '1', '142500', '', '', ''),
(36, '461979381', 22, 16, '1', '40000', '', '', ''),
(37, '109151731', 7, 10, '1', '84000', '', '', ''),
(38, '2057640564', 4, 12, '1', '79200', '', '', ''),
(39, '2107084325', 1, 12, '1', '79200', '', '', ''),
(40, '1723393340', 5, 10, '1', '84000', '', '', ''),
(41, '190750700', 2, 14, '1', '142500', '', '', ''),
(42, '1438437110', 3, 15, '1', '22500', '', '', ''),
(43, '432444618', 6, 16, '1', '40000', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `provinsi`
--

CREATE TABLE `provinsi` (
  `id_provinsi` int(11) NOT NULL,
  `provinsi` varchar(30) NOT NULL,
  `tarif` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `provinsi`
--

INSERT INTO `provinsi` (`id_provinsi`, `provinsi`, `tarif`) VALUES
(1, 'Jawa Timur', '11000'),
(2, 'Jawa Tengah', '12500'),
(3, 'Jawa Barat', '18000'),
(4, 'Kalimantan Barat', '48500');

-- --------------------------------------------------------

--
-- Table structure for table `selesai`
--

CREATE TABLE `selesai` (
  `kode_beli` varchar(100) NOT NULL,
  `id_cus` int(11) NOT NULL,
  `qty_total` varchar(10) NOT NULL,
  `bayar` varchar(15) NOT NULL,
  `total_bayar` varchar(15) NOT NULL,
  `tgl_order` text NOT NULL,
  `status_beli` enum('order','lunas') NOT NULL,
  `status_pengiriman` enum('belum dikirim','dikirim','diterima') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `selesai`
--

INSERT INTO `selesai` (`kode_beli`, `id_cus`, `qty_total`, `bayar`, `total_bayar`, `tgl_order`, `status_beli`, `status_pengiriman`) VALUES
('109151731', 7, '1', '0', '109162731', '2024-09-12', 'lunas', 'diterima'),
('1438437110', 3, '1', '0', '1438455110', '2024-09-12', 'lunas', 'dikirim'),
('1723393340', 5, '1', '0', '1723411340', '2024-09-12', 'lunas', 'dikirim'),
('190750700', 2, '1', '0', '190763200', '2024-09-12', 'lunas', 'dikirim'),
('2057640564', 4, '1', '0', '2057653064', '2024-09-12', 'order', 'belum dikirim'),
('2107084325', 1, '1', '0', '2107132825', '2024-09-12', 'order', 'belum dikirim'),
('432444618', 6, '1', '0', '432493118', '2024-09-12', 'lunas', 'diterima');

-- --------------------------------------------------------

--
-- Table structure for table `stok`
--

CREATE TABLE `stok` (
  `id_stok` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `stok` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `stok`
--

INSERT INTO `stok` (`id_stok`, `id_buku`, `stok`) VALUES
(1, 1, '5'),
(2, 2, '23'),
(4, 4, '5'),
(5, 5, '10'),
(6, 6, '9'),
(7, 7, '19'),
(8, 8, '5'),
(9, 9, '30'),
(10, 10, '23'),
(11, 11, '18'),
(12, 12, '19'),
(13, 13, '35'),
(14, 14, '25'),
(15, 15, '21'),
(16, 16, '27'),
(17, 17, '25'),
(18, 18, '15');

-- --------------------------------------------------------

--
-- Table structure for table `superuser`
--

CREATE TABLE `superuser` (
  `id_su` int(11) NOT NULL,
  `nama_su` varchar(40) NOT NULL,
  `email_su` varchar(40) NOT NULL,
  `password_su` varchar(40) NOT NULL,
  `level` enum('owner','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `superuser`
--

INSERT INTO `superuser` (`id_su`, `nama_su`, `email_su`, `password_su`, `level`) VALUES
(1, 'alvita', 'vitaazalia3@gmail.com', 'vitaazalia', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tujuan`
--

CREATE TABLE `tujuan` (
  `id_tujuan` int(11) NOT NULL,
  `kode_beli` varchar(110) NOT NULL,
  `nama_penerima` varchar(50) NOT NULL,
  `provinsi` varchar(30) NOT NULL,
  `kabupaten` varchar(25) NOT NULL,
  `kecamatan` varchar(25) NOT NULL,
  `kode_pos` varchar(5) NOT NULL,
  `desa` varchar(25) NOT NULL,
  `rw` varchar(3) NOT NULL,
  `rt` varchar(3) NOT NULL,
  `no_rumah` varchar(5) NOT NULL,
  `no_telp` varchar(12) NOT NULL,
  `tarif` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tujuan`
--

INSERT INTO `tujuan` (`id_tujuan`, `kode_beli`, `nama_penerima`, `provinsi`, `kabupaten`, `kecamatan`, `kode_pos`, `desa`, `rw`, `rt`, `no_rumah`, `no_telp`, `tarif`) VALUES
(16, '1353984326', 'jasmine', 'Jawa Barat', 'bekasi', 'karang bahagia', '7072', 'sukaraya', '007', '004', '612', '082112350251', '18000'),
(17, '798140021', 'nana', 'Jawa Timur', 'Malang ', ' Lowokwaru', ' 6514', ' Tlogomas', '02', '03', '15', '081234567890', '11000'),
(18, '29816618', 'mohammed', 'Jawa Tengah', 'Semarang ', 'Tembalang', '50275', 'Sembawa ', '03', '04', '45', '02476543210', '12500'),
(19, '42048297', 'mimi', 'Kalimantan Barat', 'Pontianak ', 'Pontianak ', ' 7812', 'Batu Layang', '05', '02', '78', '05611234567', '48500'),
(20, '461979381', 'azalia', 'Jawa Barat', 'Bandung Coblong Kode Pos:', 'Coblong ', '40132', 'Cipaganti', '06', '03', '12', '02267891234', '18000'),
(21, '109151731', 'nana', 'Jawa Timur', 'Malang ', 'Lowokwaru', '65141', 'Tlogomas ', '02', '03', '15', '081234567890', '11000'),
(22, '2057640564', 'azalia', 'Jawa Tengah', 'Semarang ', 'Tembalang', '50275', 'Sembawa', '03', '04', '45', '02476543210', '12500'),
(23, '2107084325', 'mimi', 'Kalimantan Barat', 'Pontianak ', 'Pontianak ', '78124', 'Batu Layang ', '05', '02', '78', '05611234567', '48500'),
(24, '1723393340', 'altan', 'Jawa Barat', 'Bandung ', ' Coblong', '40132', 'Cipaganti', '06', '03', '12', '0226789234', '18000'),
(25, '190750700', 'alvita', 'Jawa Tengah', 'Karanganyar', 'Karanganyar', '57711', 'jaten', '04', '01', '23', '0271-1234-56', '12500'),
(26, '1438437110', 'jasmine', 'Jawa Barat', ' Bekasi ', ' Bekasi ', '17141', 'Margahayu', '10', '05', '50', '02198765432', '18000'),
(27, '432444618', 'mohammed', 'Kalimantan Barat', 'Sintang ', 'Sintang', '78612', 'Kapuas Keci', '02', '07', '28', '05356789012', '48500');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_cus`);

--
-- Indexes for table `katalog`
--
ALTER TABLE `katalog`
  ADD PRIMARY KEY (`id_katalog`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_beli`);

--
-- Indexes for table `provinsi`
--
ALTER TABLE `provinsi`
  ADD PRIMARY KEY (`id_provinsi`);

--
-- Indexes for table `selesai`
--
ALTER TABLE `selesai`
  ADD PRIMARY KEY (`kode_beli`);

--
-- Indexes for table `stok`
--
ALTER TABLE `stok`
  ADD PRIMARY KEY (`id_stok`);

--
-- Indexes for table `superuser`
--
ALTER TABLE `superuser`
  ADD PRIMARY KEY (`id_su`);

--
-- Indexes for table `tujuan`
--
ALTER TABLE `tujuan`
  ADD PRIMARY KEY (`id_tujuan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id_cus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `katalog`
--
ALTER TABLE `katalog`
  MODIFY `id_katalog` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_beli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `provinsi`
--
ALTER TABLE `provinsi`
  MODIFY `id_provinsi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `stok`
--
ALTER TABLE `stok`
  MODIFY `id_stok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `superuser`
--
ALTER TABLE `superuser`
  MODIFY `id_su` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tujuan`
--
ALTER TABLE `tujuan`
  MODIFY `id_tujuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
