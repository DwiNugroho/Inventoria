-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Apr 2019 pada 05.16
-- Versi server: 10.1.34-MariaDB
-- Versi PHP: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventoria`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_keluar`
--

CREATE TABLE `barang_keluar` (
  `id_keluar` int(11) NOT NULL,
  `jumlah_keluar` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `no_invoice` varchar(255) NOT NULL,
  `penerima` varchar(255) NOT NULL,
  `keperluan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang_keluar`
--

INSERT INTO `barang_keluar` (`id_keluar`, `jumlah_keluar`, `date`, `no_invoice`, `penerima`, `keperluan`) VALUES
(1, '15', '2019-03-31 21:16:23', '020190401001', 'Pak Budi', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `id_masuk` int(11) NOT NULL,
  `jumlah_masuk` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `no_invoice` varchar(255) NOT NULL,
  `id_supplier` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang_masuk`
--

INSERT INTO `barang_masuk` (`id_masuk`, `jumlah_masuk`, `date`, `no_invoice`, `id_supplier`) VALUES
(33, '100', '2019-03-21 10:30:57', '120190321001', 7),
(34, '30', '2019-03-26 04:08:34', '120190326002', 7),
(35, '35', '2019-03-31 21:15:33', '120190401003', 9),
(36, '1', '2019-04-05 09:33:35', '120190405004', 10),
(37, '1', '2019-04-05 09:33:48', '120190405005', 10),
(38, '5', '2019-04-05 09:52:48', '120190405006', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_keluar`
--

CREATE TABLE `detail_keluar` (
  `id_detail_keluar` int(11) NOT NULL,
  `id_keluar` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jml` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_keluar`
--

INSERT INTO `detail_keluar` (`id_detail_keluar`, `id_keluar`, `id_barang`, `jml`) VALUES
(1, 1, 16, '5'),
(2, 1, 17, '5'),
(3, 1, 18, '5');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_masuk`
--

CREATE TABLE `detail_masuk` (
  `id_detail_masuk` int(11) NOT NULL,
  `id_masuk` varchar(255) NOT NULL,
  `id_barang` varchar(255) NOT NULL,
  `jml` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_masuk`
--

INSERT INTO `detail_masuk` (`id_detail_masuk`, `id_masuk`, `id_barang`, `jml`) VALUES
(48, '31', '14', '10'),
(49, '31', '12', '20'),
(50, '32', '15', '30'),
(51, '32', '14', '10'),
(52, '33', '16', '50'),
(53, '33', '17', '50'),
(54, '34', '18', '20'),
(55, '34', '16', '5'),
(56, '34', '17', '5'),
(57, '35', '19', '30'),
(58, '35', '18', '5'),
(59, '36', '16', '1'),
(60, '37', '16', '1'),
(61, '38', '20', '5');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_peminjaman`
--

CREATE TABLE `detail_peminjaman` (
  `id_detail_peminjaman` int(11) NOT NULL,
  `id_peminjaman` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jml_pinjam` varchar(255) NOT NULL,
  `jml_kembali` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_peminjaman`
--

INSERT INTO `detail_peminjaman` (`id_detail_peminjaman`, `id_peminjaman`, `id_barang`, `jml_pinjam`, `jml_kembali`) VALUES
(23, 16, 17, '1', '1'),
(24, 16, 16, '1', '1'),
(25, 17, 16, '2', '2'),
(26, 17, 17, '5', '5'),
(27, 18, 16, '1', '1'),
(28, 18, 17, '5', '5'),
(29, 19, 16, '1', '1'),
(30, 19, 17, '5', '5'),
(31, 20, 16, '2', '2'),
(32, 20, 17, '5', '5'),
(33, 21, 16, '10', '10'),
(34, 21, 18, '6', '6'),
(35, 21, 17, '2', '2'),
(36, 22, 18, '5', '5'),
(37, 22, 16, '2', '2'),
(38, 23, 17, '4', '4'),
(39, 24, 16, '100', '100'),
(40, 24, 17, '5', '5'),
(41, 24, 18, '5', '5'),
(42, 25, 16, '5', '5');

-- --------------------------------------------------------

--
-- Struktur dari tabel `inventories`
--

CREATE TABLE `inventories` (
  `id` int(11) NOT NULL,
  `kode` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `kondisi` varchar(255) NOT NULL,
  `spesifikasi` text NOT NULL,
  `jumlah` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_ruang` int(11) NOT NULL,
  `tanggal_register` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `inventories`
--

INSERT INTO `inventories` (`id`, `kode`, `nama`, `kondisi`, `spesifikasi`, `jumlah`, `id_kategori`, `id_ruang`, `tanggal_register`) VALUES
(16, 'BRG0001', 'Laptop', 'Sangat Baik', '', 57, 2, 3, '0000-00-00 00:00:00'),
(17, 'BRG0002', 'Proyektor', 'Sangat Baik', '', 48, 2, 1, '0000-00-00 00:00:00'),
(18, 'BRG0003', 'Headphone', 'Baik', '', 20, 2, 1, '0000-00-00 00:00:00'),
(19, 'BRG0004', 'Spidol', 'Sangat Baik', '', 30, 3, 1, '0000-00-00 00:00:00'),
(20, 'BRG0005', 'Kapur', 'Sangat Baik', '', 5, 3, 1, '2019-04-03 07:19:33'),
(21, 'BRG0006', 'Bola Voly', 'Sangat Baik', '', 0, 7, 5, '2019-04-09 08:50:18'),
(22, 'BRG0007', 'Bola Basket', 'Sangat Baik', '', 0, 7, 4, '2019-04-09 08:57:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(125) NOT NULL,
  `kode_kategori` varchar(125) NOT NULL,
  `status_kategori` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `kode_kategori`, `status_kategori`) VALUES
(1, 'undefined', 'KTG0001', '0'),
(2, 'Elektronik', 'KTG0002', '1'),
(3, 'Alat Tulis', 'KTG0003', '1'),
(7, 'Alat Olahraga', 'KTG0004', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `level`
--

CREATE TABLE `level` (
  `id_level` int(11) NOT NULL,
  `nama_level` varchar(255) NOT NULL,
  `status` enum('0','1','2') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `level`
--

INSERT INTO `level` (`id_level`, `nama_level`, `status`) VALUES
(1, 'Peminjam', '0'),
(2, 'Operator', '1'),
(3, 'Admin', '2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` int(11) NOT NULL,
  `no_invoice` varchar(255) NOT NULL,
  `peminjam` int(25) NOT NULL,
  `tujuan` varchar(255) NOT NULL,
  `jumlah_pinjam` int(11) NOT NULL,
  `jumlah_kembali` int(11) NOT NULL,
  `waktu_pinjam` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `waktu_kembali` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `no_invoice`, `peminjam`, `tujuan`, `jumlah_pinjam`, `jumlah_kembali`, `waktu_pinjam`, `waktu_kembali`, `status`) VALUES
(16, '220190322001', 29, 'Kegiatan Belajar Mengajar', 2, 2, '2019-03-22 16:25:17', '2019-03-25 17:11:56', '1'),
(17, '220190322002', 30, '', 7, 7, '2019-03-22 16:38:48', '2019-03-25 17:12:06', '1'),
(18, '220190326003', 29, 'sdfsdfg', 6, 6, '2019-03-26 11:06:10', '2019-03-26 11:09:29', '1'),
(19, '220190327004', 30, '', 6, 6, '2019-03-27 13:43:02', '2019-03-29 06:23:53', '1'),
(20, '220190329005', 31, '', 7, 7, '2019-03-29 20:03:24', '2019-03-29 20:03:42', '1'),
(21, '220190330006', 30, 'Keperluan Mengajar', 18, 18, '2019-03-30 14:51:33', '2019-03-31 17:04:47', '1'),
(22, '220190401007', 32, '', 7, 7, '2019-04-01 04:17:02', '2019-04-01 04:17:21', '1'),
(23, '220190405008', 29, '', 4, 4, '2019-04-05 11:06:46', '2019-04-07 16:57:46', '1'),
(24, '220190405009', 7, '', 110, 110, '2019-04-05 17:41:35', '2019-04-08 05:55:28', '1'),
(25, '220190405010', 7, '', 5, 5, '2019-04-05 17:46:57', '2019-04-09 10:13:39', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ruangan`
--

CREATE TABLE `ruangan` (
  `id_ruang` int(11) NOT NULL,
  `nama_ruang` varchar(40) NOT NULL,
  `kode_ruang` varchar(255) NOT NULL,
  `status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ruangan`
--

INSERT INTO `ruangan` (`id_ruang`, `nama_ruang`, `kode_ruang`, `status`) VALUES
(1, 'C1', 'C1', '1'),
(2, 'C2', 'C2', '1'),
(3, 'A1', 'A1', '1'),
(4, 'B1', 'B1', '1'),
(5, 'C3', 'C3', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `suppliers`
--

CREATE TABLE `suppliers` (
  `id_supplier` int(11) NOT NULL,
  `nama_supplier` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `kota` varchar(20) NOT NULL,
  `no_tlp` varchar(12) NOT NULL,
  `status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `suppliers`
--

INSERT INTO `suppliers` (`id_supplier`, `nama_supplier`, `alamat`, `kota`, `no_tlp`, `status`) VALUES
(2, 'Cv. xxx Abadii', 'Jl. XXX No. 12 Jatirogo', 'Tuban', '085312343456', '1'),
(4, 'Cv. Mitra Sejati', 'Jl. xxxx No. 54 Jatirogo', 'Makasar', '085346232987', '1'),
(6, 'PT. Insan Sejahtera', 'Jl. xxxx No. 18 Jatirogo', 'Palembang', '098765787659', '1'),
(7, 'Kemendikbud', 'Jl. xxxxx No. 78', 'Jakarta', '085643542354', '1'),
(10, 'Cv. Irna ', 'Jl. xxx Wotsogo', 'Tuban', '085637635373', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tempo_keluar`
--

CREATE TABLE `tempo_keluar` (
  `id_tempo_keluar` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jml` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tempo_masuk`
--

CREATE TABLE `tempo_masuk` (
  `id_tempo_masuk` int(11) NOT NULL,
  `id_barang` varchar(255) NOT NULL,
  `jml` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tempo_peminjaman`
--

CREATE TABLE `tempo_peminjaman` (
  `id_tempo_peminjaman` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jml_pinjam` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `nama`, `username`, `password`, `level`) VALUES
(6, 'Operator', 'operator', '$2y$10$Q6KANNBM/pIVVL4eLFqwk.o8gH1hE3W17Gp/PHUAXEcBpZ5zkr6XC', 2),
(7, 'peminjam', 'peminjam', '$2y$10$fE/07LMg1OCePL6HoO58uuNXb3cPRneVGS0YjFxGIrb2BFkTFWRWu', 1),
(25, 'Admin', 'admin', '$2y$10$UIDz6eDLjy3gVar/nuOGKuA9xKpaxcYRpmTJFprAQYwv.1tCCrWvW', 3),
(28, 'Dwi Nugroho', 'pixellpie', '$2y$10$ZNZwxwGbBqdtzn1gX8Qvz.Sa3IUdnCCRLktnB/kr1kkwGdT560bqe', 3),
(29, 'Edi Sandandung', 'edi', '$2y$10$LFNL7Zpc01qzAbZnl.oGA.tpLZaBVHLEFkyYyKwd04nw7rzWdQOnS', 1),
(30, 'Buni Anto Saputro', 'buni', '$2y$10$sqwfuFXo9idCcNsPv61jauMm5O776CkevDaU8etMICBOrVY3EeXmG', 1),
(32, 'Ario Denata', 'ario', '$2y$10$ZS6GL3D.JV7TxLQPYK7lqeC/4ETmxHk2sJ9Vb4e9WPiLk6gGfelei', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD PRIMARY KEY (`id_keluar`);

--
-- Indeks untuk tabel `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`id_masuk`);

--
-- Indeks untuk tabel `detail_keluar`
--
ALTER TABLE `detail_keluar`
  ADD PRIMARY KEY (`id_detail_keluar`);

--
-- Indeks untuk tabel `detail_masuk`
--
ALTER TABLE `detail_masuk`
  ADD PRIMARY KEY (`id_detail_masuk`);

--
-- Indeks untuk tabel `detail_peminjaman`
--
ALTER TABLE `detail_peminjaman`
  ADD PRIMARY KEY (`id_detail_peminjaman`);

--
-- Indeks untuk tabel `inventories`
--
ALTER TABLE `inventories`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indeks untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`);

--
-- Indeks untuk tabel `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`id_ruang`);

--
-- Indeks untuk tabel `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indeks untuk tabel `tempo_keluar`
--
ALTER TABLE `tempo_keluar`
  ADD PRIMARY KEY (`id_tempo_keluar`);

--
-- Indeks untuk tabel `tempo_masuk`
--
ALTER TABLE `tempo_masuk`
  ADD PRIMARY KEY (`id_tempo_masuk`);

--
-- Indeks untuk tabel `tempo_peminjaman`
--
ALTER TABLE `tempo_peminjaman`
  ADD PRIMARY KEY (`id_tempo_peminjaman`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang_keluar`
--
ALTER TABLE `barang_keluar`
  MODIFY `id_keluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `barang_masuk`
--
ALTER TABLE `barang_masuk`
  MODIFY `id_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT untuk tabel `detail_keluar`
--
ALTER TABLE `detail_keluar`
  MODIFY `id_detail_keluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `detail_masuk`
--
ALTER TABLE `detail_masuk`
  MODIFY `id_detail_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT untuk tabel `detail_peminjaman`
--
ALTER TABLE `detail_peminjaman`
  MODIFY `id_detail_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT untuk tabel `inventories`
--
ALTER TABLE `inventories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `id_ruang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tempo_keluar`
--
ALTER TABLE `tempo_keluar`
  MODIFY `id_tempo_keluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tempo_masuk`
--
ALTER TABLE `tempo_masuk`
  MODIFY `id_tempo_masuk` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tempo_peminjaman`
--
ALTER TABLE `tempo_peminjaman`
  MODIFY `id_tempo_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
