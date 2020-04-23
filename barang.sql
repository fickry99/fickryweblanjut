-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Apr 2020 pada 17.00
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `barang`
--

DELIMITER $$
--
-- Prosedur
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `pview_barang` ()  NO SQL
BEGIN
    SELECT data_barang.*, fstatus_barang(stok) as status FROM data_barang;
END$$

--
-- Fungsi
--
CREATE DEFINER=`root`@`localhost` FUNCTION `fstatus_barang` (`stok` INT) RETURNS VARCHAR(25) CHARSET latin1 NO SQL
    DETERMINISTIC
BEGIN 
DECLARE hasil VARCHAR(60);
IF stok > 0 THEN
SET hasil = 'Barang Tersedia';
ELSE 
SET hasil = 'Restock Barang Segera';
END IF;
RETURN(hasil);
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_keluar`
--

CREATE TABLE `barang_keluar` (
  `id_keluar` varchar(10) NOT NULL,
  `id_barang` varchar(10) NOT NULL,
  `tanggal_keluar` date NOT NULL,
  `stok` int(11) NOT NULL,
  `keterangan_keluar` text NOT NULL,
  `mutasi_keluar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang_keluar`
--

INSERT INTO `barang_keluar` (`id_keluar`, `id_barang`, `tanggal_keluar`, `stok`, `keterangan_keluar`, `mutasi_keluar`) VALUES
('KLR0002', 'BRG0001', '2020-04-21', 12, 'Barang sukses dipakai', 188),
('KLR0003', 'BRG0001', '2020-04-30', 217, 'Barang sukses dipakai', 171);

--
-- Trigger `barang_keluar`
--
DELIMITER $$
CREATE TRIGGER `TRG_Keluar` AFTER INSERT ON `barang_keluar` FOR EACH ROW BEGIN
    UPDATE data_barang SET stok = stok-NEW.stok
    					 
        WHERE id_barang = NEW.id_barang;
        
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `id_masuk` varchar(10) NOT NULL,
  `id_barang` varchar(10) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `stok` int(11) NOT NULL,
  `keterangan_masuk` text NOT NULL,
  `mutasi_masuk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang_masuk`
--

INSERT INTO `barang_masuk` (`id_masuk`, `id_barang`, `tanggal_masuk`, `stok`, `keterangan_masuk`, `mutasi_masuk`) VALUES
('MSK0001', 'BRG0001', '2020-04-29', 200, 'asas', 391),
('MSK0002', 'BRG0001', '2020-04-29', 200, 'asas', 591),
('MSK0003', 'BRG0001', '2020-04-30', 12, 'barang berhasil sampai', 603);

--
-- Trigger `barang_masuk`
--
DELIMITER $$
CREATE TRIGGER `TRG_Masuk` AFTER INSERT ON `barang_masuk` FOR EACH ROW BEGIN
    UPDATE data_barang SET stok = stok+NEW.stok
        WHERE id_barang = NEW.id_barang;
        
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_barang`
--

CREATE TABLE `data_barang` (
  `id_barang` varchar(10) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `stok` int(11) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_barang`
--

INSERT INTO `data_barang` (`id_barang`, `nama_barang`, `stok`, `keterangan`) VALUES
('BRG0001', 'Selai Nanas', 603, 'Barang harus disimpan didalam kulkas'),
('BRG0002', 'Terigu', 180, 'Barang harus di pesan setiap hari'),
('BRG0003', 'Selai Coklat', 251, 'Selai di restock 2 hari sekali');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD PRIMARY KEY (`id_keluar`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indeks untuk tabel `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`id_masuk`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indeks untuk tabel `data_barang`
--
ALTER TABLE `data_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD CONSTRAINT `barang_keluar_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `data_barang` (`id_barang`);

--
-- Ketidakleluasaan untuk tabel `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD CONSTRAINT `barang_masuk_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `data_barang` (`id_barang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
